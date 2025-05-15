<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="icon" href="img/constructor.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .centered-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .recovery-card {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background: white;
            padding: 2rem;
        }
        .btn-recovery {
            background-color: #3b0bfa;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-recovery:hover {
            background-color: #2a08c9;
        }
    </style>
</head>
<body>

<div class="centered-wrapper">
    <div class="recovery-card">
        <div class="text-center mb-4">
            <h2 class="h4 text-dark mb-3">Recuperación de Contraseña</h2>
            <p class="text-muted small">Ingresa tu correo electrónico para restablecerla</p>
        </div>

        <!-- Alerta de correo exito o fallo algo -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form id="passwordRecoveryForm" action="{{ route('password.email') }}" method="POST" novalidate>
            @csrf
            <div class="mb-4">
                <input type="email" class="form-control form-control-lg" id="correo" name="correo" required placeholder="admin@gmail.com">
                <div class="invalid-feedback">Por favor ingresa un correo electrónico válido.</div>
                <div class="valid-feedback text-success">¡Correo válido!</div>
            </div>

            <button type="submit" class="btn btn-recovery w-100 py-2">
                Restablecer contraseña
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none small text-muted">
                    Inicio de Sesión
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('passwordRecoveryForm');
        const emailInput = document.getElementById('correo');

        if (form) {
            emailInput.addEventListener('input', validateEmail);

            form.addEventListener('submit', function (e) {
                if (!validateEmail()) {
                    e.preventDefault();
                    return;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Enlace enviado',
                    text: 'Si el correo está registrado, se enviará un enlace de recuperación.',
                    confirmButtonColor: '#3b0bfa'
                });
            });
        }

        function validateEmail() {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
            const errorMessage = emailInput.parentElement.querySelector('.invalid-feedback');
            const successMessage = emailInput.parentElement.querySelector('.valid-feedback');

            if (!emailInput.value.trim()) {
                emailInput.classList.add('is-invalid');
                emailInput.classList.remove('is-valid');
                errorMessage.textContent = 'El correo electrónico es requerido.';
                return false;
            }

            if (!regex.test(emailInput.value)) {
                emailInput.classList.add('is-invalid');
                emailInput.classList.remove('is-valid');
                errorMessage.textContent = 'Por favor ingresa un correo electrónico válido.';
                return false;
            }

            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
            errorMessage.textContent = '';
            successMessage.textContent = '¡Correo válido!';
            return true;
        }
    });
</script>
</body>
</html>
