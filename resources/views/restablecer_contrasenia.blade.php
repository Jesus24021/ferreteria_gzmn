<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="icon" href="img/constructor.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .reset-card {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background: white;
            padding: 2rem;
        }
    </style>
</head>
<body>
<div class="centered-wrapper">
    <div class="reset-card">
        <div class="text-center mb-4">
            <h2 class="h4 text-dark mb-3">Restablecer Contraseña</h2>
            <p class="text-muted small">Ingresa tu nueva contraseña</p>
        </div>
        <form id="passwordResetForm" action="{{route('password.update')}}" method="post">
            @csrf
            <input type="hidden" name="mytoken" value="{{ $token }}">

            <!-- Campo Nueva Contraseña -->
            <div class="mb-3">
                <input type="password" id="contrasennia" name="contrasennia" class="form-control form-control-lg"
                       placeholder="Nueva contraseña"
                       required
                       minlength="8">
                <div class="invalid-feedback">
                    La contraseña debe tener al menos 8 caracteres
                </div>
            </div>

            <!-- Campo Confirmar Contraseña -->
            <div class="mb-4">
                <input type="password" id="recontrasennia" name="recontrasennia" class="form-control form-control-lg"
                       placeholder="Confirmar contraseña" required>
                <div class="invalid-feedback">
                    Las contraseñas deben coincidir
                </div>
            </div>

            <button type="submit" class="btn btn-reset w-100 py-2">
                Restablecer contraseña
            </button>

            <div class="text-center mt-4">
                <a href="{{route('login')}}" class="text-decoration-none small text-muted">
                    Inicio de Sesión
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const form = document.getElementById('passwordResetForm');
    const newPassword = document.getElementById('contrasennia');
    const confirmPassword = document.getElementById('recontrasennia');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Restablecer el estado de la validacion
        [newPassword, confirmPassword].forEach(field => {
            field.classList.remove('is-valid', 'is-invalid');
        });

        // Validacion de 8 carcateres
        const isPasswordValid = newPassword.value.length >= 8;
        const doPasswordsMatch = newPassword.value === confirmPassword.value;

        // Aplicar estados
        if (!isPasswordValid) {
            newPassword.classList.add('is-invalid');
        }
        if (!doPasswordsMatch) {
            confirmPassword.classList.add('is-invalid');
        }

        // Sirve para verificar si todo es valido
        if (isPasswordValid && doPasswordsMatch) {
            newPassword.classList.add('is-valid');
            confirmPassword.classList.add('is-valid');
            this.submit(); // Enviar formulario
        }
    });

    // Validación en tiempo real
    newPassword.addEventListener('input', function() {
        this.classList.remove('is-valid', 'is-invalid');
        if (this.value.length >= 8) {
            this.classList.add('is-valid');
        } else if (this.value.length > 0) {
            this.classList.add('is-invalid');
        }
        confirmPassword.dispatchEvent(new Event('input'));
    });

    confirmPassword.addEventListener('input', function() {
        this.classList.remove('is-valid', 'is-invalid');
        if (this.value === newPassword.value && this.value !== '') {
            this.classList.add('is-valid');
        } else if (this.value !== '') {
            this.classList.add('is-invalid');
        }
    });

</script>
