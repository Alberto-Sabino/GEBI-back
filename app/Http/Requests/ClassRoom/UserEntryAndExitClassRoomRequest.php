<?php

namespace App\Http\Requests\ClassRoom;

use App\Http\Requests\BaseRequest;

class UserEntryAndExitClassRoomRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'class_room_id' => 'required|exists:class_rooms,id'
        ];
    }
}
