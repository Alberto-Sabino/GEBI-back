<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoom\ChildExitClassRoomRequest;
use App\Services\ClassRoomChildServices\RegisterExitClassRoomChildService;
use Illuminate\Support\Facades\DB;

class RegisterClassRoomChildExitController extends Controller
{
    public function __construct(
        protected RegisterExitClassRoomChildService $registerExitClassRoomChildService
    ) {}

    public function register(ChildExitClassRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $this->registerExitClassRoomChildService
                ->registerExit($request->all());
            DB::commit();

            return response()->json([], 204);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
