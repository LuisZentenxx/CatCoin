<?php
    include 'php/graficos_backend.php'
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficos</title>
</head>
<body>
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
                pieHole: 0.4,
                is3D:true
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>
