<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max: 255",
            "ISBN" => "required|string|max: 255|unique:books, ISBN",
            "author" => "required|string|max: 255",
            "publisher" => "required|string|max: 255",
            "publish_date" => "required|date",
            "category_id" => "required|exists:categorys, id"
        ];
    }
}
