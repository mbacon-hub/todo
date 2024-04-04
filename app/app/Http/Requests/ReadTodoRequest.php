<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReadTodoRequest extends FormRequest
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
            "text" => ["sometimes", "string", "min:1"],
            "status" => ["sometimes", "int", "in:1,2"],
            "order_by" => ["sometimes", "string", "in:id,created_at"],
            "order_dir" => ["required_with:order_by", "string", "in:down,up"],
        ];
    }
}
