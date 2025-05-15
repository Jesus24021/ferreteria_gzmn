<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <style>
        .button:hover {
            background-color: #1a4a72 !important;
        }
    </style>
</head>
<body style="margin: 0; padding: 20px; background-color: #f7f9fc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <!-- Header -->
        <header style="background: #2A5C82; padding: 25px; border-radius: 12px 12px 0 0; text-align: center;">
            <h2 style="color: #ffffff; margin: 0; font-size: 1.8rem; letter-spacing: 0.5px;">
                Recuperación de Contraseña
            </h2>
        </header>

        <!-- Contenido -->
        <div style="padding: 30px;">
            <div style="margin-bottom: 25px;">
                <p style="color: #4a5568; margin: 0 0 20px 0;">Estimado/a {{ $nombreCompleto }},</p>
                <p style="color: #4a5568; margin: 0 0 25px 0;">Hemos recibido una solicitud para restablecer la contraseña de su cuenta. Para proceder con el cambio de contraseña, haga clic en el siguiente botón:</p>

                <a href="{{ env('APP_URL') }}/password/reset/{{$token}}" 
                   style="background-color: #2A5C82; color: #ffffff; padding: 14px 30px; 
                          text-decoration: none; display: inline-block; border-radius: 8px;
                          font-weight: 600; transition: all 0.3s ease; margin: 15px 0;">
                    Restablecer Contraseña
                </a>
            </div>

            <div style="border-top: 1px solid #e2e8f0; padding: 25px 0;">
                <p style="color: #718096; font-size: 0.9em; margin: 0 0 15px 0;">
                    Si el botón no funciona, copie y pegue este enlace en su navegador:<br>
                    <span style="color: #2A5C82; word-break: break-all; display: inline-block; margin-top: 10px;">
                        {{ env('APP_URL') }}/password/reset/{{$token}}
                    </span>
                </p>

                <div style="background: #fff5f5; padding: 15px; border-radius: 8px; margin-top: 20px;">
                    <p style="color: #718096; font-size: 0.9em; margin: 0;">
                         Si no ha solicitado este cambio, ignore este correo.<br>
                        Su contraseña actual seguirá siendo válida.
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer style="background: #f7f9fc; padding: 20px; text-align: center; border-radius: 0 0 12px 12px;">
            <p style="color: #718096; font-size: 0.85em; margin: 0;">
                
                ©2025 Ferretería Guzmán· Todos los derechos reservados<br>            
            </p>
        </footer>
    </div>
</body>
</html>