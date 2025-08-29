<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\ChildServices\GetChildrenListService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetChildListController extends Controller
{
    public function __construct(
        protected GetChildrenListService $getChildrenListService
    ) {}

    public function get(PaginationAndFiltersRequest $request): LengthAwarePaginator
    {
        return $this->getChildrenListService
            ->list($request);
    }
}
