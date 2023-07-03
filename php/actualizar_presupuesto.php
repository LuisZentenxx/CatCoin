<?php
    include 'conexion_db.php';

    // Obtener el ID del usuario desde la sesión
    session_start();
    $usuario = $_SESSION['usuario'];

    // Obtener el ID del usuario desde la base de datos
    $consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
    $row_id = mysqli_fetch_assoc($consulta_usuario_id);
    $usuario_id = $row_id['id_usuario'];
    $monto_anterior = $row_id['monto'];

    // Verificar si el presupuesto anterior existe
    $presupuesto_anterior = !empty($monto_anterior) ? $monto_anterior : '';

    // Determinar el texto del botón y el valor del placeholder
    $boton_texto = !empty($presupuesto_anterior) ? 'Actualizar Presupuesto' : 'Guardar Presupuesto';
    $placeholder_valor = !empty($presupuesto_anterior) ? $presupuesto_anterior : '';

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>
