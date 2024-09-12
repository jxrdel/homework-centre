<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Livewire\CreateAccidentForm;
use App\Livewire\CreateComplaintForm;
use App\Livewire\CreateIncidentForm;
use App\Livewire\CreateStudentAdmin;
use App\Livewire\EditStockItem;
use App\Livewire\WaitingList;
use App\Livewire\WaitingListTable;
use Illuminate\Support\Facades\Route;

Route::get('/Login', [Controller::class, 'login'])->name('login');
Route::get('/Logout', [Controller::class, 'logout'])->name('logout');
Route::get('/Register', [Controller::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [Controller::class, 'index'])->name('/');
    // Route::get('/Home', [Controller::class, 'index'])->name('home');
    
    Route::get('/SuperAdmin/Users', [AdminController::class, 'userControl'])->name('superadmin.users');
    Route::get('/getadminusers', [AdminController::class, 'getAdminUsers'])->name('admin.getadminusers');

    Route::get('/Admin/Classes', [AdminController::class, 'admin'])->name('admin.classes');
    Route::get('/Admin/Registration', [AdminController::class, 'adminRegistration'])->name('admin.registration');
    Route::get('/Admin/Students/All', [AdminController::class, 'allStudents'])->name('admin.students.all');
    Route::get('/getallstudents', [AdminController::class, 'getAllStudents'])->name('admin.getallstudents');
    Route::get('/Admin/Students/View/{id}', [AdminController::class, 'viewStudent'])->name('admin.students.view');
    Route::get('/Admin/Students/Edit/{id}', [AdminController::class, 'editStudent'])->name('admin.students.edit');
    Route::get('/Admin/Students/Create', CreateStudentAdmin::class)->name('admin.students.create');
    Route::get('/Admin/Appointments', [AdminController::class, 'adminAppointments'])->name('admin.appointments');
    Route::get('/Admin/Appointments/Book/{date}', [AdminController::class, 'bookAppointmentAdmin'])->name('admin.appointments.book');
    Route::get('/Admin/Parents/All', [AdminController::class, 'allParents'])->name('admin.parents.all');
    Route::get('/getallparents', [AdminController::class, 'getAllParents'])->name('admin.getallparents');
    Route::get('/Admin/Parents/View/{id}', [AdminController::class, 'viewParent'])->name('admin.parents.view');
    Route::get('/Admin/Parents/Edit/{id}', [AdminController::class, 'editParent'])->name('admin.parents.edit');
    Route::get('/Admin/Feedback', [AdminController::class, 'adminFeedback'])->name('admin.feedback');
    Route::get('/getallfeedbackforms', [AdminController::class, 'getAllFeedbackForms'])->name('admin.getallfeedbackforms');
    Route::get('/Admin/WeeklyReports', [AdminController::class, 'weeklyReports'])->name('admin.weeklyreports');
    Route::get('/getweeklyreports', [AdminController::class, 'getWeeklyReports'])->name('admin.getweeklyreports');
    Route::get('/Admin/Attendance', [AdminController::class, 'attendance'])->name('admin.attendance');
    Route::get('/Admin/Attendance/{id}', [AdminController::class, 'classAttendance'])->name('admin.attendance.class');
    Route::get('/Admin/Forms', [AdminController::class, 'forms'])->name('admin.forms');
    Route::get('/Admin/Forms/Accident/Create', CreateAccidentForm::class)->name('admin.forms.accident.create');
    Route::get('/getaccidentreports', [AdminController::class, 'getAccidentReports'])->name('admin.getaccidentreports');
    Route::get('/Admin/Forms/Incident/Create', CreateIncidentForm::class)->name('admin.forms.incident.create');
    Route::get('/getincidentreports', [AdminController::class, 'getIncidentReports'])->name('admin.getincidentreports');
    Route::get('/Admin/Forms/Complaint/Create', CreateComplaintForm::class)->name('admin.forms.complaint.create');
    Route::get('/getcomplaints', [AdminController::class, 'getComplaints'])->name('admin.getcomplaints');
    Route::get('/Admin/WaitingList', WaitingListTable::class)->name('admin.waitinglist');
    Route::get('/Admin/Stock', [AdminController::class, 'stock'])->name('admin.stock');
    Route::get('/getstock', [AdminController::class, 'getStock'])->name('admin.getstock');
    Route::get('/Admin/Stock/Edit/{id}', EditStockItem::class)->name('admin.stock.edit');


    Route::get('/MyChildren', [StudentController::class, 'myChildren'])->name('mychildren');
    Route::get('/Students/Create', [StudentController::class, 'createStudent'])->name('student.create');
    Route::get('/Students/Edit/{id}', [StudentController::class, 'editStudent'])->name('student.edit');
    Route::get('/Students/View/{id}', [StudentController::class, 'viewStudent'])->name('student.view');


    Route::get('/EmergencyContact', [ParentController::class, 'emergencyContact'])->name('emergencycontact');
    Route::get('/PickupContacts', [ParentController::class, 'pickupContacts'])->name('pickupcontacts');
    Route::get('/MyProfile', [ParentController::class, 'myProfile'])->name('myprofile');
    Route::get('/getpickupcontacts', [ParentController::class, 'getPickupContacts'])->name('getpickupcontacts');
    Route::get('/Feedback', [ParentController::class, 'feedback'])->name('feedback');
    Route::get('/getmyfeedbackforms', [ParentController::class, 'getMyFeedbackForms'])->name('getmyfeedbackforms');
    Route::get('/Complaint', CreateComplaintForm::class)->name('complaint');

    // Appointments
    Route::get('/Appointments', [AppointmentController::class, 'appointments'])->name('appointments');
    Route::get('/myappointments', [AppointmentController::class, 'getMyAppointments'])->name('myappointments');
    Route::get('/BookAppointment/{date}', [AppointmentController::class, 'bookAppointment'])->name('bookappointment');
    Route::get('/gettimeslots', [AppointmentController::class, 'getTimeSlots'])->name('gettimeslots');
    Route::get('/gettimeslotdates', [AppointmentController::class, 'getTimeslotDates'])->name('gettimeslotdates');
    Route::get('/getappointmentcount', [AppointmentController::class, 'getAppointmentCount'])->name('getappointmentcount');

    Route::get('/generatePDF', [Controller::class, 'generatePDF'])->name('generatepdf');
    Route::get('/generateStockReport/{startdate}/{enddate}', [Controller::class, 'generateStockReport'])->name('generatereport');

});
