document.addEventListener('DOMContentLoaded', function() {
    // Validación para el formulario de recuperación de contraseña
    const recoveryForm = document.getElementById('folvide');
    
    if (recoveryForm) {
        recoveryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = document.getElementById('rcorreo');
            const isEmailValid = validateRecoveryEmail(emailInput);
            
            if (isEmailValid) {
                // Simular envío de recuperación
                simulateRecovery();
            }
        });
        
        // Validación en tiempo real para el correo de recuperación
        document.getElementById('rcorreo').addEventListener('input', function() {
            validateRecoveryEmail(this);
        });
    }

    // Función de validación específica para recuperación
    function validateRecoveryEmail(emailInput) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
        const errorElement = emailInput.parentElement.querySelector('.invalid-feedback');
        const successElement = emailInput.parentElement.querySelector('.valid-feedback');
        
        if (!emailInput.value) {
            showRecoveryError(emailInput, errorElement, 'El correo electrónico es requerido');
            return false;
        }
        
        if (!emailRegex.test(emailInput.value)) {
            showRecoveryError(emailInput, errorElement, 'Por favor ingresa un correo electrónico válido');
            return false;
        }
        
        showRecoverySuccess(emailInput, successElement, '¡Correo válido!');
        return true;
    }

    // Funciones auxiliares para el modal de recuperación
    function showRecoveryError(input, errorElement, message) {
        errorElement.innerHTML = message;
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }

    function showRecoverySuccess(input, successElement, message) {
        successElement.textContent = message;
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }

    
});