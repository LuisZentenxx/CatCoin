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