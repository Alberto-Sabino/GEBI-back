<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guardian\UpdateGuardianRequest;
use App\Services\GuardianServices\UpdateGuardianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateGuardianController extends Controller
{
    public function __construct(
        protected UpdateGuardianService $updateGuardianService
    ) {}

    public function update(int $id, UpdateGuardianRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $updated = $this->updateGuardianService
                ->update($id, $request->all());
            DB::commit();

            return response()->json([], $updated ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
