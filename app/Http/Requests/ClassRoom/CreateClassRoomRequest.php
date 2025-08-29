<?php

namespace App\Http\Requests\ClassRoom;

use App\Http\Requests\BaseRequest;

class CreateClassRoomRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'theme' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'date' => 'required|string'
        ];
    }
}
