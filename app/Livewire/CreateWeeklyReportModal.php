<?php

namespace App\Livewire;

use App\Models\WeeklyReport;
use Livewire\Component;

class CreateWeeklyReportModal extends Component
{
    public $startdate;
    public $enddate;
    public $objectives;
    public $activitiescompleted;
    public $challenges;
    
    public function render()
    {
        return view('livewire.create-weekly-report-modal');
    }

    public function createReport(){
        // dd($this->objectives);
        WeeklyReport::create([
            'StartDate' => $this->startdate,
            'EndDate' => $this->enddate,
            'Objectives' => $this->objectives,
            'ActivitiesCompleted' => $this->activitiescompleted,
            'Challenges' => $this->challenges
        ]);

        $this->reset();
        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Report created successfully');
    }
}
