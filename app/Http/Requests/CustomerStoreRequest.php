<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"         => "required|string|max:255",
            "phone_number" => "required|string|max:10|unique:customers,phone_number",
            "address"      => "nullable|string|max:255",
            "password"     => "required|min:8|string"
        ];
    }
}
