<?php

namespace App\Http\Requests\Guardian;

use App\Http\Requests\BaseRequest;

class CreateGuardianRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fullName' => 'sometimes',
            'phone' => 'sometimes',
            'city' => 'sometimes',
            'commonCongregation' => 'sometimes',
        ];
    }
}
