<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirma tu cuenta - Ferretería Guzmán</title>
</head>
<body style="margin: 0; padding: 20px; background-color: #f7f9fc; font-family: 'Segoe UI', Arial, sans-serif;">
<div style="max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    <!-- Header -->
    <header style="background: #2A5C82; padding: 25px; border-radius: 12px 12px 0 0; text-align: center;">
        <h2 style="color: #ffffff; margin: 0; padding: 0; font-size: 1.8rem; letter-spacing: 0.5px;">
            Ferretería Guzmán
        </h2>
    </header>

    <div style="padding: 30px 25px;">

        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 25px;">

            <h2 style="color: #2A5C82; margin: 0; font-size: 1.5rem;">Hola {{$nombreCompleto}},</h2>
        </div>

        <div style="color: #4a5568; line-height: 1.6;">
            <p>¡Bienvenido/a a Ferretería Guzmán! Tu cuenta ha sido creada exitosamente.</p>

            <div style="background: #f8fafc; padding: 15px; border-radius: 8px; margin: 20px 0;">
                <p style="margin: 0;">
                    Corrreo Electrónico: <strong style="color: #2A5C82;">{{$correo}}</strong>
                </p>
            </div>

            <p>Para activar tu cuenta, por favor confirma tu dirección de correo electrónico:</p>

            <!-- Botón para confirmar cuenta -->
            <a href="{{env('APP_URL')}}/register/{{$correo}}/confirmar/"
               style="display: inline-block; padding: 14px 30px; background: #2A5C82;
                          color: white; text-decoration: none; border-radius: 8px;
                          font-weight: 600; transition: all 0.3s ease; margin: 15px 0;">
                Confirmar cuenta
            </a>

            <p style="margin: 25px 0 0; font-size: 0.9em; color: #718096;">
                Gracias. <br>
                <span style="word-break: break-all; color: #2A5C82;"{{env('APP_URL')}}/register/{{$correo}}/confirmar/"</span>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background: #f7f9fc; padding: 20px; text-align: center; border-radius: 0 0 12px 12px;">
        <p style="margin: 0; font-size: 0.85em; color: #718096;">
            © 2025 Ferretería Guzmán · Todos los derechos reservados<br>

        </p>
    </footer>
</div>
</body>
</html>
