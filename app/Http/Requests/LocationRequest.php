<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OrganizationValidationRules;

class LocationRequest extends FormRequest
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
            'serial_number' => 'required|unique:locations|string|max:255',
            'name' => 'required|string|max:255',
            'ipv4_address' => 'required|ipv4',
            'organization_id' => ['required','exists:organizations,id', OrganizationValidationRules::maxLocationsPerOrganization()],
        ];
    }

    public function messages()
    {
        return [
            'serial_number.required' => 'The serial number field is required.',
            'serial_number.unique' => 'The serial number must be unique.',
            'name.required' => 'The name field is required.',
            'ipv4_address.required' => 'The IPv4 address field is required.',
            'ipv4_address.ipv4' => 'The IPv4 address must be a valid IPv4 address.',
            'organization_id.required' => 'Please select an organization.',
            'organization_id.exists' => 'The selected organization does not exist.'
        ];
    }

}
