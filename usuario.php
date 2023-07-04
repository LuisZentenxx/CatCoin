<?php
include 'php/conexion_db.php';
session_start();


// Obtener el ID del usuario desde la sesión
$usuario = $_SESSION['usuario'];

// Obtener el ID del usuario desde la base de datos
$consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$usuario'");
$row_id = mysqli_fetch_assoc($consulta_usuario_id);
$usuario_id = $row_id['id_usuario'];

// Obtener los datos del usuario actual
$consultaUsuario = "SELECT * FROM usuario WHERE id_usuario = '$usuario_id'";
$resultadoUsuario = mysqli_query($conexion, $consultaUsuario);

if (mysqli_num_rows($resultadoUsuario) > 0) {
    $usuario = mysqli_fetch_assoc($resultadoUsuario);
}

if (isset($_POST['submit'])) {
    $nombre_apellido = $_POST['nombre_apellido'];
    $correo = $_POST['correo'];

    // Verificar si se desea actualizar la contraseña
    if (!empty($_POST['contrasenia']) && !empty($_POST['confirm_contrasenia'])) {
        $contrasenia = $_POST['contrasenia'];
        $confirm_contrasenia = $_POST['confirm_contrasenia'];

        // Verificar que las contraseñas coincidan
        if ($contrasenia !== $confirm_contrasenia) {
            echo '
                <script>
                    alert("Las contraseñas no coinciden, por favor inténtalo de nuevo 🐱");
                    window.location = "editar_usuario.php";
                </script>
            ';
            exit();
        }

        $contrasenia = hash('sha512', $contrasenia); // Encriptación de contraseña

        // Actualizar la contraseña en la base de datos
        $query = "UPDATE usuario SET contrasenia = '$contrasenia' WHERE id_usuario = '$usuario_id'";
        $ejecutar = mysqli_query($conexion, $query);

        if (!$ejecutar) {
            echo '
                <script>
                    alert("Error al actualizar la contraseña 😿");
                    window.location = "editar_usuario.php";
                </script>
            ';
            exit();
        }
    }

    // Actualizar el nombre y el correo electrónico en la base de datos
    $query = "UPDATE usuario SET nombre_apellido = '$nombre_apellido', correo = '$correo' WHERE id_usuario = '$usuario_id'";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
            <script>
                alert("Usuario actualizado exitosamente 😸");
                window.location = "usuario.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Error al actualizar el usuario 😿");
                window.location = "usuario.php";
            </script>
        ';
    }
}
?>

<!-- HTML para la vista de edición del usuario -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar usuario</title>
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
   
</head>
<body>


    <div class="container">
        <h1 class="mt-5">Editar usuario</h1>
        <div class="mb-3">
            <strong>Nombre y Apellido:</strong> <?php echo $usuario['nombre_apellido']; ?>
        </div>
        <div class="mb-3">
            <strong>Correo electrónico:</strong> <?php echo $usuario['correo']; ?>
        </div>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre_apellido" class="form-label">Nombre y Apellido:</label>
                <input type="text" class="form-control" name="nombre_apellido" value="<?php echo $usuario['nombre_apellido']; ?>">
                <a href="#" class="edit-icon">&#9998;</a>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" name="correo" value="<?php echo $usuario['correo']; ?>">
                <a href="#" class="edit-icon">&#9998;</a>
            </div>

            <div class="mb-3">
                <label for="contrasenia" class="form-label">Nueva contraseña:</label>
                <input type="password" class="form-control" name="contrasenia">
            </div>

            <div class="mb-3">
                <label for="confirm_contrasenia" class="form-label">Confirmar contraseña:</label>
                <input type="password" class="form-control" name="confirm_contrasenia">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="php/eliminar_cuenta.php" class="btn btn-danger">Eliminar cuenta</a>

        </form>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
