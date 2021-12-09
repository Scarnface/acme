<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

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

    public function show(Company $company)
    {
        return view('company.components.companies', [
            'companies' => Company::where('id', '=', $company->id)
                ->get(),
        ]);
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
        DB::table('companies')->delete($company->id);
        return redirect('/')->with('success', 'Success!');
    }

    public function edit(Company $company)
    {
        return view('company.edit', [
            'company' => $company
        ]);
    }
}
