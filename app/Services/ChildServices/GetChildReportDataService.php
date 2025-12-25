<?php

namespace App\Services\ChildServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Repositories\Contracts\ChildRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetChildReportDataService
{
    public function __construct(
        protected ChildRepositoryInterface $repository
    ) {}

    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->repository
            ->getReportData($request);
    }
}
