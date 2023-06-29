<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header("Location: princi.php");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CatCoin: Inicia Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto:ital,wght@1,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
  
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="img/2d_cat-removebg.png" style="width: 185px; height: 100px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Bienvenidos a CatCoin</h4>
                  </div>

                  <form class="login-form" action="php/login_backend.php" method="POST">
                    <p>Inicia sesión con tu cuenta</p>

                    <!-- Campo Email -->
                    <div class="form-outline mb-4 needs-validation">
                      <input type="email" id="form2Example11" class="form-control" placeholder="Tu correo electrónico" name="correo"
                        required />
                      <label class="form-label" for="form2Example11">Username</label>
                    </div>


                    <!-- Campo Contraseña -->
                    <div class="form-outline mb-4 needs-validation">
                      <input type="password" id="form2Example22" class="form-control" name="contrasenia" required />
                      <label class="form-label" for="form2Example22">Contraseña</label>
                    </div>

                    <!-- Boton Ingreso -->
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-custom" type="submit" name="submit">Ingresa</button>
                    </div>

                    <!-- Campo Crear Cuenta -->
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">¿Aún no te registras?</p>
                      <button type="submit" class="btn btn-custom1">Hazlo ya!</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Contenedor texto -->
              <div class="col-lg-6 d-flex align-items-center animated-block" style="background-image: url('img/background_register.jpg')">

                <div class="text-white px-3 py-4 p-md-5 mx-md-4 animated-text">
                  
                  <h4 class="mb-4">TU COMPAÑERO FINANCIERO</h4>
                  <p class="large mb-0">¡Bienvenidos a CatCoin, tu sitio web de gestión de gastos personales! Entendemos que mantener un control efectivo de tus finanzas es esencial para alcanzar tus metas y vivir una vida financiera saludable. 
                    Nuestro intuitivo sistema de gestión de gastos te brinda las herramientas necesarias para organizar y monitorear tus ingresos, gastos y presupuesto de manera sencilla y eficiente. Ya sea que estés ahorrando para un viaje, planificando tu futuro o simplemente buscando controlar tus finanzas diarias, CatCoin está aquí para ayudarte en cada paso del camino. ¡Únete a nuestra comunidad y comienza a tomar el control de tus finanzas hoy mismo con CatCoin!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="js/login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
</html>