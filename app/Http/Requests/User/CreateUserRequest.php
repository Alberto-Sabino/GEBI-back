<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class CreateUserRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fullName' => 'required|string',
            'document' => 'required|string',
            'password' => 'required|string',
            'birthDate' => 'required|date',
            'baptismYear' => 'required|integer',
            'phone' => 'required|string',
            'email' => 'required|email',
            'neighborhood' => 'required|string',
            'commonCongregation' => 'required|string'
        ];
    }
}
