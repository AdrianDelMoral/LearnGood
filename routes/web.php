<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/', function () {
    return view('home');
}); */

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

/*
    Route::get('prueba', function () {

    })->middleware(['auth:sanctum', 'profesor']);

    Route::get('prueba', function () {

    })->middleware(['auth:sanctum', 'alumno']);

    Route::get('prueba', function () {

    })->middleware(['auth:sanctum', 'administrador']);

    Route::get('no-autorizado', function () {
        return "Usted no está autorizado";
    })->middleware(['auth:sanctum','administrador']);
*/

/*
    Aplico un middleware previamente creado y configurado
    solo podrá acceder la gente autentificada con dicho rol
*/
    // Route::middleware(['auth', 'administrador'])->group(function () {
    //      Route::resource('/Panel-De-Administrador', AdminController::class);
    //});

    // Route::middleware(['auth', 'profesor'])->group(function () {
    //     //Route::resource('/Profesor-Inicio', TeacherController::class);
    //     Route::resource('/precios', PriceController::class);
    // });

// Route::middleware(['auth', 'alumno'])->group(function () {
//     //Route::resource('/Alumno-Inicio', StudentController::class);
//     Route::get('/{id}', [StudentController::class, 'show'])->name('alumno.show');
// });

Route::group(['middleware' => 'auth'], function() {
    //Route::resource('/precios', PriceController::class);

    Route::group(['middleware' => 'alumno', 'prefix' => 'alumno'], function() {
        Route::get('/{id}', [StudentController::class, 'show'])->name('alumno.show');
    });

    Route::group(['middleware' => 'administrador', 'prefix' => 'administrador'], function() {
      //  Route::get('/{id}', [StudentController::class, 'show'])->name('alumno.show');
    });

    Route::group(['middleware' => 'profesor', 'prefix' => 'profesor'], function() {
        Route::resource('/precios', PriceController::class);
    });


});


