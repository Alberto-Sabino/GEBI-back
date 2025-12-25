<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassRoom;
use App\Repositories\Contracts\ClassRoomRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClassRoomRepository extends BaseRepository implements ClassRoomRepositoryInterface
{
    public function __construct(ClassRoom $model)
    {
        parent::__construct($model);
    }

    public function getSummaryByClassRoomId(int $classRoomId): \stdClass
    {
        return DB::table('class_rooms as CR')
            ->where('CR.id', $classRoomId)
            ->join('users as U', 'CR.creator_id', '=', 'U.id')
            ->leftJoin('class_room_children as CRC', 'CR.id', '=', 'CRC.class_room_id')
            ->leftJoin('class_room_users as CRU', 'CR.id', '=', 'CRU.class_room_id')
            ->select(
                'CR.id',
                'CR.theme',
                'CR.date',
                'U.fullName as creator_name',
                DB::raw('COUNT(DISTINCT CRC.child_id) as total_children'),
                DB::raw('COUNT(DISTINCT CRU.user_id) as total_users'),
                DB::raw('MIN(CRU.entry_at) as first_user_entry'),
                DB::raw('MAX(CRU.exit_at) as last_user_exit')
            )
            ->groupBy('CR.id', 'U.fullName', 'CR.theme', 'CR.date')
            ->first();
    }
}
