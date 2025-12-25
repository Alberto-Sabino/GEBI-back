<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoom\UpdateClassRoomRequest;
use App\Services\ClassRoomServices\UpdateClassRoomService;
use Illuminate\Support\Facades\DB;

class UpdateClassRoomController extends Controller
{
    public function __construct(
        protected UpdateClassRoomService $updateClassRoomService
    ) {}

    public function update(int $classRoomId, UpdateClassRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $updated = $this->updateClassRoomService
                ->update($classRoomId, $request->all());
            DB::commit();

            return response()->json([], $updated ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
