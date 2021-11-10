<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    function index()
    {
        return view('components.employees', [
            'employees' => Employee::paginate(10)
        ]);
    }

    public function show($name)
    {
        return view('components.employees', [
            'employees' => DB::table('employees')->where('company', $name)->get()
        ]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'company' => 'required',
            'email' => ['required', 'email', 'unique:employees'],
            'phone_number' => ['required', 'regex:/[0-9]{11}/'],
        ]);

        Employee::create($attributes);

        return redirect('/');
    }

    public function destroy($id)
    {
        DB::table('employees')->delete($id);
        return redirect('/');
    }
}
