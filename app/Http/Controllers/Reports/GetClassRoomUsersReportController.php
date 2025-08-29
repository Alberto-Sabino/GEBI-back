<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Services\ReportServices\GetClassRoomUsersReportService;

class GetClassRoomUsersReportController extends Controller
{
    public function __construct(
        protected GetClassRoomUsersReportService $getClassRoomUsersReportService
    ) {}

    public function get(int $id): string
    {
        return $this->getClassRoomUsersReportService
            ->generateReport($id);
    }
}
