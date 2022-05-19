<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserManage;
use App\Http\Controllers\OrderTeacherController;
use App\Http\Controllers\OrderStudentController;
use App\Http\Controllers\PostController;

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
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});


// siempre que ponga "/" me redireccione al index
Route::resource('/', InicioController::class)->only('index');

Route::group(['middleware' => 'auth'], function () {

    // Accesible para estudiantes y profesores
    Route::resource('socials', SocialController::class);

    // Crear editar y eliminar Post como Profesor / Ver Post Como Alumno
    Route::resource('posts', PostController::class);

    /* --------------------------------------------------------------------------------- */
        // Mostrar Todos los Posts del Curso en cuestíon
        Route::get('/ordersstudent/{Curso}/postsCurso/', [PostController::class, 'postsCurso'])->name('posts.postsCurso');
    /* --------------------------------------------------------------------------------- */

    Route::group(['middleware' => 'alumno', 'prefix' => 'alumno'], function () {
        Route::resource('alumnoviews', StudentController::class);

        // Listado y eliminar(cancelar) pedidos
        Route::resource('ordersstudent', OrderStudentController::class);

        // Crear pedido como Alumno
        Route::get('/ordersstudent/{cursoQuePide}/createOne/', [OrderStudentController::class, 'createOrder'])->name('ordersstudent.createOrder');

        // Ver la información del pedido
        Route::get('/ordersstudent/{idOrder}/infoOrder/', [OrderStudentController::class, 'infoOrder'])->name('ordersstudent.infoOrder');
    });

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::resource('platforms', PlatformController::class);
        Route::resource('manageusers', UserManage::class);
        Route::resource('levels', LevelController::class);
    });

    Route::group(['middleware' => 'profesor', 'prefix' => 'profesor'], function () {
        Route::resource('teacherviews', TeacherController::class);
        Route::resource('cursos', CourseController::class);
        Route::resource('ordersteacher', OrderTeacherController::class);

        /* --------------------------------------------------------------------------------- */
            // Crear Post como Profesor del Curso en cuestíon
            Route::get('/posts/{infoCurso}/createPost/', [PostController::class, 'createPost'])->name('posts.createPost');
        /* --------------------------------------------------------------------------------- */

        Route::resource('estudios', StudyController::class);
    });
});
