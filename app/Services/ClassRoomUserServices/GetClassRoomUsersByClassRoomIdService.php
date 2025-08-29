<?php

namespace App\Services\ClassRoomUserServices;

use App\Repositories\Contracts\ClassRoomUserRepositoryInterface;
use Illuminate\Support\Collection;

class GetClassRoomUsersByClassRoomIdService
{
    public function __construct(
        protected ClassRoomUserRepositoryInterface $repository
    ) {}

    public function getClassRoomUsersByClassRoomId(int $classRoomId): Collection
    {
        return $this->repository
            ->getClassRoomUsersByClassRoomId($classRoomId);
    }
}
