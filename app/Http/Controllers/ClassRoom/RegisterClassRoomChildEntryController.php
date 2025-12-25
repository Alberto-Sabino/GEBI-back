<?php

namespace App\Http\Controllers\ClassRoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoom\ChildEntryClassRoomRequest;
use App\Services\ClassRoomChildServices\RegisterEntryClassRoomChildService;
use Illuminate\Support\Facades\DB;

class RegisterClassRoomChildEntryController extends Controller
{
    public function __construct(
        protected RegisterEntryClassRoomChildService $registerEntryClassRoomChildService
    ) {}

    public function register(ChildEntryClassRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $this->registerEntryClassRoomChildService
                ->registerEntry($request->all());
            DB::commit();

            return response()->json([], 204);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
