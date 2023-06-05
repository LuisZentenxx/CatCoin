<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatCoin: Crea una cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto:ital,wght@1,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body>
    <div class="background-container" style="background-image: url(img/background_register.jpg);">
        <h1>REGISTRATE EN CATCOIN</h1>
        <form class="form-container needs-validation" action= "php/registro_backend.php" method="POST">
        
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
                    placeholder="minombre@catcoin.cl" name="correo" required >
            </div>

            <!-- Campo Password -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="passwordHelp"
                        name="contrasenia" required>
                    <button type="button" id="togglePassword" class="btn btn-outline-secondary"><i
                            class="bi bi-eye"></i></button>
                </div>
            </div>


            <!-- Campo Confirmación -->
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirma tu contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="exampleInputPassword2"
                        aria-describedby="passwordHelp" name="contrasenia" required>
                    <button type="button" id="toggleConfirmPassword" class="btn btn-outline-secondary"><i
                            class="bi bi-eye"></i></button>
                </div>
                <div id="confirmPasswordHelp" class="form-text">Confirma tu contraseña ingresada anteriormente.</div>
            </div>

            <!-- Botón Crear Cuenta -->
            <button type="submit" class="btn btn-custom" name="submit" onclick="redirectToAnotherPage()">Crear Cuenta</button>
        </form>
    </div>
    
    <script src="js/registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>


</html>