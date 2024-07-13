<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\PickupContact;
use App\Models\Student;
use App\Models\TimeSlot;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class Controller
{
    public function index()
    {
        $appointments = Appointment::all();

        $events = [];

        foreach ($appointments as $appointment){
            $events[] = [
                'id' => $appointment->AppointmentID,
                'title' => $appointment->Title,
                'start' => $appointment->StartDate,
                'end' => $appointment->EndDate
            ];
        }

        return view('home', compact('events'));
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

    public function bookAppointment($date){
        $today = Carbon::now('AST')->startOfDay();
        $requestDate = Carbon::parse($date);
        $latestDate = Carbon::now('AST')->startOfDay()->addDays(7);

        if($requestDate->greaterThan($latestDate)){
            return redirect()->route('/')->with('error', 'Parents are not authorized to book more than 7 days in advance');
        }
        // elseif($requestDate->lessThan($today)){
        //     return redirect()->route('/')->with('error', 'Day has already passed');
        // }
        else{
            return view('bookappointment', compact('date'));
        }
    }
}
