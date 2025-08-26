<?php

namespace App\Http\Requests\Login;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'document' => 'required|string',
            'password' => 'required|string',
        ];
    }
}