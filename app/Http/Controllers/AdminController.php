<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationSuccessful;
use App\Models\AccidentReport;
use App\Models\Feedback;
use App\Models\IncidentReport;
use App\Models\StockItem;
use App\Models\Student;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\WeeklyReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function userControl(){

        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('superadmin-users');
    }
    
    public function getAdminUsers(){

        $users = User::where('IsAdmin', true)
        ->orWhere('IsSuperAdmin', true)
        ->get();

        return DataTables::of($users)->make(true);
    }

    public function admin(){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('admin');
    }
    
    public function adminRegistration(){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

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

    public function viewParent($id){
        $parent = User::find($id);

        $emergencycontact = $parent->emergencycontact;

        $pickupcontacts = $parent->pickupcontacts;

        $children = $parent->students;

        if (Gate::denies('view-all-parents')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('parent-view', compact('parent', 'emergencycontact', 'pickupcontacts', 'children'));
    }

    public function editParent($id){
        $parent = User::find($id);

        if (Gate::denies('view-all-parents')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('parent-edit', compact('parent'));
    }

    public function adminAppointments(){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('admin-appointments');
    }
    
    public function bookAppointmentAdmin($date){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('admin-bookappointment', compact('date'));
    }
    
    public function viewStudent($id){
        
        $student = Student::find($id);

        if (Gate::denies('view', $student)) {
            return Redirect::route('mychildren')->with('error', 'You are not authorized to view this child');
        }

        return view('admin-student-view', compact('student'));

    }
    
    public function editStudent($id){
        $student = Student::find($id);

        //Checks if user has access to edit the child
        if (Gate::denies('edit', $student)) {
            return Redirect::route('mychildren')->with('error', 'You are not authorized to edit this child');
        }

        return view('admin-student-edit', compact('student'));
    }

    public function adminFeedback(){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('admin-feedback');
    }

    public function getAllFeedbackForms(){

        $feedbackforms = Feedback::all();
        $query = $feedbackforms->map(function ($form) {
            $form->created_at_formatted = Carbon::parse($form->created_at)->isoFormat('MMMM Do, YYYY');
            return $form;
        });

        return DataTables::of($query)->make(true);
    }

    public function weeklyReports(){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('admin-weeklyreports');
    }

    public function getWeeklyReports(){

        $reports = WeeklyReport::all();

        return DataTables::of($reports)->make(true);
    }

    public function stock(){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        return view('admin-stock');
    }

    public function getStock(){

        $stock = StockItem::all();

        return DataTables::of($stock)->make(true);
    }

    public function attendance(){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }

        $today = Carbon::now('AST')->toDateString();
        $classes = TimeSlot::whereDate('StartTime', $today)->get();
        $today = Carbon::now('AST')->isoFormat('MMMM Do, YYYY');
        // dd($today);
        return view('admin-attendance', compact('classes', 'today'));
    }

    public function classAttendance($id){
        
        if (Gate::denies('view-admin-pages')) {
            return Redirect::route('/')->with('error', 'You are not authorized to view this page');
        }
        
        $class = TimeSlot::find($id);
        $starttime = Carbon::parse($class->StartTime)->isoFormat('MMMM Do YYYY, h:mm A');
        $endtime = Carbon::parse($class->EndTime)->isoFormat('h:mm A');
        $today = Carbon::now('AST')->isoFormat('MMMM Do, YYYY');
        return view('admin-attendance-class', compact('class', 'today', 'starttime', 'endtime'));
    }

    public function forms(){
        return view('admin-forms');
    }

    public function getAccidentReports(){

        $reports = AccidentReport::all();

        return DataTables::of($reports)->make(true);
    }

    public function getIncidentReports(){

        $reports = IncidentReport::all();

        return DataTables::of($reports)->make(true);
    }

}
