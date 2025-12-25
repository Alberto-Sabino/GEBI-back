<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoom\UserEntryAndExitClassRoomRequest;
use App\Services\ClassRoomUserServices\RegisterEntryClassRoomUserService;
use Illuminate\Support\Facades\DB;

class RegisterClassRoomUserEntryController extends Controller
{
    public function __construct(
        protected RegisterEntryClassRoomUserService $registerEntryClassRoomUserService
    ) {}

    public function register(UserEntryAndExitClassRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $this->registerEntryClassRoomUserService
                ->registerEntry($request->input('class_room_id'));
            DB::commit();

            return response()->json([], 204);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
