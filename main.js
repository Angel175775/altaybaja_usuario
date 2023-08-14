document.addEventListener("DOMContentLoaded", function (e) {
    const form = document.querySelector("#form");

    const fullName = document.querySelector("#full-name");
    const email = document.querySelector("#email");
    const usuario = document.querySelector("#full-usuario")
    const password = document.querySelector("#password");
    
    const fullNameValidation = document.querySelector("#full-name-validation");
    const emailValidation = document.querySelector("#email-validation");
    const usuarioValidation = document.querySelector("#full-usu-validation");
    const passwordValidation = document.querySelector("#password-validation");
    
    const validateFullName = function() {
        const nombre=fullName.value.trim();
        if (nombre === "")
        {
            fullNameValidation.textContent= "El campo nombre es requerido.";
            fullNameValidation.classList.remove("d-none");
            return false;
        }
        fullNameValidation.classList.add("d-none");
        return true;
    }

    const validateEmail = function() {
        // Validaciones del correo electrónico
        const emailValue = email.value.trim();
        const emailRegex = new RegExp(/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/g); // Caracteres de la a-z, numero 0-9, un arroba, caracteres de la a-z, un punto, 2 0 3 caracteres de la a-z
        
        if (emailValue === "") {
            emailValidation.textContent = "El campo correo electrónico es requerido.";
            emailValidation.classList.remove("d-none");

            return false;
        }

        if (! emailRegex.test(emailValue)) {
            emailValidation.textContent = "El campo correo electrónico debe tener un formato de email.";
            emailValidation.classList.remove("d-none");

            return false;
        }

        emailValidation.classList.add("d-none");

        return true;
    }

///////Agregar las validaciones al usuario con el mismo de nombre //// fijateeeeee

const validateFullUsuario = function() {
    const usuario=usuario.value.trim();
    const usuarioRegex= new RegExp(/^a-zA-Z0-9/);
    if (usuario === "")
    {
        usuarioValidation.textContent= "El campo nombre es requerido.";
        usuarioValidation.classList.remove("d-none");
        return false;
    }
    if (! usuarioRegex.test(usuario)) {
        usuarioValidation.textContent = "El campo usuario debe tener caracteres o numeros";
        usuarioValidation.classList.remove("d-none");

        return false;
    }
    usuarioValidation.classList.add("d-none");
    return true;
}
   

    const validatePassword = function () {
        // Validaciones de la contraseña
        const contrasenia = password.value.trim();
        if (contrasenia === "")
        {
            passwordValidation.textContent= "Se requiere una contraseña"
            passwordValidation.classList.remove("d-none");
            return false;
        }
   
        if (contrasenia.length<8)
        {
            passwordValidation.textContent= "La contraseña debe contener al menos 8 caracteres"
            passwordValidation.classList.remove("d-none");
            return false;
        }
        passwordValidation.classList.add("d-none");
        return true;
    }

    const validateForm = function (e) {
        e.preventDefault();

        if (validateFullName() && 
            validateEmail() && 
            validateFullUsuario() &&
            validatePassword()) {
            // Se valido todo! Enviamos el formulario
            form.submit();
        }
    }

    // Seteo de clase d-none a las validaciones
    fullNameValidation.classList.add("d-none");
    emailValidation.classList.add("d-none");
    usuarioValidation.classList.add("d-none");
    passwordValidation.classList.add("d-none");
    form.addEventListener("submit", validateForm);
});