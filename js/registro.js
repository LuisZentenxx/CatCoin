// Función para alternar la visibilidad de la contraseña
function togglePasswordVisibility(inputElement, buttonElement) {
  const type = inputElement.getAttribute('type') === 'password' ? 'text' : 'password';
  inputElement.setAttribute('type', type);
  buttonElement.classList.toggle('show-password');
  buttonElement.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
}

// Obtiene los elementos necesarios del DOM
const passwordInput = document.getElementById('exampleInputPassword1');
const togglePassword = document.getElementById('togglePassword');

// Agrega un evento al botón para alternar la visibilidad de la contraseña
togglePassword.addEventListener('click', function () {
  togglePasswordVisibility(passwordInput, togglePassword);
});

// Agrega eventos de mouseover y mouseout al botón para cambiar el estilo cuando se pasa el cursor
togglePassword.addEventListener('mouseover', function () {
  togglePassword.style.backgroundColor = '#543d8f';
  togglePassword.style.color = 'white';
});

togglePassword.addEventListener('mouseout', function () {
  togglePassword.style.backgroundColor = 'transparent';
  togglePassword.style.color = 'black';
});

// Repite el mismo proceso para el campo de confirmación de contraseña
const confirmPasswordInput = document.getElementById('exampleInputPassword2');
const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

toggleConfirmPassword.addEventListener('click', function () {
  togglePasswordVisibility(confirmPasswordInput, toggleConfirmPassword);
});

toggleConfirmPassword.addEventListener('mouseover', function () {
  toggleConfirmPassword.style.backgroundColor = '#543d8f';
  toggleConfirmPassword.style.color = 'white';
});

toggleConfirmPassword.addEventListener('mouseout', function () {
  toggleConfirmPassword.style.backgroundColor = 'transparent';
  toggleConfirmPassword.style.color = 'black';
});



// Obtén el formulario y agrega un evento de envío
const form = document.querySelector('.form-container');

form.addEventListener('submit', function (event) {
  // Detiene el envío del formulario por defecto
  event.preventDefault();

  // Verifica si los campos están completados correctamente
  const nameInput = document.getElementById('name');
  const emailInput = document.getElementById('exampleInputEmail1');
  const passwordInput = document.getElementById('exampleInputPassword1');
  const confirmPasswordInput = document.getElementById('exampleInputPassword2');

  if (nameInput.value && emailInput.value && passwordInput.value && confirmPasswordInput.value === passwordInput.value) {
    // Redirecciona a la página deseada
    window.location.href = 'login.html';
  }
});
