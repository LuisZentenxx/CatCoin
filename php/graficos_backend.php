<?php
    include 'php/conexion_db.php';

    // Obtener el ID del usuario desde la sesión (asegúrate de tener la sesión iniciada correctamente)
    session_start();
    $usuario = $_SESSION['usuario'];

    // Obtener el ID del usuario desde la base de datos
    $consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
    $row_id = mysqli_fetch_assoc($consulta_usuario_id);
    $usuario_id = $row_id['id_usuario'];

    $consulta = "SELECT categoria.nombre, COUNT(gasto.id_categoria) AS total_gastos
                    FROM categoria
                    LEFT JOIN gasto ON categoria.id_categoria = gasto.id_categoria
                    WHERE gasto.id_usuario = $usuario_id
                    GROUP BY categoria.id_categoria";

    $resultado = $conexion->query($consulta);
?>