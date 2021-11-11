<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    function index()
    {
        return view('components.companies', [
            'companies' => Company::paginate(3),
            'employees' => collect()
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

    public function update($id)
    {
        return view('company.update', [
            'companies' => DB::table('companies')->where('id', $id)->first(),
        ]);
    }

    public function store($id = NULL)
    {
        $entry = Company::find($id);
        if(!is_null($entry)){
            $entry->update([
                'name' =>  request()->input('name', $entry->name),
                'email' => request()->input('email', $entry->password),
                'logo' => request()->file('logo')->store('logos'),
                'website' => request()->input('website', $entry->website),
            ]);
        } else {
            $attributes = request()->validate([
                'name' => 'required',
                'email' => ['required', 'email', 'unique:companies'],
                'logo' => ['required', 'image'],
                'website' => ['required', 'unique:companies']
            ]);

            $attributes['logo'] = request()->file('logo')->store('logos');

            Company::create($attributes);
        }

        return redirect('/')->with('success', 'Success!');
    }

    public function destroy($id)
    {
        DB::table('companies')->delete($id);
        return redirect('/')->with('success', 'Success!');
    }
}
