/**
 * Alternar la visibilidad de la contraseña en un campo de entrada de texto.
 * @param {string} inputId - ID del elemento de entrada de texto.
 * @param {string} iconId - ID del ícono asociado.
 */
function togglePasswordVisibility(inputId, iconId) {
    // Obtener los elementos de entrada de texto y el ícono correspondiente mediante los IDs proporcionados.
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    // Verificar si el tipo de entrada es "password".
    if (input.type === "password") {
        // Si es "password", cambiar el tipo de entrada a "text".
        input.type = "text";
        // Actualizar las clases del ícono para mostrar el ícono de "ojo tachado".
        icon.classList.remove("bi-eye-fill");
        icon.classList.add("bi-eye-slash-fill");
    } else {
        // Si no es "password" (es decir, es "text" u otro tipo), cambiar el tipo de entrada a "password".
        input.type = "password";
        // Actualizar las clases del ícono para mostrar el ícono de "ojo".
        icon.classList.remove("bi-eye-slash-fill");
        icon.classList.add("bi-eye-fill");
    }
}

/**
 * Alternar la visibilidad de la contraseña en un campo de entrada de texto al hacer clic en un botón.
 * @param {string} inputId - ID del elemento de entrada de texto.
 * @param {string} buttonId - ID del botón asociado.
 */
function togglePasswordVisibility(inputId, buttonId) {
    // Obtener el elemento de entrada de texto y el botón correspondiente mediante los IDs proporcionados.
    var passwordInput = document.getElementById(inputId);
    var passwordButton = document.getElementById(buttonId);

    // Verificar si el tipo de entrada es "password".
    if (passwordInput.type === "password") {
        // Si es "password", cambiar el tipo de entrada a "text".
        passwordInput.type = "text";
        // Actualizar las clases del botón para mostrar el ícono de "ojo tachado".
        passwordButton.classList.remove("bi-eye-fill");
        passwordButton.classList.add("bi-eye-slash-fill");
    } else {
        // Si no es "password" (es decir, es "text" u otro tipo), cambiar el tipo de entrada a "password".
        passwordInput.type = "password";
        // Actualizar las clases del botón para mostrar el ícono de "ojo".
        passwordButton.classList.remove("bi-eye-slash-fill");
        passwordButton.classList.add("bi-eye-fill");
    }
}

/**
 * Verificar si dos contraseñas ingresadas coinciden y mostrar un mensaje correspondiente.
 */
function checkPasswordMatch() {
    // Obtener los valores de las contraseñas ingresadas y el elemento de ayuda correspondiente.
    var password1 = document.getElementById("exampleInputPassword1").value;
    var password2 = document.getElementById("exampleInputPassword2").value;
    var confirmPasswordHelp = document.getElementById("confirmPasswordHelp");

    // Verificar si las contraseñas coinciden.
    if (password1 === password2) {
        // Si coinciden, mostrar un mensaje indicando que las contraseñas coinciden.
        confirmPasswordHelp.textContent = "Las contraseñas coinciden.";
    } else {
        // Si no coinciden, mostrar un mensaje indicando que las contraseñas no coinciden.
        confirmPasswordHelp.textContent = "Las contraseñas no coinciden.";
    }
}
