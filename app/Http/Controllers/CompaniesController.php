<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

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
}
