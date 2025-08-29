<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Services\ClassRoomServices\DeleteClassRoomService;
use Illuminate\Support\Facades\DB;

class DeleteClassRoomController extends Controller
{
    public function __construct(
        protected DeleteClassRoomService $deleteClassRoomService
    ) {}

    public function delete(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $deleted = $this->deleteClassRoomService->delete($id);
            DB::commit();

            return response()->json([], $deleted ? 200 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
