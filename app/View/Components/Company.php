<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Company extends Component
{
    public $company;

    public function __construct($company)
    {
        $this->company = $company;
    }

    public function render()
    {
        return view('company.components.company');
    }
}
