<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Http\Requests\Child\CreateChildRequest;
use App\Services\ChildServices\CreateChildService;
use Illuminate\Support\Facades\DB;

class CreateChildController extends Controller
{
    public function __construct(
        protected CreateChildService $createChildService
    ) {}

    public function create(CreateChildRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $child = $this->createChildService
                ->create($request->all());
            DB::commit();

            return response()->json([], $child->exists ? 201 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
