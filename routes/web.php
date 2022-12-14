<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Middleware\admin;
use App\Http\Middleware\student;
use App\Models\Semester;


Route::middleware([admin::class])->group(function () {
    route::resource('/project','App\Http\Controllers\ProjectController');
    route::get('/main',['App\Http\Controllers\ProjectController','main'])->name('project.main');;
    route::get('/myProjects',['App\Http\Controllers\ProjectController','myProjects'])->name('project.myProjects');;
    route::get('/project/{project}/apply',['App\Http\Controllers\ProjectController','apply'])->name('project.apply');;
    route::view('/adminApproval','website.student.projects.adminApproval')->name('project.adminApproval');;
    route::get('/pendingProject',['App\Http\Controllers\ProjectController','pendingProject'])->name('project.pending');;
    route::get('/acceptedProject',['App\Http\Controllers\ProjectController','acceptedProject'])->name('project.accepted');;
    route::get('/suggestedProject',['App\Http\Controllers\ProjectController','suggestedProject'])->name('project.suggested');;
    route::get('/project/changeStatus/{project}',['App\Http\Controllers\ProjectController','changeStatus'])->name('project.changeStatus');;
    route::get('/doctors',['App\Http\Controllers\DoctorController','index'])->name('doctors.index');;
});

Route::get('/',['App\Http\Controllers\Auth\HomeController','redirectAfterLogin'] )->name('home');
route::view('/login','website.login')->name('website.login');
route::post('/login',['App\Http\Controllers\Auth\LoginController','authenticate'])->name('post.login');
Route::post('/logout', ['App\Http\Controllers\Auth\LoginController','logout'])->name('website.logout');
Route::get('/reserPassword', ['App\Http\Controllers\Auth\ResetPasswordController','index'])->name('reserPassword.index');
Route::post('/reserPassword', ['App\Http\Controllers\Auth\ResetPasswordController','updatePassword'])->name('reserPassword');
