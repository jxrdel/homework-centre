<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{

    public function myChildren(){
        return view('mychildren');
    }


    public function editStudent($id){
        $student = Student::find($id);

        //Checks if user has access to edit the child
        if (Gate::denies('edit', $student)) {
            return Redirect::route('mychildren')->with('error', 'You are not authorized to edit this child');
        }

        return view('student-edit');
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
}
