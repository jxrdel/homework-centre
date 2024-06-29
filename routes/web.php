<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/Login', [Controller::class, 'login'])->name('login');
Route::get('/Logout', [Controller::class, 'logout'])->name('logout');
Route::get('/Register', [Controller::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [Controller::class, 'index'])->name('/');
    Route::get('/Admin', [Controller::class, 'admin'])->name('admin');
    Route::get('/MyChildren', [Controller::class, 'myChildren'])->name('mychildren');
    
    Route::get('/myappointments', [Controller::class, 'getMyAppointments'])->name('myappointments');
    Route::get('/gettimeslots', [Controller::class, 'getTimeSlots'])->name('gettimeslots');
    Route::get('/getappointmentcount', [Controller::class, 'getAppointmentCount'])->name('getappointmentcount');
});
