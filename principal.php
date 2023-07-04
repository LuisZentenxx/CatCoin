<?php 
    include 'php/principal_backend.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titulo e icono de la página -->
    <title>CatCoin</title>
    <link rel="icon" type="image/png" href="img\2d_cat-removebg.png">

    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto:ital,wght@1,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css\style_principal.css">

    <!-- Iconos Font Awesome -->
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


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
            <a href="usuario.php" class="selected">
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
            <a href="#estadistica">
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

    <div class="card-container d-flex justify-content-center">
        <!-- Card Ingreso Presupuesto -->
        <div class="card card2" style="min-width: 250px; max-height:200px;">
            <div class="card-body">
                <div class="col-md-6"></div>
                <h4 class="text-start">Ingresar Presupuesto</h4>

                <!-- Formulario -->
                <form action="php/guardar_presupuesto.php" method="POST" class="text-start" id="form-presupuesto">
                    <div class="mb-3">
                        <input type="number" name="monto" id="monto" class="form-control form-control-lg custom-input"
                            placeholder="$0" required>
                    </div>
                    <input class="btn btn-primary custom-button" type="submit" name="submit"
                        value="Guardar Presupuesto">
                </form>
            </div>
        </div>

        <!-- Card Estado de cuentas -->
        <div class="card card4" style="min-width: 250px; max-height:200px;">
            <div class="card-body">
                <div class="col-md-6"></div>
                <h4 class="text-start">Estado de tus Cuentas 💰</h4>

                <!-- Presupuesto ingresado -->
                <div class="presupuesto">
                    <p class="titulos">Presupuesto</p>
                    <p class="valor">$<?php echo isset($_SESSION['presupuesto']) ? $_SESSION['presupuesto'] : '0'; ?>
                    </p>
                </div>

                <?php
        // Calcular la diferencia entre el presupuesto y el total de gastos
        $diferencia = isset($_SESSION['presupuesto']) ? $_SESSION['presupuesto'] - $sumaTotalGastos : 0;
        ?>

                <!-- Diferencia presupuesto - total gastos -->
                <div class="presupuesto">
                    <p class="titulos">Saldo Restante</p>
                    <?php if (isset($_SESSION['presupuesto'])) : ?>
                    <?php if ($diferencia > ($_SESSION['presupuesto'] * 0.5)) : ?>
                    <p class="valor1" style="color: green;">$<?php echo $diferencia; ?></p>
                    <?php elseif ($diferencia > ($_SESSION['presupuesto'] * 0.3)) : ?>
                    <p class="valor1" style="color: orange;">$<?php echo $diferencia; ?></p>
                    <?php else : ?>
                    <p class="valor1" style="color: red;">$<?php echo $diferencia; ?></p>
                    <?php endif; ?>
                    <?php else : ?>
                    <p class="valor1">$<?php echo $diferencia; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <style>
        .presupuesto {
            margin-bottom: 10px;
        }

        .titulos {
            font-weight: bold;
        }

        .valor {
            font-weight: bold;
            color: green;
        }

        .valor1 {
            font-weight: bold;
        }
        </style>

        <div class="card card4" style="min-width: 250px; max-width: 300px; max-height: 200px;">
            <div class="card-body d-flex flex-column align-items-center">
                <h4 class="text-center mb-4">Alertas 🚨</h4>
                <p id="mensaje" class="text-center" style="word-wrap: break-word;"></p>
            </div>
        </div>


    </div>
    <style>
    #mensaje {
        color: black;
        font-weight: bold;
    }
    </style>

    <!-- Notificación -->
    <script>
    var presupuesto = <?php echo isset($_SESSION['presupuesto']) ? $_SESSION['presupuesto'] : 0; ?>;
    var sumaTotalGastos = <?php echo $sumaTotalGastos; ?>;
    var mensaje = "";
    var imagenSrc = "";

    if (sumaTotalGastos > presupuesto) {
        mensaje = "Se ha superado el presupuesto!";

    } else if (sumaTotalGastos === presupuesto) {
        mensaje = "Malas noticias...Te has quedado sin ahorros!";

    } else if (sumaTotalGastos > 0.5 * presupuesto && sumaTotalGastos < presupuesto) {
        mensaje = "Advertencia! Tus gastos están poniendo en riesgo tu presupuesto.";

    } else if (sumaTotalGastos === 0.5 * presupuesto) {
        mensaje = "Atento! Es hora revisar tus gastos.";

    } else if (sumaTotalGastos > 0.3 * presupuesto && sumaTotalGastos <= 0.5 * presupuesto) {
        mensaje = "Felicitaciones, estás ahorrando: tus gastos están por debajo del 50% de tu presupuesto.";

    } else {
        mensaje = "Tomate un relajo, tus ahorros están mejor que nunca!"
    }

    // Selecciona los elementos donde deseas mostrar el mensaje
    var elementoMensaje = document.getElementById("mensaje");

    // Asigna el mensaje y la imagen a los elementos correspondientes
    elementoMensaje.innerHTML = mensaje;
    </script>



    <!-- Contenedor Card Formulario Gastos y Categoria de Gastos -->
    <div class="card-container">
        <!-- Card Gastos -->
        <div class="card1" style="width: 30rem;">
            <div class="card-body">
                <div class="col-md-6">
                    <h4 class="text-start">Ingresar Gastos 🐜</h4>

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
                                <option value="3">Transporte</option>
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

    <hr class="custom-hr">

    <div id="estadistica">
        <!-- Sección Estadisticas -->
        <div class="title">
            <h1>Estadísticas</h1>
        </div>

        <!-- Card gráficos por categoria -->
        <div class="card">
            <div class="card-body">
                <div id="chart_div"></div>
            </div>
        </div>

        <!--Consejos-->
        <div class="title">
            <h1>CatCoin te aconseja 💡</h1>
        </div>
        <div class="slider-container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
            <!-- Slides -->
            </div>
        </div>
        <div class="swiper-pagination"></div>
        </div>


        <!--Footer-->
        <hr>
        <footer>
            <div class="container-footer">
                <div class="footer-content">
                    <div class="footer-logo">
                    <i class="fa-solid fa-cat"></i>
                    </div>
                    <div class="footer-links">
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Productos</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#">Acerca de nosotros</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </div>
                    <div class="footer-social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>Todos los derechos reservados &copy; 2023</p>
                </div>
            </div>
        </footer>



        <!-- Gráfico Gastos por categoría -->

        <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Categoría');
            data.addColumn('number', 'Valor');

            <?php
        while ($fila = $resultado1->fetch_assoc()) {
            echo "data.addRow(['" . $fila['nombre'] . "', " . $fila['total_gastos'] . "]);";
        }
        ?>

            var options = {
                title: 'Gastos por Categoría',
                titleTextStyle: {
                    fontSize: 20 // Tamaño de fuente del título
                },
                pieHole: 0.4,
                is3D: true,
                backgroundColor: 'transparent',
                chartArea: {
                    left: 50, // Margen izquierdo del área del gráfico
                    top: 50, // Margen superior del área del gráfico
                    width: '80%', // Ancho del área del gráfico
                    height: '80%' // Altura del área del gráfico
                },
                legend: {
                    position: 'right', // Posición de la leyenda (derecha)
                    textStyle: {
                        fontSize: 14, // Tamaño de fuente de la leyenda
                    }
                },
                slices: {
                    0: {
                        color: '#ff6384'
                    }, // Color personalizado para la primera categoría
                    1: {
                        color: '#36a2eb'
                    }, // Color personalizado para la segunda categoría
                    2: {
                        color: '#ffce56'
                    } // Color personalizado para la tercera categoría
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        </script>


        <!-- Gráfico Gastos por categoría -->

        <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Categoría');
            data.addColumn('number', 'Valor');

            <?php
        while ($fila = $resultado2->fetch_assoc()) {
            echo "data.addRow(['" . $fila['nombre'] . "', " . $fila['total_gastos'] . "]);";
        }
        ?>

            var options = {
                title: 'Estadisticas de gastos',
                titleTextStyle: {
                    fontSize: 20 // Tamaño de fuente del título
                },
                backgroundColor: 'transparent',
                chartArea: {
                    left: 50, // Margen izquierdo del área del gráfico
                    top: 50, // Margen superior del área del gráfico
                    width: '80%', // Ancho del área del gráfico
                    height: '80%' // Altura del área del gráfico
                },
                legend: {
                    position: 'right', // Posición de la leyenda (derecha)
                    textStyle: {
                        fontSize: 14, // Tamaño de fuente de la leyenda
                    }
                },
                bars: 'vertical', // Display bars vertically
                hAxis: {
                    title: 'Valor', // X-axis title
                    titleTextStyle: {
                        fontSize: 16 // Tamaño de fuente del título del eje X
                    }
                },
                vAxis: {
                    title: 'Categoría', // Y-axis title
                    titleTextStyle: {
                        fontSize: 16 // Tamaño de fuente del título del eje Y
                    }
                },
                colors: ['#36a2eb'] // Set custom colors for each category
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div_valor'));
            chart.draw(data, options);
        }
        </script>

        
        

        <!-- Script Lógica -->
        <script src="js\principal.js"></script>
        <script src="js\consejos.js"></script>
        

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Popper.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>

        <!-- script de Swiper -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
        </script>

</body>

</html>