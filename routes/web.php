<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ApplicantController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('test', [TestController::class, 'showPDF']);
Route::get('testView', [TestController::class, 'viewTest']);


Route::get('templates', [TemplateController::class, 'templates'])->name('templates');
Route::get('template/{id?}', [TemplateController::class, 'view'])->name('template.view');

Route::get('new_applicant', [ApplicantController::class, 'applicant_new'])->name('applicant_new');
Route::post('new_applicant', [ApplicantController::class, 'applicant_new_post'])->name('applicant_new_post');
Route::get('applicants', [ApplicantController::class, 'applicants'])->name('applicants');


