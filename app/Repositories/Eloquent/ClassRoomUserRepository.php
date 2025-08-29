<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassRoomUser;
use App\Repositories\Contracts\ClassRoomUserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ClassRoomUserRepository extends BaseRepository implements ClassRoomUserRepositoryInterface
{
    public function __construct(ClassRoomUser $model)
    {
        parent::__construct($model);
    }

    public function updateByClassRoomId(int $classRoomId, array $data): bool
    {
        return $this->model
            ->where('class_room_id', $classRoomId)
            ->update($data);
    }

    public function getClassRoomUsersByClassRoomId(int $classRoomId): Collection
    {
        return DB::table('class_rooms')
            ->join('class_room_users', 'class_rooms.id', '=', 'class_room_users.class_room_id')
            ->join('users', 'class_room_users.user_id', '=', 'users.id')
            ->where('class_rooms.id', $classRoomId)
            ->select(
                'class_rooms.date as classroom_date',
                'class_rooms.theme as classroom_theme',
                'users.fullName as user_name',
                'class_room_users.entry_at as user_entry_at',
                'class_room_users.exit_at as user_exit_at'
            )
            ->get()
            ->map(function ($item) {
                return (array) $item;
            });
    }
}
