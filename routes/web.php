<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

//----------------------------------------------------------------------------------------------------------------------
// COMPANIES
//----------------------------------------------------------------------------------------------------------------------
Route::get('companies', [CompaniesController::class, 'index'])
    ->middleware('auth')
    ->name('companies');

Route::get('companies/create', [CompaniesController::class, 'create'])
    ->middleware('admin')
    ->name('company.create');

Route::post('companies/store/{company:id?}', [CompaniesController::class, 'store'])
    ->middleware('admin')
    ->name('company.store');

Route::get('companies/{company:name}', [CompaniesController::class, 'show'])
    ->middleware('auth')
    ->name('company.show');

Route::post('companies/update/{company:id}', [CompaniesController::class, 'update'])
    ->middleware('admin')
    ->name('company.update');

Route::delete('companies/delete/{company:id}', [CompaniesController::class, 'destroy'])
    ->middleware('admin')
    ->name('company.destroy');

//----------------------------------------------------------------------------------------------------------------------
// EMPLOYEES
//----------------------------------------------------------------------------------------------------------------------
Route::get('employees', [EmployeesController::class, 'index'])
    ->middleware('auth')
    ->name('employees');

Route::get('employees/create', [EmployeesController::class, 'create'])
    ->middleware('admin')
    ->name('employee.create');

Route::post('employees/store/{employee:id?}', [EmployeesController::class, 'store'])
    ->middleware('admin')
    ->name('employee.store');

Route::get('employees/{employee:id}', [EmployeesController::class, 'show'])
    ->middleware('auth')
    ->name('employee.show');

Route::post('employees/update/{employee:id}', [EmployeesController::class, 'update'])
    ->middleware('admin')
    ->name('employee.update');

Route::delete('employees/delete/{employee:id}', [EmployeesController::class, 'destroy'])
    ->middleware('admin')
    ->name('employee.destroy');
