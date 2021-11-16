<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:employees',
            'phone_number' => 'required|regex:/[0-9]{11}/'
        ];
    }

    protected function update()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:employees,email' .$this->employee()->id,
            'phone_number' => 'required|regex:/[0-9]{11}/'
        ];
    }
}
