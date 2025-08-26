<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\PaginationAndFiltersRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AuditRepositoryInterface extends BaseRepositoryInterface
{
    public function listAudits(PaginationAndFiltersRequest $request): LengthAwarePaginator;
}
