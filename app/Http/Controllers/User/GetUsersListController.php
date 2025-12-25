<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\UserServices\GetUsersListService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetUsersListController extends Controller
{
    public function __construct(
        protected GetUsersListService $getUsersListService
    ) {}

    public function get(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->getUsersListService
            ->list($request);
    }
}
