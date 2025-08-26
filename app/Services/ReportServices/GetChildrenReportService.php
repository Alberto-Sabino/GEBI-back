<?php

namespace App\Services\ReportServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\ChildServices\GetChildReportDataService;

class GetChildrenReportService
{
    private const REPORT_TITLE = 'Relatório de Crianças';

    private const REPORT_FIELDS = [
        'ID' => 'id',
        'GENERO' => 'genderLabel',
        'NOME' => 'fullName',
        'IDADE' => 'age',
        'DATA_NASC' => 'birthDate',
        'COMUM' => 'commonCongregation',
        'Nº_RESPONSÁVEIS' => 'guardians_count'
    ];

    public function __construct(
        protected GetChildReportDataService $getChildReportDataService,
        protected GeneratePDFReportService $generatePDFReportService
    ) {}

    public function generateReport(PaginationAndFiltersRequest $request): string
    {
        $children = $this->getChildReportDataService
            ->getReportData($request);

        return $this->generatePDFReportService
            ->generate(
                self::REPORT_TITLE,
                self::REPORT_FIELDS,
                $children->items()
            );
    }
}
