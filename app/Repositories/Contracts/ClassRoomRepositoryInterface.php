<?php

namespace App\Repositories\Contracts;

use App\Models\ClassRoom;

interface ClassRoomRepositoryInterface extends BaseRepositoryInterface
{
    public function getSummaryByClassRoomId(int $classRoomId): \stdClass;
}
