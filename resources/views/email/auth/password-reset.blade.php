<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
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
            background-color: #007bff;
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

        .email-body .highlight {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            font-weight: bold;
            padding: 10px;
            margin: 20px 0;
            text-align: center;
            font-size: 18px;
            color: #007bff;
            border-radius: 5px;
        }

        .email-footer {
            background-color: #f4f4f9;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #666;
        }

        .email-footer a {
            color: #007bff;
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
            <h1>Recuperação de Senha</h1>
        </div>

        <div class="email-body">
            <p>A paz de Deus, <strong>{{ $name }}</strong>,</p>

            <p>Conforme solicitado, sua senha foi redefinida com sucesso. Utilize a nova senha fornecida abaixo para acessar sua conta:</p>

            <div class="highlight">
                Sua nova senha: <strong>{{ $password }}</strong>
            </div>

            <p>Recomendamos que você altere essa senha assim que acessar sua conta para manter a segurança.</p>

            <p>Se você não solicitou essa alteração, entre em contato com nosso suporte imediatamente.</p>

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