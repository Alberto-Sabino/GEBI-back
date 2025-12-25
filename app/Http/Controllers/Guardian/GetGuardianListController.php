<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\GuardianServices\GetGuardiansListService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetGuardianListController extends Controller
{
    public function __construct(
        protected GetGuardiansListService $getGuardiansListService
    ) {}

    public function get(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->getGuardiansListService
            ->list($request);
    }
}
