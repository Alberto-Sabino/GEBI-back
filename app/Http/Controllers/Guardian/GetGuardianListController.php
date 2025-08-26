<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\GuardianServices\GetGuardiansListService;

class GetGuardianListController extends Controller
{
    public function __construct(
        protected GetGuardiansListService $getGuardiansListService
    ) {}

    public function get(PaginationAndFiltersRequest $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->getGuardiansListService
            ->list($request);
    }
}
