<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Services\ReportServices\GetClassRoomChildrenReportService;

class GetClassRoomChildrenReportController extends Controller
{
    public function __construct(
        protected GetClassRoomChildrenReportService $getClassRoomChildrenReportService
    ) {}

    public function get(int $id): string
    {
        return $this->getClassRoomChildrenReportService
            ->generateReport($id);
    }
}
