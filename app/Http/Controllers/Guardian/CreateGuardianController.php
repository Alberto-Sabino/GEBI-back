<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guardian\CreateGuardianRequest;
use App\Services\GuardianServices\CreateGuardianService;
use Illuminate\Support\Facades\DB;

class CreateGuardianController extends Controller
{
    public function __construct(
        protected CreateGuardianService $createGuardianService
    ) {}

    public function create(CreateGuardianRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $guardian = $this->createGuardianService
                ->create($request->all());
            DB::commit();

            return response()->json([], $guardian->exists ? 201 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
