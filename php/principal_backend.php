<?php

session_start();

    if (!isset($_SESSION['usuario'])) {
        echo '
            <script>
                alert("Por favor debes iniciar sesión");
                window.location="login.php";
            </script>
        ';
        session_destroy();
        die();
    }

    // Realizar la conexión a la base de datos (utilizando tu archivo de conexión existente)
    include 'php/conexion_db.php'; // Incluir el archivo de conexión

    // Obtener el ID del usuario desde la variable de sesión
    $usuario = $_SESSION['usuario'];

    // Obtener el nombre y apellido del usuario desde la base de datos
    $consulta_usuario = mysqli_query($conexion, "SELECT nombre_apellido FROM usuario WHERE correo = '$usuario'");
    $row = mysqli_fetch_assoc($consulta_usuario);
    $nombre_apellido = $row['nombre_apellido'];

    // Obtener el ID del usuario desde la base de datos
    $consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
    $row_id = mysqli_fetch_assoc($consulta_usuario_id);
    $usuario_id = $row_id['id_usuario'];

    // Realizar una consulta para obtener los gastos del usuario, agrupados por categoría
    $consulta_gastos = mysqli_query($conexion, "SELECT categoria.nombre, gasto.titulo, gasto.valor FROM gasto INNER JOIN categoria ON gasto.id_categoria = categoria.id_categoria WHERE gasto.id_usuario = '$usuario_id'");

    // Inicializar un array para almacenar los gastos por categoría
    $gastosPorCategoria = array();

    // Calcular la suma total de los gastos
    $sumaTotalGastos = 0;

    // Recorrer los gastos y almacenarlos en el array por categoría
    while ($row = mysqli_fetch_assoc($consulta_gastos)) {
        $categoria = $row['nombre'];
        $titulo = $row['titulo'];
        $valor = $row['valor'];

        // Si la categoría aún no está en el array, se agrega como un nuevo elemento
        if (!isset($gastosPorCategoria[$categoria])) {
            $gastosPorCategoria[$categoria] = array();
        }

        // Agregar el gasto al array de la categoría correspondiente
        $gastosPorCategoria[$categoria][] = array('titulo' => $titulo, 'valor' => $valor);

        // Sumar el valor del gasto al total
        $sumaTotalGastos += $valor;
    }

    // Seccion de Estadisticas
    
    $consulta1 = "SELECT categoria.nombre, COUNT(gasto.id_categoria) AS total_gastos
                    FROM categoria
                    LEFT JOIN gasto ON categoria.id_categoria = gasto.id_categoria
                    WHERE gasto.id_usuario = $usuario_id
                    GROUP BY categoria.id_categoria";

    $resultado1 = $conexion->query($consulta1);

    $consulta2 = "SELECT categoria.nombre, SUM(gasto.valor) AS total_gastos
    FROM categoria
    LEFT JOIN gasto ON categoria.id_categoria = gasto.id_categoria
    WHERE gasto.id_usuario = $usuario_id
    GROUP BY categoria.id_categoria";

$resultado2 = $conexion->query($consulta2);

$consulta3 = "SELECT categoria.nombre, SUM(gasto.valor) AS total_gastos
FROM categoria
LEFT JOIN gasto ON categoria.id_categoria = gasto.id_categoria
WHERE gasto.id_usuario = $usuario_id
GROUP BY categoria.id_categoria";

$resultado3 = $conexion->query($consulta3);


    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

?>