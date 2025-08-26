<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Services\GuardianServices\GetGuardianDetailsService;

class GetGuardianDetailsController extends Controller
{
    public function __construct(
        protected GetGuardianDetailsService $getGuardianDetailsService
    ) {}

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(
                $this->getGuardianDetailsService
                    ->get($id)
            );
    }
}
