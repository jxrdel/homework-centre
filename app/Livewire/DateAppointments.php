<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Attributes\On;
use Livewire\Component;

class DateAppointments extends Component
{
    public $date;
    public $studentnames = [];

    public function render()
    {
        return view('livewire.date-appointments');
    }


    #[On('show-appointments')]
    public function displayModal($date)
    {
        $this->date = $date;

        $appointments = Appointment::whereDate('StartDate', '<=', $this->date)
                                    ->whereDate('EndDate', '>=', $this->date)
                                    ->with('student') // Eager load the related student
                                    ->get();

        $this->studentnames = collect($appointments->map(function($appointment) {
            return $appointment->student->StudentName;
        }));

        // dd($this->studentnames);
        $this->dispatch('display-appointments-modal');
        // dd($startdate);
    }

}
