<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function auth(string $document, string $password): ?User;

    public function getReportData(PaginationAndFiltersRequest $request): LengthAwarePaginator;
}