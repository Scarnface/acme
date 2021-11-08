<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/companies', [CompaniesController::class, 'show'])->name('companies');
Route::get('/employees', [EmployeesController::class, 'show'])->name('employees');
