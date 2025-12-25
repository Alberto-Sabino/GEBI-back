<?php

namespace App\Http\Controllers\Auth;

use App\Services\AuthServices\ResetPasswordService;
use Illuminate\Support\Facades\DB;

class ResetPasswordController
{
    public function __construct(
        protected ResetPasswordService $resetPasswordService
    ) {}

    public function reset(int $userId): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $updated = $this->resetPasswordService
                ->resetPassword($userId);
            DB::commit();

            return response()->json([], $updated ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
