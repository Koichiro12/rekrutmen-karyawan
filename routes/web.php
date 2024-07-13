<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DepartemenController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\JobSeekersController;
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\EducationController;
use App\Http\Controllers\User\ExperienceController;
use App\Http\Controllers\User\PersonalDataController;
use App\Http\Controllers\User\SkillsController;
use App\Http\Controllers\User\TrainingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth_register');

Route::group(['middleware' => ['auth', 'prevent-back']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [DashboardController::class, 'updateProfile'])->name('updateProfile');

    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('departement',DepartemenController::class);
        Route::resource('position',JabatanController::class);
        Route::resource('jobs',LowonganController::class);
        Route::get('/jobseekers', [JobSeekersController::class, 'index'])->name('jobseekers');
        Route::resource('users',UsersController::class);
    });
    Route::group(['middleware' => ['role:User']], function () {
        Route::get('/personal_data', [PersonalDataController::class, 'index'])->name('personal_data');
        Route::resource('educations',EducationController::class);
        Route::resource('experiences',ExperienceController::class);
        Route::resource('skills',SkillsController::class);
        Route::resource('trainings',TrainingController::class);
        Route::get('/search_job', [\App\Http\Controllers\User\JobseekersController::class, 'search_job'])->name('search_job');
        Route::get('/my_apply_job', [\App\Http\Controllers\User\JobseekersController::class, 'apply_job'])->name('apply_job');
    });
  
    
    
});