<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserManage;
use App\Http\Livewire\PricesComponent;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });


// siempre que ponga "/" me redireccione al index
Route::resource('/', InicioController::class)->only('index');

Route::group(['middleware' => 'auth'], function() {

    Route::resource('socials', SocialController::class);

    Route::group(['middleware' => 'alumno', 'prefix' => 'alumno'], function() {
        Route::resource('alumnoviews', StudentController::class);
    });

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
        Route::resource('platforms', PlatformController::class);
        Route::resource('manageusers', UserManage::class);
        Route::resource('levels', LevelController::class);
    });

    Route::group(['middleware' => 'profesor', 'prefix' => 'profesor'], function() {
        Route::resource('teacherviews', TeacherController::class);
        Route::resource('precios', PriceController::class);
        Route::resource('estudios', StudyController::class);
    });

});
