<?php

namespace App\Services\ClassRoomUserServices;

class RegisterExitClassRoomUserService
{
    public function __construct(
        protected UpdateClassRoomUserByClassRoomIdService $updateClassRoomUserByClassRoomIdService
    ) {}

    public function registerExit(int $classRoomId): bool
    {
        $data = [
            'exit_at' => now()->format('H:i')
        ];

        return $this->updateClassRoomUserByClassRoomIdService
            ->updateByClassRoomId($classRoomId, $data);
    }
}
