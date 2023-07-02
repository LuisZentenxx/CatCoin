<?php
    include 'php/graficos_backend.php'
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatCoin - Estadisticas</title>

    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto:ital,wght@1,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css\graficos.css">

</head>

<body>
    <!-- Sección Estadisticas -->
    <div class="title">
        <h1>Estadísticas</h1>
    </div>


    <div class="card">
        <div class="card-body">
            <div id="chart_div"></div>
        </div>
    </div>

    <!-- Scripts para cargar Google Charts y dibujar el gráfico -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        while ($fila = $resultado->fetch_assoc()) {
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

</body>

</html>