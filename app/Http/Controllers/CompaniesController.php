<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompaniesController extends Controller
{
    function show()
    {
        return view('components.companies', [
            'companies' => Company::paginate(3)
        ]);
    }
}
