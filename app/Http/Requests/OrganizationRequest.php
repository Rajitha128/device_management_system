<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
        return [
            'code' => 'required|unique:organizations|string|max:255',
            'name' => 'required|string|max:255',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required' => 'The organization code is required.',
            'code.unique' => 'The organization code must be unique.',
            'name.required' => 'The organization name is required.',
        ];
    }
}
