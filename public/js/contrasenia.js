document.addEventListener('DOMContentLoaded', function() {
    var password1 = document.getElementById('pass');
    var password2 = document.getElementById('cpass');

    if (password1 && password2) {
        password2.addEventListener('input', function() {
            if (password1.value !== password2.value) {
                password2.setCustomValidity('Las contraseñas deben coincidir');
            } else {
                password2.setCustomValidity('');
            }
        });
    }

    function validarContrasenia() {
        var password1 = document.getElementById('pass');
        var password2 = document.getElementById('cpass');
    
        if (password1.value !== password2.value) {
            password2.setCustomValidity('Las contraseñas deben coincidir');
            return false;
        } else {
            password2.setCustomValidity('');
            return true;
        }
    }
});