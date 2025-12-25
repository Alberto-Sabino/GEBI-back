<?php

namespace App\Services\ClassRoomChildServices;

use App\Repositories\Contracts\ClassRoomChildRepositoryInterface;

class UpdateClassRoomChildByClassRoomIdAndChildIdService
{
    public function __construct(
        protected ClassRoomChildRepositoryInterface $repository
    ) {}

    public function updateByClassRoomIdAndChildId(int $classRoomId, int $childId, array $data): bool
    {
        return $this->repository
            ->updateByClassRoomIdAndChildId(
                $classRoomId,
                $childId,
                $data
            );
    }
}
