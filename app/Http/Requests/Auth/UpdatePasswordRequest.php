<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class UpdatePasswordRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'oldPassword' => 'required',
            'newPassword' => 'required|password',
        ];
    }
}