<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/proyecto.css">
  <title>Proyecto CatCoin</title>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 

</head>
<body>
  <div class="container">
     <!--Lottie Animation-->
     <lottie-player 
     src="https://lottie.host/bf24eb69-f0f2-4b20-a683-e2908cd203bb/HQsMeeOpc7.json" 
     background="transparent" 
     speed="1" 
     style="width: 300px; height: 300px;" 
     loop autoplay>
   </lottie-player>
    <h1 class="text-center mb-4">Estamos trabajando en esto :(</h1>
    <div class="counter">
      <div class="counter-item">
        <span id="days">0</span>
        <p>Días</p>
      </div>
      <div class="counter-item">
        <span id="hours">0</span>
        <p>Horas</p>
      </div>
      <div class="counter-item">
        <span id="minutes">0</span>
        <p>Minutos</p>
      </div>
      <div class="counter-item">
        <span id="seconds">0</span>
        <p>Segundos</p>
      </div>
    </div>
    
    <div class="text-center mt-4">
      <a href="login.php" class="btn btn-custom">Ir al Home</a>
    </div>
  </div>

  <script src="js/proyecto.js"></script>
</body>
</html>