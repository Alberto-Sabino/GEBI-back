<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\ReportServices\GetUsersReportService;

class GetUsersReportController extends Controller
{
    public function __construct(
        protected GetUsersReportService $getUsersReportService
    ) {}

    // Return base64 encoded PDF content
    public function get(PaginationAndFiltersRequest $request): string
    {
        return $this->getUsersReportService
            ->generateReport($request);
    }
}
