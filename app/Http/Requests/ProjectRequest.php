<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'slogan' => 'required|string|max:100',
            'description' => 'required|string',
            'main_photo' => 'required|mimes:jpeg,png,jpg',
            'video' => 'required',
            'area' => 'required|string',
            'government' => 'required|string|min:1',
            'location_title' => 'required|string|min:1',
            'location_google_map' => 'required|string|min:1',
            'units_number' => 'required|string|min:1',
            'init_unit_start' => 'required|numeric',
            'images' => 'nullable|array',
            'images.*.image' => 'nullable',
        ];
    }
}
