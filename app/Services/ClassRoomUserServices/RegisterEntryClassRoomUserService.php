<?php

namespace App\Services\ClassRoomUserServices;

use App\Models\ClassRoomUser;
use App\Traits\LoggedUserTrait;

class RegisterEntryClassRoomUserService
{
    use LoggedUserTrait;

    public function __construct(
        protected CreateClassRoomUserService $createClassRoomUserService
    ) {}

    public function registerEntry(int $classRoomId): ClassRoomUser
    {
        return $this->createClassRoomUserService
            ->create($this->getData($classRoomId));
    }

    private function getData(int $classRoomId): array
    {
        return [
            'class_room_id' => $classRoomId,
            'user_id' => $this->getLoggedUserId(),
            'entry_at' => now()->format('H:i')
        ];
    }
}
