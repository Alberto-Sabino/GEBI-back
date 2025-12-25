<?php

namespace App\Http\Requests\ClassRoom;

use App\Http\Requests\BaseRequest;

class ChildEntryClassRoomRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'class_room_id' => 'required|exists:class_rooms,id',
            'child_id' => 'required|exists:children,id',
            'guardian_id' => 'required|exists:guardians,id'
        ];
    }
}
