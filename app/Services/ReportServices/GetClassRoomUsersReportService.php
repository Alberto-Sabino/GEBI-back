<?php

namespace App\Services\ReportServices;

use App\Services\ClassRoomUserServices\GetClassRoomUsersByClassRoomIdService;

class GetClassRoomUsersReportService
{
    private const REPORT_TITLE = '%s - %s - Colaboradores';

    private const REPORT_FIELDS = [
        'COLABORADOR' => 'user_name',
        'HORA ENTRADA' => 'user_entry_at',
        'HORA SAÍDA' => 'user_exit_at'
    ];

    public function __construct(
        protected GetClassRoomUsersByClassRoomIdService $getClassRoomUsersByClassRoomIdService,
        protected GeneratePDFReportService $generatePDFReportService
    ) {}

    public function generateReport(int $classRoomId): string
    {
        $classRoomUsers = $this->getClassRoomUsersByClassRoomIdService
            ->getClassRoomUsersByClassRoomId($classRoomId)
            ->toArray();

        return $this->generatePDFReportService
            ->generate(
                $this->getReportTitle($classRoomUsers[0]),
                self::REPORT_FIELDS,
                $classRoomUsers
            );
    }

    private function getReportTitle(array $classRoomLine): string
    {
        return sprintf(
            self::REPORT_TITLE,
            $classRoomLine['classroom_date'],
            $classRoomLine['classroom_theme']
        );
    }
}
