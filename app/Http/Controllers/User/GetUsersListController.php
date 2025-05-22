<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\UserServices\GetUsersListService;

class GetUsersListController extends Controller
{
    public function __construct(
        protected GetUsersListService $getUsersListService
    ) {}

    public function get(PaginationAndFiltersRequest $request)
    {
        return $this->getUsersListService
            ->list($request);
    }
}
