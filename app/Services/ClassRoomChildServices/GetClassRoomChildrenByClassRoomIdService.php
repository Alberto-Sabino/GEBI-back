<?php

namespace App\Services\ClassRoomChildServices;

use App\Repositories\Contracts\ClassRoomChildRepositoryInterface;
use Illuminate\Support\Collection;

class GetClassRoomChildrenByClassRoomIdService
{
    public function __construct(
        protected ClassRoomChildRepositoryInterface $repository
    ) {}

    public function getClassRoomChildrenByClassRoomId(int $classRoomId): Collection
    {
        return $this->repository
            ->getClassRoomChildrenByClassRoomId($classRoomId);
    }
}
