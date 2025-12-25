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
            'birthDate' => 'sometimes|date',
            'baptismYear' => 'sometimes|integer',
            'phone' => 'sometimes|string',
            'email' => 'sometimes|email',
            'city' => 'sometimes|string',
            'commonCongregation' => 'sometimes|string'
        ];
    }

    // Ensure password is not updated through this request
    public function prepareForValidation(): void
    {
        $this->merge([
            'password' => ''
        ]);
    }
}
