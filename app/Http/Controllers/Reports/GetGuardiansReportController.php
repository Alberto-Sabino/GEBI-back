<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\ReportServices\GetGuardiansReportService;

class GetGuardiansReportController extends Controller
{
    public function __construct(
        protected GetGuardiansReportService $getGuardiansReportService
    ) {}

    // Return base64 encoded PDF content
    public function get(PaginationAndFiltersRequest $request): string
    {
        return $this->getGuardiansReportService
            ->generateReport($request);
    }
}
