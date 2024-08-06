<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewFeedbackForm extends Component
{
    public $feedbackform;
    public $compliments;
    public $complaints;
    public $suggestions;
    public $activitysatisfaction;
    public $overallsatisfaction;
    public $childsatisfaction;

    public function render()
    {
        return view('livewire.view-feedback-form');
    }

    
    #[On('show-view-modal')]
    public function displayModal($id)
    {
        $this->feedbackform = Feedback::find($id);
        $this->compliments = $this->feedbackform->Compliments;
        $this->complaints = $this->feedbackform->Complaints;
        $this->suggestions = $this->feedbackform->Suggestions;
        $this->activitysatisfaction = $this->feedbackform->ActivitySatisfaction;
        $this->overallsatisfaction = $this->feedbackform->OverallSatisfaction;
        $this->childsatisfaction = $this->feedbackform->ChildSatisfaction;
        $this->dispatch('display-view-modal');
    }
}
