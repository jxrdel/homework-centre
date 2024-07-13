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
    Route::get('/Admin', [AdminController::class, 'admin'])->name('admin');


    Route::get('/MyChildren', [StudentController::class, 'myChildren'])->name('mychildren');
    Route::get('/Students/Edit/{id}', [StudentController::class, 'editStudent'])->name('student.edit');
    Route::get('/Students/All', [StudentController::class, 'allStudents'])->name('student.all');
    Route::get('/getallstudents', [StudentController::class, 'getAllStudents'])->name('getallstudents');


    Route::get('/EmergencyContact', [ParentController::class, 'emergencyContact'])->name('emergencycontact');
    Route::get('/PickupContacts', [ParentController::class, 'pickupContacts'])->name('pickupcontacts');
    Route::get('/MyProfile', [ParentController::class, 'myProfile'])->name('myprofile');
    Route::get('/getpickupcontacts', [ParentController::class, 'getPickupContacts'])->name('getpickupcontacts');

    Route::get('/BookAppointment/{date}', [Controller::class, 'bookAppointment'])->name('bookappointment');

    Route::get('/myappointments', [AppointmentController::class, 'getMyAppointments'])->name('myappointments');
    Route::get('/gettimeslots', [AppointmentController::class, 'getTimeSlots'])->name('gettimeslots');
    Route::get('/gettimeslotdates', [AppointmentController::class, 'getTimeslotDates'])->name('gettimeslotdates');
    Route::get('/getappointmentcount', [AppointmentController::class, 'getAppointmentCount'])->name('getappointmentcount');
});
