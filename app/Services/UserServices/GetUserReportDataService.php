<?php

namespace App\Services\UserServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetUserReportDataService
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ) {}

    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->repository
            ->getReportData($request);
    }
}
