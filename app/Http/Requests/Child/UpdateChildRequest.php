<?php

namespace App\Http\Requests\Child;

use App\Http\Requests\BaseRequest;

class UpdateChildRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fullName' => 'sometimes',
            'birthDate' => 'sometimes',
            'commonCongregation' => 'sometimes',
            'gender' => 'sometimes'
        ];
    }
}
