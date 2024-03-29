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
        return true;
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
            'logo' => 'required|image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url|unique:companies'
        ];
    }

    protected function update()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' .$this->route()->company->id,
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'required|url|unique:companies,website,'.$this->route()->company->id
        ];
    }
}
