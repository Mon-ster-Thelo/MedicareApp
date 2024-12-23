<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/',[ProjectController::class, 'getData']);



Route::get('/', [ProjectController::class,'getAllDepartments'])->name('home');

Route::post('/showAppointments',[ProjectController::class,'showAppointments'])->name('showAppointments')->middleware('auth');

Route::post('/bookAppointment',[ProjectController::class,'bookAppointment'])->name('bookAppointment')->middleware('auth');

Route::get('/myBookings',[ProjectController::class,'myBookings'])->name('myBookings')->middleware('auth');

Route::post('/cancelBooking',[ProjectController::class,'cancelBooking'])->name('cancelBooking')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});