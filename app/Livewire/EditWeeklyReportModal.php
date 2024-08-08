<?php

namespace App\Livewire;

use App\Models\WeeklyReport;
use Livewire\Attributes\On;
use Livewire\Component;

class EditWeeklyReportModal extends Component
{
    public $report;
    public $startdate;
    public $enddate;
    public $objectives;
    public $activitiescompleted;
    public $challenges;

    public function render()
    {
        return view('livewire.edit-weekly-report-modal');
    }

    #[On('show-edit-modal')]
    public function displayModal($id)
    {
        $this->report = WeeklyReport::find($id);
        $this->startdate = $this->report->StartDate;
        $this->enddate = $this->report->EndDate;
        $this->objectives = $this->report->Objectives;
        $this->activitiescompleted = $this->report->ActivitiesCompleted;
        $this->challenges = $this->report->Challenges;
        $this->dispatch('display-edit-modal');
    }

    public function editReport(){
        WeeklyReport::where('WeeklyReportID', $this->report->WeeklyReportID)->update([
            'StartDate' => $this->startdate,
            'EndDate' => $this->enddate,
            'Objectives' => $this->objectives,
            'ActivitiesCompleted' => $this->activitiescompleted,
            'Challenges' => $this->challenges
        ]);

        $this->dispatch('close-edit-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Report edited successfully');
    }
}
