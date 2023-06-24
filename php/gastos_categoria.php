<?php
    // Mostrar los gastos por categoría
    foreach ($gastosPorCategoria as $categoria => $gastos) {
        echo "<h3>$categoria</h3>";

        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Título</th>';
        echo '<th>Valor</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($gastos as $gasto) {
            $titulo = $gasto['titulo'];
            $valor = $gasto['valor'];

            echo '<tr>';
            echo "<td>$titulo</td>";
            echo "<td>$valor</td>";
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

    // Mostrar la suma total de los gastos
    echo "<h3>Suma total de gastos: $sumaTotalGastos</h3>";


?>