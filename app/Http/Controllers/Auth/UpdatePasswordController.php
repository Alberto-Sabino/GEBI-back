<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Services\AuthServices\UpdatePasswordService;
use Illuminate\Support\Facades\DB;

class UpdatePasswordController
{
    public function __construct(
        protected UpdatePasswordService $updatePasswordService
    ) {}

    public function update(int $userId, UpdatePasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $updated = $this->updatePasswordService
                ->updatePassword($userId, $request->all());
            DB::commit();

            return response()->json([], $updated ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
