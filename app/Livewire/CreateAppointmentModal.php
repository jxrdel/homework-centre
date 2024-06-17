<?php

namespace App\Livewire;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateAppointmentModal extends Component
{
    public $title;
    public $startdate;
    public $enddate;
    public $enddateplusone;

    public function render()
    {
        return view('livewire.create-appointment-modal');
    }

    #[On('create-appointment')]
    public function displayModal($startdate, $enddate)
    {
        $this->title = null;
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
        // dd($this->enddate);
        $startdate = Carbon::parse($this->startdate);
        $startdate = $startdate->format('Y-m-d H:i:s');
        $enddate = Carbon::parse($this->enddate);
        $enddate = $enddate->format('Y-m-d H:i:s');

        Appointment::create([
            'Title' => $this->title,
            'StartDate' => $startdate,
            'EndDate' => $enddate,
            'StudentID' => 1,
        ]);

        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-calendar');
    }
}
