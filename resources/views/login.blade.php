<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de Sesión</title>
    <link rel="icon" href="img/constructor.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10 p-5 shadow-lg" style="background-color:rgb(134, 89, 41);">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block p-5">
                            <img src="img/vector.jpg" class="img-fluid" style="border-radius: 1rem 0 0 1rem;">
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="text-center">
                                    <img class="pb-2" src="img/constructor.png" width="100" height="100">
                                    <h1 class="fs-4 card-title fw-bold mb-4">SISTEMA WEB DE ADMINISTRACIÓN PARA LA MICROEMPRESA "GUZMÁN"</h1>
                                </div>

                                    <form id="login" action="{{ route('login.post') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-2 text-muted" for="email">Correo electrónico</label>
                                            <input type="email" id="email" name="email" class="form-control">
                                            <div class="invalid-feedback"></div>
                                            <div class="valid-feedback"></div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted" for="password">Contraseña</label>
                                            <input type="password"  id="contrasennia" name="contrasennia" class="form-control">
                                            <div class="invalid-feedback"></div>
                                            <div class="valid-feedback"></div>

                                        </div>
                                    <div class="text-center pb-3">
                                        <button type="submit" class="btn btn-dark btn-lg ms-auto">Acceder</button>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{route('password.request')}}" class="float-start small">¿Olvidaste tu contraseña?</a>
                                        <a href="{{route('register.create')}}" class="float-end small">Crear una cuenta</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        //Para que la validacion se cumpla es necesario tener en cuenta el id del formulario asi como
       // de los campos
        document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('login');

        if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const isEmailValid = validateEmail(document.getElementById('email'));
        const isPasswordValid = validatePassword(document.getElementById('contrasennia'));

        if (isEmailValid && isPasswordValid) {
        this.submit(); // Envía el formulario si es válido
    }
    });

            // Validación en tiempo real para el correo
            document.getElementById('email').addEventListener('input', function() {
                validateEmail(this);
            });

            // Validación en tiempo real para la contraseña
            document.getElementById('contrasennia').addEventListener('input', function() {
                validatePassword(this);
            });

            // Botón para mostrar/ocultar contraseña
            setupPasswordToggle();
        }

        // Función de validación de email
        function validateEmail(emailInput) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
            const errorElement = emailInput.parentElement.querySelector('.invalid-feedback');
            const successElement = emailInput.parentElement.querySelector('.valid-feedback');

            if (!emailInput.value) {
                showError(emailInput, errorElement, 'El correo electrónico es requerido');
                return false;
            }

            if (!emailRegex.test(emailInput.value)) {
                showError(emailInput, errorElement, 'Por favor ingresa un correo electrónico válido');
                return false;
            }

            showSuccess(emailInput, successElement, '¡Correo válido!');
            return true;
        }

        // Función de validación de contraseña
        function validatePassword(passwordInput) {
            const errors = [];
            const password = passwordInput.value;

            if (!password) {
                showError(passwordInput, passwordInput.parentElement.querySelector('.invalid-feedback'),
                    'La contraseña es requerida');
                return false;
            }

            // Verificar cada requisito de la contraseña
            if (password.length < 8) errors.push("Mínimo 8 caracteres");
            if (!/[A-Z]/.test(password)) errors.push("1 letra mayúscula");
            if (!/[a-z]/.test(password)) errors.push("1 letra minúscula");
            if (!/[0-9]/.test(password)) errors.push("1 número");
            if (!/[\W_]/.test(password)) errors.push("1 carácter especial");

            if (errors.length > 0) {
                const errorMessage = "La contraseña necesita:<br>" + errors.map(e => `• ${e}`).join("<br>");
                showError(passwordInput, passwordInput.parentElement.querySelector('.invalid-feedback'), errorMessage);
                return false;
            }

            showSuccess(passwordInput, passwordInput.parentElement.querySelector('.valid-feedback'),
                '¡Contraseña segura!');
            return true;
        }

        // Funciones auxiliares
        function showError(input, errorElement, message) {
            errorElement.innerHTML = message;
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }

        function showSuccess(input, successElement, message) {
            successElement.textContent = message;
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        }

        function setupPasswordToggle() {
            const passwordInput = document.getElementById('contrasennia');
            const toggleButton = document.createElement('button');

            toggleButton.type = 'button';
            toggleButton.innerHTML = '<i class="far fa-eye"></i>';
            toggleButton.className = 'btn btn-outline-secondary';
            toggleButton.style.position = 'absolute';
            toggleButton.style.right = '5px';
            toggleButton.style.top = '50%';
            toggleButton.style.transform = 'translateY(-50%)';
            toggleButton.style.border = 'none';
            toggleButton.style.background = 'transparent';

            const inputGroup = passwordInput.parentElement;
            inputGroup.style.position = 'relative';
            inputGroup.appendChild(toggleButton);

            toggleButton.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        }
    });
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        @if (session('activo') =='false')
        Toast.fire({
            icon: 'error',
            title: '{{session('mensaje')}}'
        })
        @endif
    });
</script>
</body>
</html>
