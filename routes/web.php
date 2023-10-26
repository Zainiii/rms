<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;

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


Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate'])->name('login_post');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile/{type}', [UserController::class, 'profile_post'])->name('profile_update');

    Route::get('templates/{applicant?}', [TemplateController::class, 'templates'])->name('templates');
    Route::get('template/{id}/{applicant?}', [TemplateController::class, 'view'])->name('template.view');
    Route::get('generate/{id}/{applicant}', [TemplateController::class, 'generate'])->name('template.generate');
    Route::get('template_builder', [TemplateController::class, 'builder'])->name('builder');
    Route::post('new_template', [TemplateController::class, 'template_new_post'])->name('template_new_post');

    Route::get('new_applicant', [ApplicantController::class, 'applicant_new'])->name('applicant_new');
    Route::post('new_applicant', [ApplicantController::class, 'applicant_new_post'])->name('applicant_new_post');
    Route::get('applicants', [ApplicantController::class, 'applicants'])->name('applicants');

    Route::get('configuration', [SettingController::class, 'configuration'])->name('configuration');

    Route::post('update_tag/{id?}', [SettingController::class, 'update_tag'])->name('update_tag');

    Route::post('update_section/{id?}', [SettingController::class, 'update_section'])->name('update_section');
});
