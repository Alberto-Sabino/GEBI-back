<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Services\ChildServices\DeleteChildService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteChildController extends Controller
{
    public function __construct(
        protected DeleteChildService $deleteChildService
    ) {}

    public function delete(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $deleted = $this->deleteChildService->delete($id);
            DB::commit();

            return response()->json([], $deleted ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
