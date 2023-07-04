<?php
include 'conexion_db.php';

// Obtener el ID del usuario desde la sesión
session_start();
$usuario = $_SESSION['usuario'];

// Obtener el ID del usuario desde la base de datos
$consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
if (!$consulta_usuario_id) {
    echo "Error en la consulta de obtener el ID del usuario: " . mysqli_error($conexion);
    exit();
}

$row_id = mysqli_fetch_assoc($consulta_usuario_id);
$usuario_id = $row_id['id_usuario'];

// Eliminar los registros relacionados en la tabla 'gasto'
$query = "DELETE FROM gasto WHERE id_usuario = '$usuario_id'";
$ejecutar = mysqli_query($conexion, $query);
if (!$ejecutar) {
    echo "Error al eliminar los registros relacionados en la tabla 'gasto': " . mysqli_error($conexion);
    exit();
}

// Eliminar los registros relacionados en la tabla 'presupuesto'
$query = "DELETE FROM presupuesto WHERE id_usuario = '$usuario_id'";
$ejecutar = mysqli_query($conexion, $query);
if (!$ejecutar) {
    echo "Error al eliminar los registros relacionados en la tabla 'presupuesto': " . mysqli_error($conexion);
    exit();
}

// Eliminar la cuenta del usuario de la base de datos
$query = "DELETE FROM usuario WHERE id_usuario = '$usuario_id'";
$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar) {
    echo "Error al eliminar la cuenta: " . mysqli_error($conexion);
    exit();
}

echo '
    <script>
        alert(\'Cuenta eliminada con éxito 😿\');
        window.location = \'../login.php\';
    </script>
';

// Cerrar la sesión y redirigir al inicio de sesión
session_destroy();
exit();
?>
