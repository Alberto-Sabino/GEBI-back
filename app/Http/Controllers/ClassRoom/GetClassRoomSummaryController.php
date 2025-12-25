<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Services\ClassRoomServices\GetClassRoomSummaryService;

class GetClassRoomSummaryController extends Controller
{
    public function __construct(
        protected GetClassRoomSummaryService $getClassRoomSummaryService
    ) {}

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(
                $this->getClassRoomSummaryService
                    ->getSummaryByClassRoomId($id)
            );
    }
}
