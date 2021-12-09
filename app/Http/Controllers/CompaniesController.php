<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompaniesController extends Controller
{
    function index()
    {
        if (request('search')) {
            return view('company.components.companies', [
                'companies' => Company::where('name', 'like', '%' . request('search') . '%')
                    ->orderBy('name', 'asc')
                    ->paginate(3),
            ]);
        }
        else {
            return view('company.components.companies', [
                'companies' => Company::paginate(10),
            ]);
        }
    }

    public function store(CompanyRequest $request)
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

    public function show($id)
    {
        $company = Company::find($id);
        return view('company.components.company', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $validatedData = $request->validated();
        $validatedData['logo'] = request()->file('logo')->store('logos');
        $company->update($validatedData);

        return redirect('/')->with('success', 'Success!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/')->with('success', 'Success!');
    }

    public function edit(Company $company)
    {
        return view('company.edit', [
            'company' => $company
        ]);
    }
}
