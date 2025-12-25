<?php

namespace App\Services\GuardianServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Repositories\Contracts\GuardianRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetGuardianReportDataService
{
    public function __construct(
        protected GuardianRepositoryInterface $repository
    ) {}

    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->repository
            ->getReportData($request);
    }
}
