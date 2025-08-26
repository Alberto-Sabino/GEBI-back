<?php

namespace App\Http\Requests\Child;

use App\Http\Requests\BaseRequest;

class CreateChildRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fullName' => 'required',
            'birthDate' => 'required|date',
            'commonCongregation' => 'required',
            'gender' => 'required|in:M,F'
        ];
    }
}
