<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Complaint;
use App\Models\PickupContact;
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
    public function appointments()
    {

        return view('appointments');
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

    public function generatePDF(){
        // $pdf = App::make('dompdf.wrapper');
        $complaint = Complaint::find(1);
        $pdf = Pdf::loadView('PDF.complaint', compact('complaint'));
        return $pdf->stream();
    }
}
