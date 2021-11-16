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

Route::post('companies', [CompaniesController::class, 'store'])
    ->middleware('admin')
    ->name('company.store');

Route::get('companies/create', [CompaniesController::class, 'create'])
    ->middleware('admin')
    ->name('company.create');

Route::get('companies/{company}', [CompaniesController::class, 'show'])
    ->middleware('auth')
    ->name('company.show');

Route::put('companies/{company}', [CompaniesController::class, 'update'])
    ->middleware('admin')
    ->name('company.update');

Route::delete('companies/{company}', [CompaniesController::class, 'destroy'])
    ->middleware('admin')
    ->name('company.destroy');

Route::get('companies/{company}/edit', [CompaniesController::class, 'edit'])
    ->middleware('admin')
    ->name('company.edit');

//----------------------------------------------------------------------------------------------------------------------
// EMPLOYEES
//----------------------------------------------------------------------------------------------------------------------
Route::get('employees', [EmployeesController::class, 'index'])
    ->middleware('auth')
    ->name('employees');

Route::post('employees', [EmployeesController::class, 'store'])
    ->middleware('admin')
    ->name('employee.store');

Route::get('employees/create', [EmployeesController::class, 'create'])
    ->middleware('admin')
    ->name('employee.create');

Route::get('employees/{employee}', [EmployeesController::class, 'show'])
    ->middleware('auth')
    ->name('employee.show');

Route::put('employees/{employee}', [EmployeesController::class, 'update'])
    ->middleware('admin')
    ->name('employee.update');

Route::delete('employees/{employee}', [EmployeesController::class, 'destroy'])
    ->middleware('admin')
    ->name('employee.destroy');

Route::get('employees/{employee}/edit', [EmployeesController::class, 'edit'])
    ->middleware('admin')
    ->name('employee.edit');
