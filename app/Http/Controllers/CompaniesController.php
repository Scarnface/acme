<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    function show()
    {
        $data =  Company::all();
        return view('layouts.companies', ['companies' => $data]);
    }
}
