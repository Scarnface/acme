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
        $company = DB::table('companies')->where('name', $name)->paginate(1);
        return view('components.companies', [
            'companies' => $company
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
            'email' => 'required',
            'logo' => ['required', 'image'],
            'website' => 'required',
        ]);

        $attributes['logo'] = request()->file('logo')->store('logos');

        Company::create($attributes);

        return redirect('/');
    }
}
