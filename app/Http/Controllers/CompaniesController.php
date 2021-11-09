<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CompaniesController extends Controller
{
    function index()
    {
        return view('components.companies', [
            'companies' => Company::paginate(3)
        ]);
    }

    public function show($name)
    {
        return view('components.companies', [
            'companies' => DB::table('companies')->where('name', $name)->get(),
            'employees' => DB::table('employees')->where('company', $name)->paginate(10)
        ]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'logo' => ['required', 'image'],
            'website' => 'required',
        ]);

        $attributes['logo'] = request()->file('logo')->store('logos');

        Company::create($attributes);

        return redirect('/');
    }
}
