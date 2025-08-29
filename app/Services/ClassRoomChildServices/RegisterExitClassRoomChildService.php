<?php

namespace App\Services\ClassRoomChildServices;

class RegisterExitClassRoomChildService
{
    public function __construct(
        protected UpdateClassRoomChildByClassRoomIdAndChildIdService $updateClassRoomChildByClassRoomIdAndChildIdService
    ) {}

    public function registerExit(array $data): bool
    {
        return $this->updateClassRoomChildByClassRoomIdAndChildIdService
            ->updateByClassRoomIdAndChildId(
                $data['class_room_id'],
                $data['child_id'],
                ['exit_at' => now()->format('H:i')]
            );
    }
}
