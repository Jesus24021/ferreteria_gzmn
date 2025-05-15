<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirmación Exitosa</title>

  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }
    .centered-card {
      width: 100%;
      max-width: 400px;
      border: none;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .card-body {
      text-align: center;
      padding: 2rem;
    }
  </style>
</head>
<body>
  <div class="centered-card card">
    <div class="card-body">
      <h3 class="mb-3">¡Cuenta confirmada!</h3>
      <p class="text-muted">
        El correo <strong>csctomasgonzalez@gmail.com</strong><br>
        ha sido verificado exitosamente
      </p>
      <a href="{{route('login')}}" class="btn btn-primary mt-3">
        <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
      </a>
    </div>
  </div>
</body>
</html>
