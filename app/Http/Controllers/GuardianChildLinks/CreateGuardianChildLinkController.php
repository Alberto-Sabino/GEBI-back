<?php

namespace App\Http\Controllers\GuardianChildLinks;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardianChildLinks\CreateGuardianChildLinkRequest;
use App\Services\GuardianChildLinkServices\CreateGuardianChildLinkService;
use Illuminate\Support\Facades\DB;

class CreateGuardianChildLinkController extends Controller
{
    public function __construct(
        protected CreateGuardianChildLinkService $createGuardianChildLinkService
    ) {}

    public function create(CreateGuardianChildLinkRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            $link = $this->createGuardianChildLinkService
                ->create($request->all());
            DB::commit();

            return response()->json([], $link->exists ?  204 : 400);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
