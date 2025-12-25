<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface ClassRoomChildRepositoryInterface extends BaseRepositoryInterface
{
    public function getClassRoomChildrenByClassRoomId(int $classRoomId): Collection;

    public function updateByClassRoomIdAndChildId(int $classRoomId, int $childId, array $data): bool;
}
