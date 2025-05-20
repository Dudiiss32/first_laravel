<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // td mundo acessa a request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(!$this->isMethod("GET")){
            return [
                "titulo"=> "required|min:3|max:255", // |min:3 pelo menos 3 caracteres
                "texto"=> "required",
            ];
        }
        return [];
    }
}
