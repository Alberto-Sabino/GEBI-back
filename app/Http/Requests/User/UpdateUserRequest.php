<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class UpdateUserRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fullName' => 'sometimes|string',
            'document' => 'sometimes|string',
            'password' => 'sometimes|string',
            'birthDate' => 'sometimes|date',
            'baptismYear' => 'sometimes|integer',
            'phone' => 'sometimes|string',
            'email' => 'sometimes|email',
            'neighborhood' => 'sometimes|string',
            'commonCongregation' => 'sometimes|string'
        ];
    }
}
