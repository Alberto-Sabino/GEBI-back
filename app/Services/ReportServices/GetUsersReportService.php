<?php

namespace App\Services\ReportServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\UserServices\GetUserReportDataService;

class GetUsersReportService
{
    private const REPORT_TITLE = 'Relatório de Colaboradores';

    private const REPORT_HEADERS = [
        'NOME_COMPLETO' => 'fullName',
        'DOCUMENTO' => 'document',
        'DATA_NASC' => 'birthDate',
        'ANO_BATISMO' => 'baptismYear',
        'CELULAR' => 'phone',
        'EMAIL' => 'email',
        'CIDADE' => 'city',
        'COMUM' => 'commonCongregation'
    ];

    public function __construct(
        protected GetUserReportDataService $getUserReportDataService,
        protected GeneratePDFReportService $generatePDFReportService
    ) {}

    public function generateReport(PaginationAndFiltersRequest $request): string
    {
        $users = $this->getUserReportDataService
            ->getReportData($request);

        return $this->generatePDFReportService
            ->generate(
                self::REPORT_TITLE,
                self::REPORT_HEADERS,
                $users->items()
            );
    }
}
