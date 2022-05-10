<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PriceController;

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

Route::resource('/', InicioController::class)->only('index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => 'auth'], function() {
    //Route::resource('/precios', PriceController::class);

    Route::group(['middleware' => 'alumno', 'prefix' => 'alumno'], function() {
        Route::get('/{id}', [StudentController::class, 'show'])->name('alumno.show');
    });

    Route::group(['middleware' => 'administrador', 'prefix' => 'administrador'], function() {
        // Route::get('/{id}', [StudentController::class, 'show'])->name('alumno.show');
    });

    Route::group(['middleware' => 'profesor', 'prefix' => 'profesor'], function() {
        Route::resource('/precios', PriceController::class);
    });
});
