<?php

namespace App\Services\Email;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{
    
    /**
     * Envia e-mails ao passar o assunto, template e dados do template (se houver)
     *
     * @param string $to
     * @param string $subject
     * @param string $template
     * @param array $data
     * @return bool
     */
    public function send(string $to, string $subject, string $template, array $data = []): bool
    {
        try {
            Mail::send($template, $data, function ($message) use ($to, $subject) {
                $message->to($to)
                    ->subject($subject);
            });

            Log::channel('debug')->info("E-mail \"$template\" enviado com sucesso para o endereço \"$to\".");

            return true;
        } catch (\Exception $e) {
            Log::channel('debug')->warning("Erro ao enviar e-mail \"$template\" para o endereço \"$to\": " . $e->getMessage());
            Log::channel('exceptions')->error($e->getMessage(), [$e->getTrace()[0], $e->getTrace()[1]]);

            return false;
        }
    }
}
