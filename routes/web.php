<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/Login', [Controller::class, 'login'])->name('login');
Route::get('/Logout', [Controller::class, 'logout'])->name('logout');
Route::get('/Register', [Controller::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [Controller::class, 'index'])->name('/');

    Route::get('/Admin/Classes', [AdminController::class, 'admin'])->name('admin.classes');
    Route::get('/Admin/Registration', [AdminController::class, 'adminRegistration'])->name('admin.registration');
    Route::get('/Admin/Students/All', [AdminController::class, 'allStudents'])->name('admin.students.all');
    Route::get('/getallstudents', [AdminController::class, 'getAllStudents'])->name('admin.getallstudents');
    Route::get('/Admin/Parents/All', [AdminController::class, 'allParents'])->name('admin.parents.all');
    Route::get('/getallparents', [AdminController::class, 'getAllParents'])->name('admin.getallparents');
    Route::get('/Students/View/{id}', [StudentController::class, 'viewStudent'])->name('admin.students.view');
    Route::get('/Admin/Appointments', [AdminController::class, 'adminAppointments'])->name('admin.appointments');
    Route::get('/Admin/Appointments/Book/{date}', [AdminController::class, 'bookAppointmentAdmin'])->name('admin.appointments.book');


    Route::get('/MyChildren', [StudentController::class, 'myChildren'])->name('mychildren');
    Route::get('/Students/Edit/{id}', [StudentController::class, 'editStudent'])->name('student.edit');


    Route::get('/EmergencyContact', [ParentController::class, 'emergencyContact'])->name('emergencycontact');
    Route::get('/PickupContacts', [ParentController::class, 'pickupContacts'])->name('pickupcontacts');
    Route::get('/MyProfile', [ParentController::class, 'myProfile'])->name('myprofile');
    Route::get('/getpickupcontacts', [ParentController::class, 'getPickupContacts'])->name('getpickupcontacts');

    // Appointments
    Route::get('/myappointments', [AppointmentController::class, 'getMyAppointments'])->name('myappointments');
    Route::get('/BookAppointment/{date}', [AppointmentController::class, 'bookAppointment'])->name('bookappointment');
    Route::get('/gettimeslots', [AppointmentController::class, 'getTimeSlots'])->name('gettimeslots');
    Route::get('/gettimeslotdates', [AppointmentController::class, 'getTimeslotDates'])->name('gettimeslotdates');
    Route::get('/getappointmentcount', [AppointmentController::class, 'getAppointmentCount'])->name('getappointmentcount');
});
