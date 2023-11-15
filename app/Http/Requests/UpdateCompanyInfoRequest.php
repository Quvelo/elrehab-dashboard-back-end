<?php

namespace App\Http\Requests;

use App\Rules\ImageRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyInfoRequest extends FormRequest
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
            'title' => "required|string",
            'name' => "required|string",
            'description' => "required|string",
            'nav_logo' => ["required", new ImageRule],
            'footer_logo' => ["required", new ImageRule],
            'social_media' => "required|array",
            'location' => "required|string",
            'phone' => "required|string",
            'sales_number' => "required|string",
        ];
    }
}
