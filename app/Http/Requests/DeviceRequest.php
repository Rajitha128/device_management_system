<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OrganizationValidationRules;

class DeviceRequest extends FormRequest
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
            'number' => 'required|unique:devices|numeric',
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
            'location_id' => ['required', 'exists:locations,id', OrganizationValidationRules::maxDevicesPerLocation()],
        ];
    }

    public function messages()
    {
        return [
            'number.required' => 'The device number is required.',
            'number.unique' => 'The device number must be unique.',
            'type.required' => 'The device type is required.',
            'type.in' => 'Invalid device type selected.',
            'image.required' => 'An image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'status.required' => 'The device status is required.',
            'status.boolean' => 'The device status must be either true or false.',
            'location_id.required' => 'Please select a location.',
            'location_id.exists' => 'The selected location does not exist.',
            'location_id.max_devices' => 'The location has reached the maximum number of allowed devices.',
        ];
    }
}
