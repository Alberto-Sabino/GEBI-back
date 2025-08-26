<?php

namespace App\Http\Requests\Guardian;

use App\Http\Requests\BaseRequest;

class CreateGuardianRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fullName' => 'required',
            'phone' => 'sometimes',
            'city' => 'required',
            'commonCongregation' => 'required',
        ];
    }
}
