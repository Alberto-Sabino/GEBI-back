<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoom\CreateClassRoomRequest;
use App\Services\ClassRoomServices\CreateClassRoomService;
use Illuminate\Support\Facades\DB;

class CreateClassRoomController extends Controller
{
    public function __construct(
        protected CreateClassRoomService $createClassRoomService
    ) {}

    public function create(CreateClassRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $classRoom = $this->createClassRoomService
                ->create($request->all());
            DB::commit();

            return response()->json([], $classRoom->exists ? 201 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
