<?php

namespace App\Services\ReportServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\GuardianServices\GetGuardianReportDataService;

class GetGuardiansReportService
{
    private const REPORT_TITLE = 'Relatório de Responsáveis';

    private const REPORT_HEADERS = [
        'NOME_COMPLETO' => 'fullName',
        'CELULAR' => 'phone',
        'CIDADE' => 'city',
        'COMUM' => 'commonCongregation',
        'Nº_CRIANÇAS' => 'children_count',
    ];

    public function __construct(
        protected GetGuardianReportDataService $getGuardianReportDataService,
        protected GeneratePDFReportService $generatePDFReportService
    ) {}

    public function generateReport(PaginationAndFiltersRequest $request): string
    {
        $guardians = $this->getGuardianReportDataService
            ->getReportData($request);

        return $this->generatePDFReportService
            ->generate(
                self::REPORT_TITLE,
                self::REPORT_HEADERS,
                $guardians->items()
            );
    }
}
