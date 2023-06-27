<?php
    include 'conexion_db.php'; // Asegúrate de proporcionar la ruta correcta al archivo de conexión

    // Obtener el monto del presupuesto enviado desde el formulario
    $monto = $_POST['monto'];
    
   // Obtener el ID del usuario desde la sesión (asegúrate de tener la sesión iniciada correctamente)
   session_start();
   $usuario = $_SESSION['usuario'];

   // Obtener el ID del usuario desde la base de datos
   $consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
   $row_id = mysqli_fetch_assoc($consulta_usuario_id);
   $usuario_id = $row_id['id_usuario'];
    
    // Insertar el presupuesto en la tabla "presupuesto"
    $query = "INSERT INTO presupuesto (monto, id_usuario) VALUES ('$monto', '$usuario_id')";
    $result = mysqli_query($conexion, $query); // Ajusta 'mysqli_query' y 'conexion' según tu configuración

    // Verificar si la inserción fue exitosa
    if ($result) {
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
