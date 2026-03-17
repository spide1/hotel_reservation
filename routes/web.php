<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\RoomTypeController as AdminRoomTypeController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/search', [HomeController::class,'search']);

Route::get('/rooms', [RoomController::class,'index'])->name('rooms.index');

Route::get('/room-type/{id}', [HomeController::class,'roomsByType'])->name('rooms.index');


/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function(){

    Route::post('/reservation',[ReservationController::class,'store']);

    Route::get('/my-bookings',[ReservationController::class,'myBookings']);

    Route::patch('/reservation/{id}/cancel',[ReservationController::class,'cancel'])
        ->name('reservation.cancel');
    
        Route::post('/admin/reservations/{id}/approve', [AdminReservationController::class,'approve']);    

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){

    Route::get('/dashboard',[AdminController::class,'dashboard'])
        ->name('admin.dashboard');

    Route::get('/rooms',[AdminRoomController::class,'index'])
        ->name('admin.rooms');
    
    Route::post('/rooms',[AdminRoomController::class,'store']);

    Route::put('/rooms/{id}',[AdminRoomController::class,'update']);
    
    Route::delete('/rooms/{id}',[AdminRoomController::class,'destroy']);    

    Route::get('/room-types',[AdminRoomTypeController::class,'index'])
        ->name('admin.roomtypes');

    Route::post('/room-types',[AdminRoomTypeController::class,'store']);

    Route::put('/room-types/{id}',[AdminRoomTypeController::class,'update']);

    Route::delete('/room-types/{id}',[AdminRoomTypeController::class,'destroy']);

    Route::get('/reservations',[AdminReservationController::class,'index'])
        ->name('admin.reservations');

    Route::post('/reservations/{id}/approve',[AdminReservationController::class,'approve']);

    Route::post('/reservations/{id}/decline',[AdminReservationController::class,'decline']);

});


/*
|--------------------------------------------------------------------------
| Dashboard & Profile
|--------------------------------------------------------------------------
*/

Route::view('dashboard', 'dashboard')
    ->middleware(['auth','verified','admin'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';