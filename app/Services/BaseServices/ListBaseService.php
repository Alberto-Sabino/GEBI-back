<?php

namespace App\Services\BaseServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListBaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository
    ) {}

    public function list(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->repository
            ->list($request);
    }
}
