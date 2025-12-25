<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface ClassRoomUserRepositoryInterface extends BaseRepositoryInterface
{
    public function getClassRoomUsersByClassRoomId(int $classRoomId): Collection;

    public function updateByClassRoomId(int $classRoomId, array $data): bool;
}
