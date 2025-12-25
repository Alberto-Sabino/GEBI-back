<?php

namespace App\Services\ReportServices;

use Illuminate\Support\Facades\View;

class GeneratePDFReportService
{
    public function generate(string $title, array $headers, array $data): string
    {
        $pdfContent = View::make('PDF.base-report', [
            'title' => $title,
            'headers' => $headers,
            'data' => $data,
        ])->render();

        return base64_encode($pdfContent);
    }
}
