<?php

namespace App\Http\Requests\ClassRoom;

use App\Http\Requests\BaseRequest;

class UpdateClassRoomRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'theme' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:100',
            'date' => 'sometimes|string'
        ];
    }
}
