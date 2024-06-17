<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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

    public function getMyAppointments(){

        $appointments = Appointment::select('AppointmentID as id', 'Title as title', 'StartDate as start', 'EndDate as end')
            ->get();

        return response()->json($appointments);
    }


    public function getAppointmentCount(){


        // Fetch all appointments
        $appointments = Appointment::all();

        // Determine the dates that have appointments
        $dates = [];
        foreach ($appointments as $appointment) {
            // Create a period from StartDate to EndDate - 1 day
            $endDate = Carbon::parse($appointment->EndDate);
            $period = CarbonPeriod::create($appointment->StartDate, $endDate);

            foreach ($period as $date) {
                $dateStr = $date->format('Y-m-d');
                if (!isset($dates[$dateStr])) {
                    $dates[$dateStr] = 0;
                }
                $dates[$dateStr]++;
            }
        }

        return response()->json($dates);
    }

    public function admin(){
        return view('admin');
    }
}
