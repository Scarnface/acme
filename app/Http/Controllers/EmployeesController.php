<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeesController extends Controller
{
    function show()
    {
        return view('components.employees', [
            'employees' => Employee::paginate(9)
        ]);
    }
}
