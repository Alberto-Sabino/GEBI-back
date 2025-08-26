<?php

namespace App\Http\Controllers\GuardianChildLinks;

use App\Http\Controllers\Controller;
use App\Services\GuardianChildLinkServices\DeleteGuardianChildLinkService;
use Illuminate\Support\Facades\DB;

class DeleteGuardianChildLinkController extends Controller
{
    public function __construct(
        protected DeleteGuardianChildLinkService $deleteGuardianChildLinkService
    ) {}

    public function delete(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $deleted = $this->deleteGuardianChildLinkService->delete($id);
            DB::commit();

            return response()->json([], $deleted ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
