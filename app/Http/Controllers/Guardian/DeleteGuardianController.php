<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Services\GuardianServices\DeleteGuardianService;
use Illuminate\Support\Facades\DB;

class DeleteGuardianController extends Controller
{
    public function __construct(
        protected DeleteGuardianService $deleteGuardianService
    ) {}

    public function delete(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $deleted = $this->deleteGuardianService
                ->delete($id);
            DB::commit();

            return response()->json([], $deleted ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
