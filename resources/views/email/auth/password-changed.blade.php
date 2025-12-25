<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua senha foi alterada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #e6e6e6;
        }

        .email-header {
            background-color: #4caf50;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-body {
            padding: 20px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin: 15px 0;
        }

        .email-footer {
            background-color: #f4f4f9;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #666;
        }

        .email-footer a {
            color: #4caf50;
            text-decoration: none;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Alteração de Senha</h1>
        </div>

        <div class="email-body">
            <p>A paz de Deus, <strong>{{ $name }}</strong>,</p>

            <p>Gostaríamos de informar que sua senha foi alterada com sucesso. Caso não tenha solicitado essa alteração, entre em contato conosco imediatamente.</p>

            <p>Se você realizou essa alteração, nenhuma ação adicional é necessária.</p>

            <p>Se tiver dúvidas ou precisar de ajuda, entre em contato com nosso suporte.</p>

            <p>Atenciosamente,<br>
                Equipe GEBI</p>
        </div>

        <div class="email-footer">
            <p>Este é um e-mail automático. Por favor, não responda.</p>
            <p>Precisa de ajuda? <a href="mailto:suporte@gebi.com.br">Entre em contato com nosso suporte</a>.</p>
        </div>
    </div>
</body>

</html>