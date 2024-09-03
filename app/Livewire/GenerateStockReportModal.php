<?php

namespace App\Livewire;

use App\Models\StockTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Component;

class GenerateStockReportModal extends Component
{
    public $startdate;
    public $enddate;
    public $reportGenerated = false;

    public function render()
    {
        return view('livewire.generate-stock-report-modal');
    }

    public function generateReport(){
        $this->validate([
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate'
        ]);
        sleep(1);
        $this->reportGenerated = true;
    }

    public function reset(...$properties)
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reportGenerated = false;
        $this->startdate = null;
        $this->enddate = null;
    }
}
