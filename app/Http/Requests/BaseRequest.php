<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute precisa ser um e-mail válido.',
            'date' => 'O campo :attribute precisa ser uma data válida.',
            'integer' => 'O campo :attribute precisa ser um número inteiro.',
            'sometimes' => 'Se o campo :attribute for enviado, ele não pode ser vazio.'
        ];
    }
}
