<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name"         => "required|string",
            "email"        => "required|email|unique:staff,email",
            "password"     => "required|string|min:8",
            "role"         => "required|string",
            "phone_number" => "required|string|unique:staff,phone_number"
        ];
    }
}
