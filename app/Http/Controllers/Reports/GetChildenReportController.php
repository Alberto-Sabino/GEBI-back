<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\ReportServices\GetChildrenReportService;

class GetChildenReportController extends Controller
{
    public function __construct(
        protected GetChildrenReportService $getChildrenReportService
    ) {}

    // Return base64 encoded PDF content
    public function get(PaginationAndFiltersRequest $request): string
    {
        return $this->getChildrenReportService
            ->generateReport($request);
    }
}
