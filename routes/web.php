<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\DirectionController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('admin','Admin');
Route::resource('demandeur',DemandeurController::class);
Route::prefix('directions')->group(function(){
    Route::get('/', [DirectionController::class, 'index'])->name('direction.index');
    Route::get('/create', [DirectionController::class, 'create'])->name('direction.create');
    Route::post('/create', [DirectionController::class, 'store'])->name('direction.store');
    Route::get('/edit/{direction}', [DirectionController::class, 'edit'])->name('direction.edit');
    Route::put('/update/{direction}', [DirectionController::class, 'update'])->name('direction.update');
    Route::get('/{direction}', [DirectionController::class, 'delete'])->name('direction.delete');

});