<?php

namespace App\Services\ReportServices;

use App\Services\ClassRoomChildServices\GetClassRoomChildrenByClassRoomIdService;

class GetClassRoomChildrenReportService
{
    // Class Date - Class Theme - Crianças
    private const REPORT_TITLE = '%s - %s - Crianças';
    private const REPORT_FIELDS = [
        'NOME' => 'child_name',
        'HORA ENTRADA' => 'child_entry_at',
        'HORA SAÍDA' => 'child_exit_at',
        'RESPONSÁVEL' => 'guardian_name'
    ];

    public function __construct(
        protected GetClassRoomChildrenByClassRoomIdService $getClassRoomChildrenByClassRoomIdService,
        protected GeneratePDFReportService $generatePDFReportService
    ) {}

    public function generateReport(int $classRoomId): string
    {
        $classRoomChildren = $this->getClassRoomChildrenByClassRoomIdService
            ->getClassRoomChildrenByClassRoomId($classRoomId)
            ->toArray();

        return $this->generatePDFReportService
            ->generate(
                $this->getReportTitle($classRoomChildren[0]),
                self::REPORT_FIELDS,
                $classRoomChildren
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
