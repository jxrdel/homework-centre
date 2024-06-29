<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class DateAppointments extends Component
{
    public $appointmentstart;
    public $appointmentend;
    public $starttime;
    public $endtime;
    public $appointments = [];

    public function render()
    {
        return view('livewire.date-appointments');
    }


    #[On('show-appointments')]
    public function displayModal($id, $starttime, $endtime)
    {
        $timeslot = TimeSlot::find($id);
        $this->appointmentstart = Carbon::parse($timeslot->StartTime)->format('l jS F Y, g:i A');
        $this->appointmentend = Carbon::parse($timeslot->EndTime)->format('g:i A');


        $this->starttime = $starttime;
        $this->endtime = $endtime;

        $this->appointments = Appointment::whereDate('StartDate', '<=', $starttime)
                                    ->whereDate('EndDate', '>=', $endtime)
                                    ->with('student') // Eager load the related student
                                    ->get();

        // dd($appointments);

        // $this->appointments = collect($appointments->map(function($appointment) {
        //     return $appointment->student->StudentName;
        // }));

        // dd($this->studentnames);
        
        $this->dispatch('display-appointments-modal');
        // dd($startdate);
    }

}
