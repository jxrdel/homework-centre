<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Student;
use App\Models\TimeSlot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class BookAppointmentAdmin extends Component
{
    public $user;
    public $date;
    public $child;
    public $children;
    public $timeslots;
    public $classes = [];
    public $appointments = [];
    public $isCurrent = true;
    public $search;

    public function mount($date){
        $today = Carbon::today('AST');
        $requestDate = Carbon::parse($date);
        $requestDate = $requestDate->endOfDay();
        // dd($requestDate);
        if($requestDate->lessThan($today)){
            $this->isCurrent = false;
        }
        $this->date = $date;
        $this->children = Student::orderBy('FirstName')->get();

        $classes = TimeSlot::whereDate('StartTime', '=', $date)
                                    ->get();

        //Initialize classes
        foreach($classes as $class){
            $this->classes [] = [
                'TimeSlotID' => $class->TimeSlotID,
                'StartTime' => Carbon::parse($class->StartTime)->format('g:i A'),
                'EndTime' => Carbon::parse($class->EndTime)->format('g:i A'),
                'Selected' => true //Classes are selected by default
            ];
        }

        $parsedDate = Carbon::parse($date)->toDateString();

        $this->timeslots = TimeSlot::whereDate('StartTime', $parsedDate)
                            ->with(['appointments' => function ($query) {
                                $query->with('student'); // Eager load student information
                            }])
                            ->get();


    }

    public function render()
    {
        $parsedDate = Carbon::parse($this->date)->toDateString();


        //Get Student Appointment details
        if($this->search){
            $this->appointments = Student::select('students.StudentID', 'FirstName', 'LastName', 'PicturePath')
                                        ->where('FirstName' , 'like', '%' . trim($this->search) . '%')
                                        ->orWhere('LastName' , 'like', '%' . trim($this->search) . '%')
                                        ->orWhere('PicturePath' , 'like', '%' . trim($this->search) . '%')
                                        ->with(['appointments' => function($query) use ($parsedDate) {
                                            $query->whereHas('timeslot', function ($query) use ($parsedDate) {
                                                $query->whereDate('StartTime', $parsedDate);
                                            })->with('timeSlot');
                                        }])
                                        ->get();
    
            //Removes student from collection if they don't have an appointment for that date
            $this->appointments = $this->appointments->filter(function ($student) use ($parsedDate) {
                return $student->appointments->isNotEmpty();
            });
        }else{
            $this->appointments = Student::select('students.StudentID', 'FirstName', 'LastName', 'PicturePath')
                                        ->with(['appointments' => function($query) use ($parsedDate) {
                                            $query->whereHas('timeslot', function ($query) use ($parsedDate) {
                                                $query->whereDate('StartTime', $parsedDate);
                                            })->with('timeSlot');
                                        }])
                                        ->get();
    
            //Removes student from collection if they don't have an appointment for that date
            $this->appointments = $this->appointments->filter(function ($student) use ($parsedDate) {
                return $student->appointments->isNotEmpty();
            });
        }

        //Display Booking Availability
        $this->timeslots = $this->timeslots->map(function ($timeSlot) {
            $maxstudents = $timeSlot->MaxEnrollments;
            if($timeSlot->appointments->count() >= $maxstudents){
                $timeSlot->bookingsRemaining = 'Full';
            }else{
                $timeSlot->bookingsRemaining = $maxstudents - $timeSlot->appointments->count() . ' Spots Remaining';
            }
            $timeSlot->remainingPercentage =  (($maxstudents - ($maxstudents - $timeSlot->appointments->count())) / $maxstudents) * 100;
            return $timeSlot;
        });
        return view('livewire.book-appointment-admin');
    }

    public function toggleSelected($index){
        $newstate = $this->classes[$index]['Selected'] == true ? false : true;
        $this->classes[$index]['Selected'] = $newstate;
    }

    public function checkDuplicateAppointments(){
        foreach($this->classes as $appointment){
            if($appointment['Selected']){
                if(Appointment::isDuplicate($this->child, $appointment['TimeSlotID'])){
                    return true;
                }
            }
        }

        return false;
    }

    public function save(){
        // dd($this->child);
        $student = Student::find($this->child);


        if($this->checkDuplicateAppointments()){ //If there are duplicates, display error
            $this->resetValidation();
            $this->addError('child', $student->FirstName . ' ' . $student->LastName . ' is already registered for 1 or more of the selected classes');
        }else{

            foreach($this->classes as $appointment){
                if($appointment['Selected']){
                    $student->timeslots()->attach($appointment['TimeSlotID']);
                }
            }

            $this->refreshPage();
            $this->resetValidation();
            $this->dispatch('close-create-modal');
            $this->dispatch('reset-student');
            $this->dispatch('show-message', message: 'Appointment booked successfully');
        }

    }

    public function deleteAppointment($id){
        // dd($id);

        $appointment = Appointment::find($id);
        $appointment->delete();
        $this->dispatch('show-message', message: 'Appointment deleted successfully');
    }

    public function refreshPage(){

        $this->child = null;

        //Resets the classes array
        $this->classes = array_map(function ($class) {
            $class['Selected'] = true;
            return $class;
        }, $this->classes);


        $parsedDate = Carbon::parse($this->date)->toDateString();
    }
    
    public function clearInput(){
        $this->search = null;
    }

    
    #[On('set-student')]
    public function setStudent($data){
        $this->child = $data['id'];
    }
}
