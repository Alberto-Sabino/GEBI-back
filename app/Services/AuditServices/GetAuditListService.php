<?php

namespace App\Services\AuditServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Repositories\Contracts\AuditRepositoryInterface;

class GetAuditListService
{
    public function __construct(
        protected AuditRepositoryInterface $repository
    ) {}

    public function listAudits(PaginationAndFiltersRequest $request)
    {
        return $this->repository
            ->listAudits($request);
    }
}
