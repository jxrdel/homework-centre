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
    public $timeslot;
    public $timeslotid = 1;
    public $starttime;
    public $endtime;
    public $maxenrollments;

    public function render()
    {
        return view('livewire.date-appointments');
    }


    #[On('show-appointments')]
    public function displayModal($id)
    {
        $this->timeslot = TimeSlot::find($id);
        $this->timeslotid = $this->timeslot->TimeSlotID;
        $this->starttime = $this->timeslot->StartTime;
        $this->endtime = $this->timeslot->EndTime;
        $this->maxenrollments = $this->timeslot->MaxEnrollments;

        $this->dispatch('display-appointments-modal');
    }

    public function editTimeslot()
    {
        $starttime = Carbon::parse($this->starttime);
        $starttime = $starttime->format('Y-m-d H:i:s');
        $endtime = Carbon::parse($this->endtime);
        $endtime = $endtime->format('Y-m-d H:i:s');

        TimeSlot::find($this->timeslot->TimeSlotID)->update([
            'StartTime' => $starttime,
            'EndTime' => $endtime,
            'MaxEnrollments' => $this->maxenrollments
        ]);

        $this->dispatch('close-details-modal');
        $this->dispatch('refresh-calendar');
        $this->dispatch('show-message', message: 'Class edited successfully');
    }

}
