<?php

namespace App\Livewire;

use App\Models\TimeSlot;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateTimeslotModal extends Component
{
    public $starttime;
    public $endtime;
    public $maxenrollments = 7;

    public function render()
    {
        return view('livewire.create-timeslot-modal');
    }

    #[On('create-timeslot')]
    public function displayModal($starttime, $endtime)
    {
        $starttime = Carbon::parse($starttime);
        $starttime = $starttime->format('Y-m-d\TH:i');
        $endtime = Carbon::parse($endtime);
        $endtime = $endtime->format('Y-m-d\TH:i');

        $this->starttime = $starttime;
        $this->endtime = $endtime;

        $this->dispatch('display-create-modal');
        // dd($starttime);
    }

    public function createTimeslot(){
        // dd($this->endtime);
        $starttime = Carbon::parse($this->starttime);
        $starttime = $starttime->format('Y-m-d H:i:s');
        $endtime = Carbon::parse($this->endtime);
        $endtime = $endtime->format('Y-m-d H:i:s');

        TimeSlot::create([
            'Title' => 'Session',
            'StartTime' => $starttime,
            'EndTime' => $endtime,
            'MaxEnrollments' => $this->maxenrollments,
        ]);

        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-calendar');
    }
}
