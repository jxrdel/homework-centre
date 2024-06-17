<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index'])->name('/');
Route::get('/myappointments', [Controller::class, 'getMyAppointments'])->name('myappointments');
Route::get('/getappointmentcount', [Controller::class, 'getAppointmentCount'])->name('getappointmentcount');

Route::get('/Admin', [Controller::class, 'admin'])->name('admin');
