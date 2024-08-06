<?php

namespace App\Livewire;

use App\Models\WeeklyReport;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewWeeklyReportModal extends Component
{
    public $startdate;
    public $enddate;
    public $objectives;
    public $activitiescompleted;
    public $challenges;

    public function render()
    {
        return view('livewire.view-weekly-report-modal');
    }

    #[On('show-view-modal')]
    public function displayModal($id)
    {
        $report = WeeklyReport::find($id);
        // dd($report);
        $this->startdate = $report->StartDate;
        $this->enddate = $report->EndDate;
        $this->objectives = $report->Objectives;
        $this->activitiescompleted = $report->ActivitiesCompleted;
        $this->challenges = $report->Challenges;

        $this->dispatch('display-view-modal');
    }
}
