<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');
Route::get('/locations', function () {
    return Inertia::render('user/Locations');
})->name('locations');
Route::get('/benefits', function () {
    return Inertia::render('user/Benefits');
})->name('benefits');
Route::get('/community', function () {
    return Inertia::render('user/Community');
})->name('community');


Route::get('/room',[RoomController::class,'index']);
Route::get('/room/{id}',[RoomController::class,'show']);


Route::get('/facility',[FacilityController::class,'index']);
Route::get('/facility/{id}',[FacilityController::class,'show']);


Route::middleware(['auth'])->prefix('admin')->group(function (){
   Route::get('/',function () {
       return Inertia::render('admin/Home');
   })->name('dashboard');
    Route::get('/facility',function () {
        return Inertia::render('admin/Facility');
    })->name('facility');
    Route::get('/room-type',function () {
        return Inertia::render('admin/RoomType');
    })->name('roomType');

    Route::post('/room',[RoomController::class,'store']);
    Route::patch('/room/{id}',[RoomController::class,'update']);
    Route::delete('/room/{id}',[RoomController::class,'destroy']);


    Route::post('/facility',[FacilityController::class,'store']);
    Route::patch('/facility/{id}',[FacilityController::class,'update']);
    Route::delete('/facility/{id}',[FacilityController::class,'destroy']);
});

//Route::get('/rooms', [RoomController::class, 'getAllRooms']);
//Route::post('/rooms', [RoomController::class, 'addRoom']);
//Route::get('dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
