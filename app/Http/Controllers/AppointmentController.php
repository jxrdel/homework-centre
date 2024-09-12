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

    //Parent appointments page
    public function appointments()
    {
        return view('appointments');
    }

    //Parent book appointment page for a given date
    public function bookAppointment($date){
        $today = Carbon::now('AST')->startOfDay();
        $requestDate = Carbon::parse($date);
        $latestDate = Carbon::now('AST')->startOfDay()->addDays(7);

        if($requestDate->greaterThan($latestDate)){//Redirect if the date is more than 7 days in advance
            return redirect()->route('appointments')->with('error', 'Parents are not authorized to book more than 7 days in advance');
        }
        else{
            return view('bookappointment', compact('date'));
        }
    }

    public function getMyAppointments(){

        $user = Auth::user();

        // Fetch appointments for the authenticated user's children
        $appointments = Appointment::whereHas('student', function ($query) use ($user) {
                $query->whereHas('parents', function ($query) use ($user) {
                    $query->where('UserID', $user->id);
                });
            })
            ->with(['student', 'timeslot'])//Eager load the student and timeslot
            ->get()
            ->map(function ($appointment) {
                $appointment->date = substr($appointment->timeslot->StartTime, 0, 10); // Extract date part from datetime
                return $appointment;
            });

        // Group by date and student
        $groupedAppointments = $appointments->groupBy(['date', 'student.StudentID']);

        // Format the appointments for FullCalendar
        $events = $groupedAppointments->flatMap(function($appointmentsByStudent, $date) {
            return $appointmentsByStudent->map(function($appointments, $studentId) use ($date) {
                $student = $appointments->first()->student;
                $title = $student->FirstName . ' ' . $student->LastName;
                return [
                    'title' => $title,
                    'start' => $date, // Date without time
                ];
            });
        })->values();

        return response()->json($events);
    }

    public function getTimeSlots(){

        $timeslots = TimeSlot::select('TimeSlotID as id', 'Title as title', 'StartTime as start', 'EndTime as end')
            ->get();

        return response()->json($timeslots);
    }

    public function getTimeslotDates()
    {
        $daysWithClasses = TimeSlot::select(DB::raw("FORMAT(StartTime, 'yyyy-MM-dd') as date"))
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
