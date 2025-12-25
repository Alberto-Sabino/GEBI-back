<?php

namespace App\Services\ClassRoomUserServices;

use App\Repositories\Contracts\ClassRoomUserRepositoryInterface;
use App\Services\BaseServices\UpdateBaseService;

class UpdateClassRoomUserByClassRoomIdService
{
    public function __construct(
        protected ClassRoomUserRepositoryInterface $repository
    ) {}

    public function updateByClassRoomId(int $classRoomId, array $data) : bool
    {
        return $this->repository
            ->updateByClassRoomId($classRoomId, $data);
    }
}
