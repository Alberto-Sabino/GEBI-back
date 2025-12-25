<?php

namespace App\Services\ReportServices;

use App\Http\Requests\PaginationAndFiltersRequest;
use App\Services\AuditServices\GetAuditListService;

class GetAuditReportService
{
    private const REPORT_TITLE = 'Relatório de Auditoria';

    private const REPORT_FIELDS = [
        'DATA' => 'date',
        'HORA' => 'time',
        'AÇÃO' => 'action',
        'ID_COLAB' => 'user_id',
        'NOME_COLAB' => 'user_name',
        'ID_CRIANCA' => 'child_id',
        'NOME_CRIANCA' => 'child_name',
        'ID_RESP' => 'guardian_id',
        'NOME_RESP' => 'guardian_name',
    ];

    public function __construct(
        protected GetAuditListService $getAuditListService,
        protected GeneratePDFReportService $generatePDFReportService
    ) {}

    public function generateReport(PaginationAndFiltersRequest $request): string
    {
        $audits = $this->getAuditListService
            ->listAudits($request);

        return $this->generatePDFReportService
            ->generate(
                self::REPORT_TITLE,
                self::REPORT_FIELDS,
                $audits->items()
            );
    }
}
