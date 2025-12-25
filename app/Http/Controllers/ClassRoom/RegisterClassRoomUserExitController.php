<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoom\UserEntryAndExitClassRoomRequest;
use App\Services\ClassRoomUserServices\RegisterExitClassRoomUserService;
use Illuminate\Support\Facades\DB;

class RegisterClassRoomUserExitController extends Controller
{
    public function __construct(
        protected RegisterExitClassRoomUserService $registerExitClassRoomUserService
    ) {}

    public function register(UserEntryAndExitClassRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $this->registerExitClassRoomUserService
                ->registerExit($request->input('class_room_id'));
            DB::commit();

            return response()->json([], 204);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
