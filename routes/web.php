<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, AdminController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, "index"]);

// Route::get("/home",[HomeController::class,"redirect"])->middleware("auth","verified");
Route::get("/home",[HomeController::class,"redirect"]);
Route::get("/add-doctor",[AdminController::class,"create"]);
Route::post("/add-doctor",[AdminController::class,"store"]);
Route::get("/appointment",[HomeController::class,"MyAppointment"]);
Route::post("/appointment",[HomeController::class,"appointment"]);
Route::delete("/appointment/{id}",[HomeController::class,"cancelAppointment"]);
Route::get("/admin-appointments",[AdminController::class,"appointments"]);
Route::get("/admin-doctors",[AdminController::class,"showDoctor"]);
Route::patch("/admin-doctors/{id}",[AdminController::class,"updateDoctor"]);
Route::delete("/admin-doctors/{id}",[AdminController::class,"deleteDoctor"]);
Route::get("/admin-doctors/{id}",[AdminController::class,"editDoctor"]);
Route::get("/approved/{id}",[AdminController::class,"approved"]);
Route::get("/approved-cancel/{id}",[AdminController::class,"cancelAppointment"]);
Route::get("/approved-email/{id}", [AdminController::class,"emailView"]);
Route::post("/send-email/{id}", [AdminController::class,"sendEmail"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
