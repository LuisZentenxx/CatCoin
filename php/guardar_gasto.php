<?php
    // Realizar la conexión a la base de datos (utilizando tu archivo de conexión existente)
    include 'conexion_db.php'; // Asegúrate de proporcionar la ruta correcta al archivo de conexión

    // Obtener los valores del formulario
    $titulo = $_POST['titulo'];
    $valor = $_POST['valor'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $categoria = $_POST['categoria'];

    // Obtener el ID del usuario desde la sesión (asegúrate de tener la sesión iniciada correctamente)
    session_start();
    $usuario = $_SESSION['usuario'];

    // Obtener el ID del usuario desde la base de datos
    $consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
    $row_id = mysqli_fetch_assoc($consulta_usuario_id);
    $usuario_id = $row_id['id_usuario'];

    // Insertar el gasto en la base de datos
    $consulta_insertar_gasto = "INSERT INTO gasto (valor, titulo, descripcion, fecha, id_usuario, id_categoria) VALUES ('$valor', '$titulo', '$descripcion', '$fecha', '$usuario_id', '$categoria')";
    $resultado_insertar_gasto = mysqli_query($conexion, $consulta_insertar_gasto);

    // Verificar si la inserción fue exitosa
    if ($resultado_insertar_gasto) {
        // Redireccionar a la página principal con un mensaje de éxito
        header("Location: ../princi.php?mensaje=success");
        exit();
    } else {
        // Redireccionar a la página principal con un mensaje de error
        header("Location: ../princi.php?mensaje=error");
        exit();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
?>
