<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nuevo Mensaje de Contacto - Grupo EMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333333;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #030918;
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        .message {
            background: #f1f1f1;
            padding: 15px;
            border-left: 4px solid #fc5e28;
            border-radius: 4px;
            white-space: pre-wrap;
        }

        .reply-link {
            display: inline-block;
            background-color: #fc5e28;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
        }

        .reply-link:hover {
            background-color: #005f8b;
        }

        .footer {
            background-color: #030918;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Nuevo Mensaje de Contacto</h2>
        </div>
        <div class="content">
            <p>Has recibido un nuevo mensaje a través del formulario de contacto de tu sitio web <strong>Grupo
                    EMI</strong>. A continuación, se muestran los detalles:</p>

            <div class="info">
                <p><strong>Nombre:</strong> {{ $details['name'] }}</p>
                <p><strong>Email:</strong> {{ $details['email'] }}</p>
                <p><strong>Teléfono:</strong> {{ $details['phone'] }}</p>
                <p><strong>Asunto:</strong> {{ $details['subject'] }}</p>
            </div>

            <h3>Mensaje:</h3>
            <div class="message">
                {{ $details['message'] }}
            </div>

            <a class="reply-link" href="mailto:{{ $details['email'] }}?subject=Re: {{ urlencode($details['subject']) }}"
                style="display: inline-block; background-color: #fc5e28; color: #ffffff !important; text-decoration: none; padding: 10px 15px; border-radius: 5px; margin-top: 20px; font-size: 14px;">
                Responder a este mensaje
            </a>
        </div>
        <div class="footer">
            <p>Este mensaje fue enviado automáticamente desde el formulario de contacto de Grupo EMI.</p>
        </div>
    </div>
</body>

</html>
