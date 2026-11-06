<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            "name"         => "sometimes|required|string",
            "email"        => ["sometimes", "required", "email", Rule::unique('staff')->ignore($this->route('id'))],
            "password"     => "sometimes|required|string|min:8",
            "role"         => "sometimes|required|string",
            "phone_number" => ["sometimes", "required", "string", Rule::unique('staff')->ignore($this->route('id'))]
        ];
    }
}
