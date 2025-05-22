<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserServices\DeleteUserService;
use Illuminate\Support\Facades\DB;

class DeleteUserController extends Controller
{
    public function __construct(
        protected DeleteUserService $deleteUserService
    ) {}

    public function delete(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();

            $deleted = $this->deleteUserService
                ->delete($id);

            DB::commit();

            return response()->json([], $deleted ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
