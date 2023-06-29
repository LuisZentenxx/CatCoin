<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta etiquetas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/registrar.css">

    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto:ital,wght@1,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Script -->
    <script src="js/registrar.js"></script>
</head>


<body>

    <div class="background-container">
        <h1 class="tituloPrincipal">Bienvenid@ a CatCoin!</h1>
        <h4 class="tituloPrincipal">Tu compañero financiero</h4>

        <form class="form-container needs-validation" action="php/registro_backend.php" method="POST">

            <!-- Campo Nombre y Apellido -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre y Apellido</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp"
                    placeholder="Tu nombre y apellido" name="nombre_apellido" required>


                <div id="nameHelp" class="form-text">Introduce tu nombre completo.</div>
            </div>

            <!-- Campo Email -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="minombre@catcoin.cl" name="correo" required>
            </div>

            <!-- Campo Password -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="exampleInputPassword1"
                        aria-describedby="passwordHelp" name="contrasenia" required>
                    <span class="input-group-text">
                        <i class="bi bi-eye-fill" id="btn-pass"
                            onclick="togglePasswordVisibility('exampleInputPassword1', 'btn-pass')"></i>
                    </span>
                </div>
            </div>

            <!-- Campo Confirmación -->
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirma tu contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="exampleInputPassword2"
                        aria-describedby="passwordHelp" name="confirm_contrasenia" onkeyup="checkPasswordMatch()"
                        required>
                    <span class="input-group-text">
                        <i class="bi bi-eye-fill" id="btn-pass1"
                            onclick="togglePasswordVisibility('exampleInputPassword2', 'btn-pass1')"></i>
                    </span>
                </div>
                <div id="confirmPasswordHelp" class="form-text"></div>
            </div>


            <!-- Botón Crear Cuenta -->
            <button type="submit" class="btn btn-custom" name="submit" onclick="redirectToAnotherPage()">Crear
                Cuenta</button>


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>


</html>