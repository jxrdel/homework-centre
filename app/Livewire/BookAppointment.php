<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Student;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\WaitingList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookAppointment extends Component
{
    public $user;
    public $date;
    public $child;
    public $children;
    public $timeslots;
    public $classes = [];
    public $appointments = [];
    public $isCurrent = true;


    public function mount($date){
        $today = Carbon::today('AST');
        $requestDate = Carbon::parse($date);
        $requestDate = $requestDate->endOfDay();
        // dd($requestDate);
        if($requestDate->lessThan($today)){
            $this->isCurrent = false;
        }
        $this->date = $date;
        $this->user = User::find(Auth::user()->id);
        $this->children = $this->user->students;

        $classes = TimeSlot::whereDate('StartTime', '=', $date)
                                    ->get();

        //Initialize classes
        foreach($classes as $class){
            $isFull = $class->appointments->count() >= $class->MaxEnrollments ? true : false; 

            $this->classes [] = [
                'TimeSlotID' => $class->TimeSlotID,
                'StartTime' => Carbon::parse($class->StartTime)->format('g:i A'),
                'EndTime' => Carbon::parse($class->EndTime)->format('g:i A'),
                'Selected' => !$isFull , //Classes are selected by default
                'isFull' => $isFull
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
        $this->appointments = $this->user->students()->select('students.StudentID', 'FirstName', 'LastName', 'PicturePath')
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

        //Display Booking Availability
        $this->timeslots = $this->timeslots->map(function ($timeSlot) {
            $maxstudents = $timeSlot->MaxEnrollments;
            if($timeSlot->appointments->count() >= $maxstudents){
                $timeSlot->bookingsRemaining = 'Full';
            }else{
                $timeSlot->bookingsRemaining = $maxstudents - $timeSlot->appointments->count() . ' Spots Remaining';
            }
            $timeSlot->remainingPercentage = round((($maxstudents - ($maxstudents - $timeSlot->appointments->count())) / $maxstudents) * 100);
            return $timeSlot;
        });
        return view('livewire.book-appointment');
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
    

    public function noClassesSelected(){
        foreach($this->classes as $appointment){
            if($appointment['Selected']){
                return false;
            }
        }

        return true;
    }
    
    public function checkFullClasses(){
        // dd('Full');
        foreach($this->classes as $appointment){
            if($appointment['Selected']){
                if(Appointment::isClassFull($appointment['TimeSlotID'])){
                    return true;
                    // dd('Full');
                }
            }
        }
        // dd('Empty');

        return false;
    }

    public function save(){
        // dd($this->classes);
        $student = Student::find($this->child);

        if($this->noClassesSelected()){
            $this->addError('child', 'No classes selected');
        }else if($this->checkDuplicateAppointments()){ //If there are duplicates, display error
            $this->resetValidation();
            $this->addError('child', $student->FirstName . ' ' . $student->LastName . ' is already registered for 1 or more of the selected classes');
        }else if($this->checkFullClasses()){
            $this->resetValidation();
            $this->addError('child', 'One or more of the selected classes is full');
        }else{

            foreach($this->classes as $appointment){
                if($appointment['Selected']){
                    $student->timeslots()->attach($appointment['TimeSlotID']);
                }
            }

            $this->refreshPage();
            $this->resetValidation();
            $this->dispatch('close-create-modal');
            $this->dispatch('show-message', message: 'Appointment booked successfully');
        }

    }

    public function deleteAppointment($id){
        // dd($id);

        $appointment = Appointment::find($id);
        $appointment->delete();
        $this->refreshPage();
        $this->resetValidation();
        $this->dispatch('show-message', message: 'Appointment deleted successfully');
    }

    public function canJoinWaitingList($studentid, $timeslotid){
        if(Appointment::isDuplicate($studentid, $timeslotid)){
            $this->addError('error', 'This student is already registered for this class');
            return false;
        }else if(WaitingList::isDuplicate($studentid, $timeslotid)){
            $this->addError('error', 'This student is already on the waiting list for this class');
            return false;
        }

        return true;
    }

    public function joinWaitingList($timeslotid){
        // dd($timeslotid);
        if($this->canJoinWaitingList($this->child, $timeslotid)){
            dd($this->child);
            WaitingList::create([
                'TimeSlotID' => $this->timeslot,
                'StudentID' => $this->student,
            ]);

            $this->dispatch('close-create-modal');
            $this->refreshPage();
            $this->resetValidation();
            $this->dispatch('show-message', message: 'Student added to waiting list successfully');
        }
    }
    public function refreshPage(){

        $this->child = null;

        //Resets the classes array
        $this->classes = array_map(function ($class) {

        $timeslot = TimeSlot::find($class['TimeSlotID']); // Assuming ClassModel is the model for your class data
    
        $isFull = $timeslot->appointments->count() >= $timeslot->MaxEnrollments;
            
        $class['Selected'] = !$isFull;
        $class['isFull'] = $isFull;
            return $class;
        }, $this->classes);


        // $parsedDate = Carbon::parse($this->date)->toDateString();

        //Refreshes appointments
        // $this->appointments = $this->user->students()->select('students.StudentID', 'FirstName', 'LastName', 'PicturePath')
        //                             ->with(['appointments' => function($query) use ($parsedDate) {
        //                                 $query->whereHas('timeslot', function ($query) use ($parsedDate) {
        //                                     $query->whereDate('StartTime', $parsedDate);
        //                                 })->with('timeSlot');
        //                             }])
        //                             ->get();
    }

    

}
