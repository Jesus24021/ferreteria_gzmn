<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Cuenta</title>
    <link rel="icon" href="img/constructor.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .centered-card {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .compact-form .form-control {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        .brand-title {
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }
        .invalid-feedback {
            font-size: 0.8rem;
        }
    </style>
</head>
<body class="bg-light">
<div class="container min-vh-100 d-flex align-items-center justify-content-center p-3">
    <div class="centered-card bg-white p-4">
        <div class="text-center mb-4">
            <h2 class="brand-title text-dark mb-3">Ferretería Guzmán</h2>
            <p class="text-muted small mb-0">Crear nueva cuenta</p>
        </div>
        <form class="compact-form" id="registroForm" action="{{Route('register.store')}}" method="post">
            @csrf
            <div class="mb-3"> <input type="text" class="form-control" id="nombre" name="nombre"
                       placeholder="Nombre completo" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,50}">
                <div class="invalid-feedback"> Ingrese un nombre válido (3-50 caracteres)</div>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" id="correo" name="correo"
                       placeholder="Correo electrónico"
                       required>
                <div class="invalid-feedback">
                    Ingrese un correo electrónico válido
                </div>
            </div>

            <!-- Nombre de Usuario -->
            <div class="mb-3">
                <input type="text"
                       class="form-control" id="usuario" name="usuario"
                       placeholder="Nombre de usuario"
                       required
                       pattern="[A-Za-z0-9]{5,20}">
                <div class="invalid-feedback">
                    5-20 caracteres (solo letras y números)
                </div>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <input type="password"
                       class="form-control" id="contrasennia" name="contrasennia"
                       placeholder="Contraseña"
                       required
                       minlength="8">
                <div class="invalid-feedback">
                    Mínimo 8 caracteres
                </div>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <input type="password"
                       class="form-control" id="recontrasennia" name="recontrasennia"
                       placeholder="Confirmar contraseña"
                       required>
                <div class="invalid-feedback">
                    Las contraseñas deben coincidir
                </div>
            </div>

            <button type="submit" id="enviarFormulario" class="btn btn-primary w-100 btn-sm py-2 mb-3">
                Registrarse
            </button>

            <div class="text-center">
                <p class="small text-muted mb-0">
                    ¿Ya tienes cuenta?
                    <a href="{{route('login')}}" class="text-decoration-none">Iniciar sesión</a>
                </p>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('registroForm');
        const passwordInput = document.getElementById('contrasennia');
        const confirmInput = document.getElementById('recontrasennia');

        if (form) {
            // Deshabilitar validación HTML5
            form.setAttribute('novalidate', true);

            // Eventos de validación en tiempo real
            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('input', () => {
                    switch(input.id) {
                        case 'nombre': validateNombre(); break;
                        case 'correo': validateEmail(); break;
                        case 'usuario': validateUsuario(); break;
                        case 'contrasennia': validatePassword(); break;
                        case 'recontrasennia': validateConfirmPassword(); break;
                    }
                });
            });

            // Validar al enviar
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const validations = [
                    validateNombre(),
                    validateEmail(),
                    validateUsuario(),
                    validatePassword(),
                    validateConfirmPassword()
                ];

                if (validations.every(v => v === true)) {
                    this.submit();
                }
            });
        }
        //valida que cada campo cumpla
        function validateNombre() {
            const input = document.getElementById('nombre');
            const regex = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,50}$/;

            if (!input.value.trim()) return showError(input, 'El nombre es requerido');
            if (!regex.test(input.value)) return showError(input, 'Solo letras y espacios (3-50 caracteres)');
            return showSuccess(input);
        }
        function validateEmail() {
            const input = document.getElementById('correo');
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

            if (!input.value.trim()) return showError(input, 'El correo es requerido');
            if (!regex.test(input.value)) return showError(input, 'Correo electrónico inválido');

            return showSuccess(input);
        }
        function validateUsuario() {
            const input = document.getElementById('usuario');
            const regex = /^[A-Za-z0-9]{5,20}$/;

            if (!input.value.trim()) return showError(input, 'El usuario es requerido');
            if (!regex.test(input.value)) return showError(input, 'Solo letras y números (5-20 caracteres)');

            return showSuccess(input);
        }
        function validatePassword() {
            const input = passwordInput;
            const password = input.value;
            const errors = [];

            if (!password) return showError(input, 'La contraseña es requerida');

            if (password.length < 8) errors.push("Mínimo 8 caracteres");
            if (!/[A-Z]/.test(password)) errors.push("1 mayúscula");
            if (!/[a-z]/.test(password)) errors.push("1 minúscula");
            if (!/[0-9]/.test(password)) errors.push("1 número");
            if (!/[\W_]/.test(password)) errors.push("1 carácter especial");

            if (errors.length > 0) {
                return showError(input, `Requerido:<br>${errors.map(e => `• ${e}`).join('<br>')}`);
            }

            return showSuccess(input);
        }
        function validateConfirmPassword() {
            const input = confirmInput;

            if (!input.value.trim()) return showError(input, 'Confirme la contraseña');
            if (input.value !== passwordInput.value) return showError(input, 'Las contraseñas no coinciden');

            return showSuccess(input);
        }
        function showError(input, message) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            input.parentElement.querySelector('.invalid-feedback').innerHTML = message;
            return false;
        }
        function showSuccess(input) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            input.parentElement.querySelector('.invalid-feedback').textContent = '';
            return true;
        }
    });
</script>
</body>
</html>
