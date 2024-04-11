<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\DirectionsController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('admin','Admin');
Route::resource('demandeur',DemandeurController::class);
Route::resource('directions',DirectionsController::class);
