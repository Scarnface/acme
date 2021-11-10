<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('companies', [CompaniesController::class, 'index'])
    ->middleware('auth')
    ->name('companies');
Route::get('companies/create', [CompaniesController::class, 'create'])
    ->middleware('admin')
    ->name('company.create');
Route::post('companies/store', [CompaniesController::class, 'store'])
    ->middleware('admin')
    ->name('company.store');
Route::get('companies/{company:name}', [CompaniesController::class, 'show'])
    ->middleware('auth')
    ->name('company.show');
Route::put('companies/update/{company:id}', [CompaniesController::class, 'update'])
    ->middleware('admin')
    ->name('company.update');
Route::delete('companies/delete/{company:id}', [CompaniesController::class, 'destroy'])
    ->middleware('admin')
    ->name('company.destroy');

Route::get('employees', [EmployeesController::class, 'index'])
    ->middleware('auth')
    ->name('employees');
Route::get('employees/create', [EmployeesController::class, 'create'])
    ->middleware('admin')
    ->name('employee.create');
Route::post('employees/store', [EmployeesController::class, 'store'])
    ->middleware('admin')
    ->name('employee.store');
Route::get('employees/{employee:name}', [EmployeesController::class, 'show'])
    ->middleware('auth')
    ->name('employee.show');
Route::put('employees/update/{employee:id}', [EmployeesController::class, 'update'])
    ->middleware('admin')
    ->name('employee.update');
Route::delete('employees/delete/{employee:id}', [EmployeesController::class, 'destroy'])
    ->middleware('admin')
    ->name('employee.destroy');

//Method Spoofing
//
//HTML forms do not support PUT, PATCH or DELETE actions. So, when defining PUT,
//PATCH or DELETE routes that are called from an HTML form, you will need to add a hidden _method field to the form.
//
//The value sent with the _method field will be used as the HTTP request method. For example:
//<form action="/foo/bar" method="POST">
//    <input type="hidden" name="_method" value="PUT">
/*    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">*/
//</form>
