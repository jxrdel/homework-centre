<?php

namespace App\Http\Controllers;

use App\Models\AccidentReport;
use App\Models\Appointment;
use App\Models\Complaint;
use App\Models\IncidentReport;
use App\Models\PickupContact;
use App\Models\StockItem;
use App\Models\StockTransaction;
use App\Models\Student;
use App\Models\TimeSlot;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(){
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){
        return view('register');
    }

    // public function generatePDF(){ Testing purposes
    //     // $pdf = App::make('dompdf.wrapper');
    //     $incident = IncidentReport::find(1);
    //     $pdf = Pdf::loadView('PDF.incident', compact('incident'));
    //     return $pdf->stream();
    // }
    
    //Generate PDF for stock report
    public function generateStockReport($startdate, $enddate){
        $startdate = Carbon::parse($startdate)->startOfDay();
        $enddate = Carbon::parse($enddate)->endOfDay();
        $transactions = StockTransaction::whereBetween('created_at', [$startdate, $enddate])
                        ->with('stockItem')
                        ->get()
                        ->groupBy('stockItem.ItemName');
        $pdf = Pdf::loadView('PDF.transactionreport', compact('transactions', 'startdate', 'enddate'));
        return $pdf->stream();
    }
}
