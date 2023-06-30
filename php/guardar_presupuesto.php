<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion_db.php';

// Obtener el ID del usuario desde la sesión (asegúrate de tener la sesión iniciada correctamente)
session_start();
$usuario = $_SESSION['usuario'];

// Obtener el ID del usuario desde la base de datos
$consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
$row_id = mysqli_fetch_assoc($consulta_usuario_id);
$usuario_id = $row_id['id_usuario'];

// Obtener el valor del monto del formulario
$monto = $_POST['monto'];

// Verificar si ya existe un presupuesto para el usuario actual
$consulta_presupuesto = mysqli_query($conexion, "SELECT * FROM presupuesto WHERE id_usuario = $usuario_id");
$existe_presupuesto = mysqli_num_rows($consulta_presupuesto) > 0;

if ($existe_presupuesto) {
    // Si ya existe un presupuesto, realizar la modificación aquí
    $query_modificar = "UPDATE presupuesto SET monto = '$monto' WHERE id_usuario = $usuario_id";

    if (mysqli_query($conexion, $query_modificar)) {
        // Presupuesto modificado exitosamente
        $mensaje = "Presupuesto modificado exitosamente.";
    } else {
        // Error al modificar el presupuesto
        $mensaje = "Error al modificar el presupuesto: " . mysqli_error($conexion);
    }
} else {
    // Si no existe un presupuesto, realizar la inserción aquí
    $query_insert = "INSERT INTO presupuesto (monto, id_usuario) VALUES ('$monto', '$usuario_id')";

    if (mysqli_query($conexion, $query_insert)) {
        // Presupuesto insertado exitosamente
        $mensaje = "Presupuesto insertado exitosamente.";
    } else {
        // Error al insertar el presupuesto
        $mensaje = "Error al insertar el presupuesto: " . mysqli_error($conexion);
    }
}

// Almacenar el valor del presupuesto en la variable de sesión
$_SESSION['presupuesto'] = $monto;

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Redirigir a la página anterior y mostrar el mensaje de éxito utilizando alert
echo "<script>alert('$mensaje'); window.history.go(-1);</script>";
?>
