<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    function show()
    {
        $data =  Employee::all();
        return view('layouts.employees', ['employees' => $data]);
    }
}
