<?php

namespace App\Livewire;

use App\Models\TimeSlot;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Ramsey\Uuid\Type\Time;

class CreateTimeslotModal extends Component
{
    public $date;
    public $formattedDate;
    public $endtime;
<<<<<<< HEAD
    public $maxenrollments = 10;
=======
    public $maxenrollments = 7;
    public $existingClasses = [];
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8

    public function render()
    {
        return view('livewire.create-timeslot-modal');
    }

    #[On('create-timeslot')]
    public function displayModal($starttime, $endtime)
    {
        $this->date = $starttime;
        $this->endtime = $endtime;
        $this->existingClasses = TimeSlot::where('StartTime', '>=', $starttime)
            ->where('EndTime', '<=', $endtime)
            ->get();
            
        $this->formattedDate = Carbon::parse($starttime)->format('l, F j, Y');


        $this->dispatch('display-create-modal');
    }

    public function createTimeslot(){
        $classes = [];

<<<<<<< HEAD
        TimeSlot::create([
            'Title' => 'Session',
            'StartTime' => $starttime,
            'EndTime' => $endtime,
            'MaxEnrollments' => $this->maxenrollments,
        ]);
=======
        // First time slot: 7:45 AM to 12:00 PM
        $classes[] = [
            'StartTime' => Carbon::parse($this->date)->setTime(7, 45)->format('Y-m-d H:i:s'),
            'EndTime' => Carbon::parse($this->date)->setTime(12, 0)->format('Y-m-d H:i:s'),
        ];

        // Second time slot: 12:00 PM to 4:00 PM
        $classes[] = [
            'StartTime' => Carbon::parse($this->date)->setTime(12, 0)->format('Y-m-d H:i:s'),
            'EndTime' => Carbon::parse($this->date)->setTime(16, 0)->format('Y-m-d H:i:s'), // 4:00 PM is 16:00 in 24-hour format
        ];

        // dd($classes);

        foreach ($classes as $class) {
            TimeSlot::create([
                'Title' => 'Session',
                'StartTime' => $class['StartTime'],
                'EndTime' => $class['EndTime'],
                'MaxEnrollments' => $this->maxenrollments,
            ]);
        }
>>>>>>> cf0d5b63b90800db92b5b332c2be77d0fd78c4c8

        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-calendar');
        $this->dispatch('show-message', message: 'Classes created successfully');
    }

    public function deleteClasses(){
        TimeSlot::where('StartTime', '>=', $this->date)
        ->where('EndTime', '<=', $this->endtime)
            ->delete();

        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-calendar');
        $this->dispatch('show-message', message: 'Classes deleted successfully');
    }
}
