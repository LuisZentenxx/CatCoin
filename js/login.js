// Obtén el formulario y agrega un evento de envío
const loginForm = document.querySelector('.login-form');

loginForm.addEventListener('submit', function (event) {
  // Detiene el envío del formulario por defecto
  event.preventDefault();

  // Verifica si los campos están completados correctamente
  const emailInput = document.getElementById('form2Example11');
  const passwordInput = document.getElementById('form2Example22');

  if (emailInput.value && passwordInput.value) {
    // Redirecciona a la página deseada
    window.location.href = 'https://www.youtube.com/shorts/ZDliDUx0JDU';
  }
});

// Obtén el botón por su clase
const btnRedirect = document.querySelector('.btn.btn-primary');

// Agrega un evento de clic al botón
btnRedirect.addEventListener('click', function() {
  // Redirecciona a la página deseada
  window.location.href = 'registro.html';
});

