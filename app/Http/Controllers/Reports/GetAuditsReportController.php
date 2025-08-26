<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\ReportServices\GetAuditReportService;

class GetAuditsReportController extends Controller
{
    public function __construct(
        protected GetAuditReportService $getAuditReportService
    ) {}

    // Return base64 encoded PDF content
    public function get(PaginationAndFiltersRequest $request): string
    {
        return $this->getAuditReportService
            ->generateReport($request);
    }
}
