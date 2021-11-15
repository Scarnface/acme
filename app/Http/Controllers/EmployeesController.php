<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    function index()
    {
        return view('components.employees', [
            'employees' => Employee::paginate(10)
        ]);
    }

    public function show($id)
    {
        return view('components.employees', [
            'employees' => DB::table('employees')->where('id', $id)->get()
        ]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function update($id)
    {
        return view('employee.update', [
            'employees' => DB::table('employees')->where('id', $id)->first(),
        ]);
    }

    public function store(Request $request, $id = NULL)
    {
        $entry = Employee::find($id);
        if(!is_null($entry)){
            $entry->update([
                'first_name' =>  $request->input('first_name', $entry->first_name),
                'last_name' =>  $request->input('last_name', $entry->last_name),
                'email' => $request->input('Email', $entry->email),
                'phone_number' => $request->input('phone_number', $entry->phone_number),
            ]);
        } else {
            $attributes = request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'company_id' => 'required',
                'company' => 'required',
                'email' => ['required', 'email', 'unique:employees'],
                'phone_number' => ['required', 'regex:/[0-9]{11}/'],
            ]);

            Employee::create($attributes);
        }

        return redirect('/')->with('success', 'Success!');
    }

    public function destroy($id)
    {
        DB::table('employees')->delete($id);
        return redirect('/')->with('success', 'Success!');
    }
}
