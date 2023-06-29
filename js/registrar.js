function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye-fill");
        icon.classList.add("bi-eye-slash-fill");
    } else {
        input.type = "password";
        icon.classList.remove("bi-eye-slash-fill");
        icon.classList.add("bi-eye-fill");
    }
}

function togglePasswordVisibility(inputId, buttonId) {
    var passwordInput = document.getElementById(inputId);
    var passwordButton = document.getElementById(buttonId);
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      passwordButton.classList.remove("bi-eye-fill");
      passwordButton.classList.add("bi-eye-slash-fill");
    } else {
      passwordInput.type = "password";
      passwordButton.classList.remove("bi-eye-slash-fill");
      passwordButton.classList.add("bi-eye-fill");
    }
  }

  function checkPasswordMatch() {
    var password1 = document.getElementById("exampleInputPassword1").value;
    var password2 = document.getElementById("exampleInputPassword2").value;
    var confirmPasswordHelp = document.getElementById("confirmPasswordHelp");

    if (password1 === password2) {
      confirmPasswordHelp.textContent = "Las contraseñas coinciden.";
    } else {
      confirmPasswordHelp.textContent = "Las contraseñas no coinciden.";
    }
  }