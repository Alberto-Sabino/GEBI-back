<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\PaginationAndFiltersRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GuardianRepositoryInterface extends BaseRepositoryInterface
{
    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator;
}
