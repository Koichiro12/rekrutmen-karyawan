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
        
        
        Route::get('/jobs/{id}/test', [LowonganController::class, 'view_test'])->name('view_test');
        Route::post('/jobs/test/store', [LowonganController::class, 'store_test'])->name('store_test');
        Route::put('/jobs/test/{id}/update', [LowonganController::class, 'update_test'])->name('update_test');
        Route::delete('/jobs/test/{id}/delete', [LowonganController::class, 'destroy_test'])->name('delete_test');
        
        Route::get('/jobs/{id}/psikotest', [LowonganController::class, 'view_psikotest'])->name('view_psikotest');
        Route::post('/jobs/psikotest/store', [LowonganController::class, 'store_psikotest'])->name('store_psikotest');
        Route::put('/jobs/psikotest/{id}/update', [LowonganController::class, 'update_psikotest'])->name('update_psikotest');
        Route::delete('/jobs/psikotest/{id}/delete', [LowonganController::class, 'destroy_psikotest'])->name('delete_psikotest');
        
        Route::get('/jobseekers', [JobSeekersController::class, 'index'])->name('jobseekers');
        Route::get('/jobseekers/{id}/detail', [JobSeekersController::class, 'detail'])->name('jobseeker_detail');
        Route::resource('users',UsersController::class);
    });
    Route::group(['middleware' => ['role:User']], function () {
        Route::get('/personal_data', [PersonalDataController::class, 'index'])->name('personal_data');
        Route::post('/personal_data/update', [PersonalDataController::class, 'update'])->name('update_personal_data');
       
        Route::resource('educations',EducationController::class);
        Route::resource('experiences',ExperienceController::class);
        Route::resource('skills',SkillsController::class);
        Route::resource('trainings',TrainingController::class);
       
        Route::get('/search_job', [\App\Http\Controllers\User\JobseekersController::class, 'search_job'])->name('search_job');
        Route::post('/search_job/{id}/apply', [\App\Http\Controllers\User\JobseekersController::class, 'apply'])->name('apply');
        Route::get('/search_job/{id}/detail', [\App\Http\Controllers\User\JobseekersController::class, 'detail'])->name('detail_job');
        
        Route::get('/my_apply_job', [\App\Http\Controllers\User\JobseekersController::class, 'apply_job'])->name('apply_job');
        
        Route::get('/my_apply_job/{id}/test', [\App\Http\Controllers\User\JobseekersController::class, 'apply_test'])->name('apply_test');
        Route::post('/my_apply_job/{id}/test/submit', [\App\Http\Controllers\User\JobseekersController::class, 'submit_apply_test'])->name('submit_apply_test');

        Route::get('/my_apply_job/{id}/psikotest', [\App\Http\Controllers\User\JobseekersController::class, 'apply_psikotest'])->name('apply_psikotest');
        Route::post('/my_apply_job/{id}/psikotest/submit', [\App\Http\Controllers\User\JobseekersController::class, 'submit_apply_psikotest'])->name('submit_apply_psikotest');
    });
  
    
    
});