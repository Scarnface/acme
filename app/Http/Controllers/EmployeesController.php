<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    function index()
    {
        if (request('search')) {
            return view('components.employees', [
                'employees' => Employee::where('first_name', 'like', '%' . request('search') . '%')
                    ->orWhere('last_name', 'like', '%' . request('search') . '%')
                    ->orderBy('first_name', 'asc')
                    ->orderBy('last_name', 'asc')
                    ->paginate(10),
            ]);
        }
        else {
            return view('components.employees', [
                'employees' => Employee::paginate(10)
            ]);
        }
    }

    public function store(EmployeeRequest $request, Employee $employee)
    {
        $validatedData = $request->validated();
        Employee::create($validatedData);

        return redirect('/')->with('success', 'Success!');
    }

    public function create()
    {
        return view('employee.create');
    }

    public function show(Employee $employee)
    {
        return view('components.employees', [
            'employees' => Employee::where('id', '=', $employee->id)
                ->paginate(3),
        ]);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $validatedData = $request->validated();
        $employee->update($validatedData);

        return redirect('/')->with('success', 'Success!');
    }

    public function destroy(Employee $employee)
    {
        DB::table('employees')->delete($employee->id);
        return redirect('/')->with('success', 'Success!');
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'employee' => $employee
        ]);
    }
}
