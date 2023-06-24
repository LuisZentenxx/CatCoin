<?php 
    include 'php/principal_backend.php'; 
    include 'php/actualizar_presupuesto.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>CatCoin</title>
</head>
<body>

    <section class="container">
        <h1 class="mt-3">Bienvenid@ <?php echo $nombre_apellido; ?></h1>

        <a href="php/cerrar_sesion.php" class="btn btn-primary mt-3">CERRAR SESION</a>
        </section>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>Ingresar Presupuesto</h2>
                    <form action="php/guardar_presupuesto.php" method="POST">
                        <div class="mb-3">
                            <label for="monto" class="form-label">Monto:</label>
                            <input type="number" name="monto" id="monto" class="form-control" value="<?php echo $placeholder_valor; ?>" required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" name="submit" value="<?php echo $boton_texto; ?>" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Ingresar Gastos</h1>
            <form action="php/guardar_gasto.php" method="POST" id="myForm">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor:</label>
                    <input type="number" name="valor" id="valor" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría:</label>
                    <select name="categoria" id="categoria" class="form-select">
                        <option value="1">Comida rápida</option>
                        <option value="2">Ropa</option>
                        <option value="3">Uber</option>
                        <option value="4">Suscripciones</option>
                        <option value="5">Otro</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Guardar Gasto" class="btn btn-primary">
            </form>
        </div>
        <div class="col-md-6">
        <h2>Gastos por categoría:</h2>
        <?php include 'php/gastos_categoria.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!--<script src="js/gastoGuardado.js"></script>-->
  
</body>
</html>
