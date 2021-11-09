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

Route::get('companies', [CompaniesController::class, 'index'])->name('companies');
Route::get('companies/{company:name}', [CompaniesController::class, 'show'])->name('company');
Route::put('companies/update/{company:name}', [CompaniesController::class, 'update'])->name('company.update');
Route::delete('companies/update/{company:name}', [CompaniesController::class, 'delete'])->name('company.delete');
Route::get('companies/create', [CompaniesController::class, 'create'])->name('company.create');
Route::post('companies/store', [CompaniesController::class, 'store'])->name('company.store');

Route::get('employees', [EmployeesController::class, 'show'])->name('employees');

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
