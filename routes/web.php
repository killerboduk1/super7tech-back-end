<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //admin pages
    Route::get('/admin', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('admin');
    //add
    Route::get('/admin/add/employee', [\App\Http\Controllers\EmployeeController::class, 'AddEmployee'])->name('addemployee');
    Route::post('/admin/add/employee', [\App\Http\Controllers\EmployeeController::class, 'AddEmployeePost'])->name('addemployee_post');
    //edit
    Route::get('/admin/edit/employee/{id}', [\App\Http\Controllers\EmployeeController::class, 'EditEmployee'])->name('editemployee');
    Route::post('/admin/edit/employee/{id}', [\App\Http\Controllers\EmployeeController::class, 'EditEmployeePost'])->name('editemployee_post');
    //delete
    Route::post('/admin/delete/employee', [\App\Http\Controllers\EmployeeController::class, 'DeleteEmployeePost'])->name('deleteemployee_post');
    //logout
    Route::delete('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    //login
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
    Route::post('/login/post', [\App\Http\Controllers\UserController::class, 'loginPost'])->name('loginPost');
});
