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

    public function createStudent(){
        return view('student-create');
    }
    public function editStudent($id){
        $student = Student::find($id);

        //Checks if user has access to edit the child
        if (Gate::denies('edit', $student)) {
            return Redirect::route('mychildren')->with('error', 'You are not authorized to edit this child');
        }

        return view('student-edit', compact('student'));
    }

    public function viewStudent($id){
        $student = Student::find($id);
        
        $parents = $student->parents()->get();
        
        $pickups = null;
        foreach ($parents as $parent) {
            $pickupcontacts = $parent->pickupcontacts()->get();
            if ($pickupcontacts) {
                $pickups = $pickupcontacts;
            }
        }
        // dd($pickups);
        $emergencycontact = $student->emergencyContact();


        if (Gate::denies('view', $student)) {
            return Redirect::route('mychildren')->with('error', 'You are not authorized to edit this child');
        }

        return view('student-view', compact('student', 'emergencycontact', 'pickups'));

    }
    
}
