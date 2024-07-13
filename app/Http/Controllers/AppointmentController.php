<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\TimeSlot;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{

    public function getMyAppointments(){

        $user = User::find(Auth::user()->id);

        $studentIds = $user->students->pluck('StudentID');

        // Fetch appointments for the user's children
        $appointments = DB::table('appointments')
            ->whereIn('StudentID', $studentIds)
            ->select('AppointmentID as id', 'Title as title', 'StartDate as start', 'EndDate as end')
            ->get();

        return response()->json($appointments);
    }

    public function getTimeSlots(){

        $timeslots = TimeSlot::select('TimeSlotID as id', 'Title as title', 'StartTime as start', 'EndTime as end')
            ->get();

        return response()->json($timeslots);
    }

    public function getTimeslotDates(){

        $daysWithClasses = TimeSlot::select(DB::raw('DATE(StartTime) as date'))
            ->distinct()
            ->pluck('date');

        return response()->json($daysWithClasses);
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
}
