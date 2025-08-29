<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassRoomChild;
use App\Repositories\Contracts\ClassRoomChildRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ClassRoomChildRepository extends BaseRepository implements ClassRoomChildRepositoryInterface
{
    public function __construct(ClassRoomChild $model)
    {
        parent::__construct($model);
    }

    public function updateByClassRoomIdAndChildId(int $classRoomId, int $childId, array $data): bool
    {
        return $this->model
            ->where('class_room_id', $classRoomId)
            ->where('child_id', $childId)
            ->update($data);
    }

    public function getClassRoomChildrenByClassRoomId(int $classRoomId): Collection
    {
        return DB::table('class_rooms')
            ->join('class_room_children', 'class_rooms.id', '=', 'class_room_children.class_room_id')
            ->join('children', 'class_room_children.child_id', '=', 'children.id')
            ->join('guardians', 'class_room_children.guardian_id', '=', 'guardians.id')
            ->where('class_rooms.id', $classRoomId)
            ->select(
                'class_rooms.date as classroom_date',
                'class_rooms.theme as classroom_theme',
                'children.fullName as child_name',
                'class_room_children.entry_at as child_entry_at',
                'class_room_children.exit_at as child_exit_at',
                'guardians.fullName as guardian_name'
            )
            ->get()
            ->map(function ($item) {
                return (array) $item;
            });
    }
}
