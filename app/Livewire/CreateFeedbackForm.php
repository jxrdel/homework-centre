<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Component;

class CreateFeedbackForm extends Component
{
    public $compliments;
    public $complaints;
    public $suggestions;
    public $activitysatisfaction;
    public $overallsatisfaction;
    public $childsatisfaction;

    public function render()
    {
        return view('livewire.create-feedback-form');
    }

    public function createFeedback(){
        // dd($this->childsatisfaction);
        Feedback::create([
            'Compliments' => $this->compliments,
            'Complaints' => $this->complaints,
            'Suggestions' => $this->suggestions,
            'ActivitySatisfaction' => $this->activitysatisfaction,
            'OverallSatisfaction' => $this->overallsatisfaction,
            'ChildSatisfaction' => $this->childsatisfaction,
            'ParentID' => auth()->user()->id
        ]);
        
        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Feedback submitted successfully');
        $this->reset();
    }
}
