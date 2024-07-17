<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function admin(){
        return view('admin');
    }
    
    public function adminRegistration(){
        return view('admin-registration');
    }

    public function allStudents(){
        // Gate::authorize('view-all-students'); //Only allows parents and admins to edit children

        if (Gate::denies('view-all-students')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('students-all');
    }

    
    public function getAllStudents(){

        $students = Student::all();

        return DataTables::of($students)->make(true);
    }

    public function allParents(){
        // Gate::authorize('view-all-students'); //Only allows parents and admins to edit children

        if (Gate::denies('view-all-parents')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('parents-all');
    }
    
    public function getAllParents(){

        $parents = User::where('IsParent', 1)->get();

        return DataTables::of($parents)->make(true);
    }

    public function adminAppointments(){
        return view('admin-appointments');
    }
    
    public function bookAppointmentAdmin($date){
        return view('admin-bookappointment', compact('date'));
    }
}
