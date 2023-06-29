
/*
// Obtén el formulario y agrega un evento de envío
const loginForm = document.querySelector('.login-form');

loginForm.addEventListener('submit', function (event) {
  // Detiene el envío del formulario por defecto
  event.preventDefault();

  // Verifica si los campos están completados correctamente
  const emailInput = document.getElementById('form2Example11');
  const passwordInput = document.getElementById('form2Example22');
/*
  if (emailInput.value && passwordInput.value) {
    // Redirecciona a la página deseada
    window.location.href = 'principal.php';
  }
  
});
*/

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


// Obtén el botón por su clase
const btnRedirect = document.querySelector('.btn.btn-custom1');

// Agrega un evento de clic al botón
btnRedirect.addEventListener('click', function() {
  // Redirecciona a la página deseada
  window.location.href = 'registrar.php';
});

