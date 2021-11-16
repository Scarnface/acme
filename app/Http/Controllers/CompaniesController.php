<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    function index()
    {
        $companies = Company::latest();

        if (request('search')) {
            $companies
                ->where('name', 'like', '%' . request('search') . '%');

            return view('components.companies', [
                'companies' => $companies->paginate(3),
                'employees' => collect()
            ]);
        }
        else {
            return view('components.companies', [
                'companies' => Company::paginate(3),
                'employees' => collect()
            ]);
        }
    }

    public function store(CompanyRequest $request, Company $company)
    {
        $validatedData = $request->validated();
        $validatedData['logo'] = request()->file('logo')->store('logos');
        Company::create($validatedData);

        return redirect('/')->with('success', 'Success!');
    }

    public function create()
    {
        return view('company.create');
    }

    public function show(Company $company)
    {
        return view('components.companies', [
            'companies' => DB::table('companies')->where('name', $company->name)->get(),
            'employees' => DB::table('employees')->where('company', $company->name)->paginate(10)
        ]);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $validatedData = $request->validated();
        $validatedData['logo'] = request()->file('logo')->store('logos');
        Company::update($validatedData);

        return redirect('/')->with('success', 'Success!');
    }

    public function destroy(Company $company)
    {
        DB::table('companies')->delete($company->id);
        return redirect('/')->with('success', 'Success!');
    }

    public function edit(Company $company)
    {
        return view('company.edit', [
            'companies' => DB::table('companies')->where('id', $company->id)->first(),
        ]);
    }
}
