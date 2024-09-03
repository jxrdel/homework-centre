<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Student;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateAppointmentModal extends Component
{
    public $title;
    public $startdate;
    public $enddate;
    public $student;
    public $students;

    public function render()
    {
        return view('livewire.create-appointment-modal');
    }

    public function mount(){
        $this->students = Auth::user()->students;
    }

    #[On('create-appointment')]
    public function displayModal($startdate, $enddate)
    {
        $this->title = null;
        $this->student = null;
        $startdate = Carbon::parse($startdate);
        $startdate = $startdate->format('Y-m-d\TH:i');
        $enddate = Carbon::parse($enddate);
        $enddate = $enddate->format('Y-m-d\TH:i');

        $this->startdate = $startdate;
        $this->enddate = $enddate;

        $this->dispatch('display-create-modal');
        // dd($startdate);
    }

    public function createAppointment(){
        // dd($this->student);
        $startdate = Carbon::parse($this->startdate);
        $enddate = Carbon::parse($this->enddate);


        if(!TimeSlot::timeslotExists($startdate, $enddate)){
            $this->addError('error', 'Please select a valid time');
        }else{
            $startdate = $startdate->format('Y-m-d H:i:s');
            $enddate = $enddate->format('Y-m-d H:i:s');

            $selectedStudent = Student::find($this->student);
            $studentName = $selectedStudent->FirstName . ' ' . $selectedStudent->LastName;
            $this->title = 'Appointment - ' .  $studentName;
            // dd($this->title);

            Appointment::create([
                'Title' => $this->title,
                'StartDate' => $startdate,
                'EndDate' => $enddate,
                'StudentID' => $this->student,
            ]);

            $this->dispatch('close-create-modal');
            $this->dispatch('show-message', message: 'Appointment booked successfully');
            $this->dispatch('refresh-calendar');
        }

    }
}
