<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\ClassRoomServices\GetClassRoomListService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetClassRoomListController extends Controller
{
    public function __construct(
        protected GetClassRoomListService $getClassRoomListService
    ) {}

    public function get(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->getClassRoomListService
            ->list($request);
    }
}
