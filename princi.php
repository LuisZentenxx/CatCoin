<?php 
    include 'php/principal_backend.php'; 
    //include 'php/actualizar_presupuesto.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatCoin</title>

    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto:ital,wght@1,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css\princi.css">

    <!-- Iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body id="body">

    <!-- Titulo bienvenida -->
    <div class="titulo">
        <h1 class="bienvenida">
            Bienvenid@ <?php echo $nombre_apellido; ?>
        </h1>
    </div>

    <!-- Menu Lateral -->
    <div class="menu__side" id="menu_side">

        <!-- Logo y nombre de la pagina -->
        <div class="name__page">
            <i class="fa-solid fa-cat"></i>
            <h4>CatCoin</h4>
        </div>

        <!-- Opciones menú -->
        <div class="options__menu">

            <!-- Icono abrir menú -->
            <a href="#" class="selected">
                <div class="option">
                    <i class="fa-solid fa-arrow-right" id="btn_open"></i>
                </div>
            </a>

            <!-- Icono y Nombre Usuario -->
            <a href="#">
                <div class="option">
                    <i class="fa-solid fa-user" title="Usuario"></i>
                    <h4><?php echo $nombre_apellido; ?></h4>
                </div>
            </a>

            <!-- Icono Estadisticas -->
            <a href="#">
                <div class="option">
                    <i class="fa-solid fa-chart-simple"></i>
                    <h4>Estadísticas</h4>
                </div>
            </a>

            <!-- Icono Gastos -->
            <a href="#">
                <div class="option">
                    <i class="fa-solid fa-wallet"></i>
                    <h4>Gastos</h4>
                </div>
            </a>

            <!-- Icono y enlace a Nosotros.php -->
            <a href="nosotros.php">
                <div class="option">
                    <i class="fa-solid fa-people-group"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>

            <!-- Icono de Cerrar Sesión -->
            <a href="php/cerrar_sesion.php">
                <div class="option">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <h4>Salir</h4>
                </div>
            </a>

        </div>
    </div>

    <!-- Card Ingreso Presupuesto -->
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <div class="col-md-6"></div>
            <h4 class="text-start">Ingresar Presupuesto</h4>

            <!-- Formulario -->
            <form action="php/guardar_presupuesto.php" method="POST" class="text-start">
                <div class="mb-3">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <input type="number" name="monto" id="monto" class="form-control form-control-lg"
                        value="<?php echo $placeholder_valor; ?>" required placeholder="$0">
                </div>
            </form>

        </div>
    </div>
    </div>

    <!-- Contenedor Card Formulario Gastos y Categoria de Gastos -->
    <div class="card-container">
        <!-- Card Gastos -->
        <div class="card1" style="width: 30rem;">
            <div class="card-body">
                <div class="col-md-6">
                    <h4 class="text-start">Ingresar Gastos</h4>

                    <!-- Formulario Gastos -->
                    <form action="php/guardar_gasto.php" method="POST" id="myForm">

                        <!-- Titulo gasto -->
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required
                                placeholder="Ingresa un titulo">
                        </div>

                        <!-- Valor gasto -->
                        <div class="mb-3">
                            <labelfor="valor" class="form-label">Valor</label>
                                <input type="number" name="valor" id="valor" class="form-control" required
                                    placeholder="$0">
                        </div>

                        <!-- Desc. gasto -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                        </div>

                        <!-- Fecha gasto -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required>
                        </div>

                        <!-- Categoría gasto -->
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select name="categoria" id="categoria" class="form-select">
                                <option value="1">Comida rápida</option>
                                <option value="2">Ropa</option>
                                <option value="3">Uber</option>
                                <option value="4">Suscripciones</option>
                                <option value="5">Otro</option>
                            </select>
                        </div>

                        <!-- Botón Guardar -->
                        <input class="btn btn-primary" type="submit" name="submit" value="Guardar"></input>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card Categorías-->
        <div class="card2" style="width: 40rem;">
            <div class="card-body">
                <div class="col-md-6">
                    <h4 class="text-start">Gastos por categoría</h4>
                    <?php include 'php/gastos_categoria.php'; ?>

                    <!-- Total gastos -->
                    <div class="total-gastos">
                        <p>Total</p>
                        <p>$<?php echo $sumaTotalGastos; ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <hr>
    <!-- Sección Estadisticas -->
    <div>
        <h1>Estadísticas</h1>
        <div class="card3" style="width: 30rem;">
            <div class="card-body">
                <div class="col-md-6">
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graficos Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Categoría', 'Valor'],
            ['Comida Rápida', Math.random() * 100],
            ['Ropa', Math.random() * 100],
            ['Uber', Math.random() * 100],
            ['Suscripciones', Math.random() * 100]
        ]);

        var options = {
            title: 'Gastos por Categoría',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script>

    <!-- Script Lógica -->
    <script src="js\script.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>