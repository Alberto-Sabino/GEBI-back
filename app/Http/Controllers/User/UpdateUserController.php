<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\UserServices\UpdateUserService;
use Illuminate\Support\Facades\DB;

class UpdateUserController extends Controller
{
    public function __construct(
        protected UpdateUserService $updateUserService
    ) {}

    public function update(UpdateUserRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $updated = $this->updateUserService
                ->update($id, $request->all());
            DB::commit();

            return response()->json([], $updated ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
