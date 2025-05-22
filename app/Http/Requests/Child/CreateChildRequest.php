<?php

namespace App\Http\Requests\Child;

use App\Http\Requests\BaseRequest;

class CreateChildRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fullName' => 'required',
            'birthDate' => 'required',
            'commonCongregation' => 'required',
            'gender' => 'required'
        ];
    }
}
