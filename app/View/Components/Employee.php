<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Employee extends Component
{
    public $employee;

    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('employee.components.employee');
    }
}
