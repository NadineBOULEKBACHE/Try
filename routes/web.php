<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\DirectionsController;
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\ColonesController;
use App\Http\Controllers\EtageresController;
use App\Http\Controllers\RayonsController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('admin','Admin');
// Route::resource('demandeur',DemandeurController::class);
Route::resource('directions',DirectionsController::class);
Route::resource('departements',DepartementsController::class);
Route::resource('rayons',RayonsController::class);
Route::resource('colones',ColonesController::class);
Route::resource('etageres',EtageresController::class);
