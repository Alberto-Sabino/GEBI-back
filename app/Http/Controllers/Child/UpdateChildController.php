<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Http\Requests\Child\UpdateChildRequest;
use App\Services\ChildServices\UpdateChildService;
use Illuminate\Support\Facades\DB;

class UpdateChildController extends Controller
{
    public function __construct(
        protected UpdateChildService $updateChildService
    ) {}

    public function update(UpdateChildRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $updated = $this->updateChildService
                ->update($id, $request->all());
            DB::commit();

            return response()->json([], $updated ? 204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
