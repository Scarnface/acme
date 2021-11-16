<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'logo' => 'required|image',
            'website' => 'required|unique:companies'
        ];
    }

    protected function update()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:companies,email' .$this->company()->id,
            'logo' => 'required|image',
            'website' => 'required|unique:companies,website' .$this->company()->id
        ];
    }
}
