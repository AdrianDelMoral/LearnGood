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

Route::group(['middleware'=>'auth'], function(){
    Route::group(['middleware'=>'administrador'], function(){
        Route::resource('/panel-de-administrador', AdminController::class);
    });
    Route::group(['middleware'=>'alumno'], function(){
        Route::resource('/alumno-inicio', StudentController::class);
    });
    Route::group(['middleware'=>'profesor'], function(){
        Route::resource('/profesor-inicio', TeacherController::class);
        //     Route::resource('/prices_inicio', PriceController::class);

   Route::get('/prices_inicio/{user}', [PriceController::class, 'show'])->name('prices_inicio');
    });
});
/*
    Route::middleware(['auth', 'administrador'])->group(function () {
    });

    Route::middleware(['auth', 'profesor'])->group(function () {
    });

    Route::middleware(['auth', 'alumno'])->group(function () {
    });
*/
