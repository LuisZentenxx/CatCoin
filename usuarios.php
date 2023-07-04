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

    // Actualizar el nombre en la base de datos
    $query = "UPDATE usuario SET nombre_apellido = '$nombre_apellido' WHERE id_usuario = '$usuario_id'";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
            <script>
                alert("Usuario actualizado exitosamente 😸");
                window.location = "principal.php";
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

    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&family=Roboto:ital,wght@1,300&family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css\editar_usuario.css">

    <script src="js\editar_usuario.js"></script>

</head>

<body>
    <div class="container">
        <div class="card card2" style="min-width: 250px; max-height:200px;">
            <div class="card-body">
                <div class="col-md-6"></div>
                <div class="mb-3">
                <h2>Editar usuario</h2>
                    <strong>Nombre y Apellido:</strong> <?php echo $usuario['nombre_apellido']; ?>
                </div>
                <div class="mb-3">
                    <strong>Correo electrónico:</strong> <?php echo $usuario['correo']; ?>
                </div>
            </div>
        </div>

        <div class="card card2">
            <div class="card-body">
                <div class="col-md-6"></div>
                <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre_apellido" class="form-label">Nombre y Apellido:</label>
                <input type="text" class="form-control" name="nombre_apellido"
                    value="<?php echo $usuario['nombre_apellido']; ?>">
                <a href="#" class="edit-icon">&#9998;</a>
            </div>

            <!-- Campo Contraseña -->
            <div class="mb-3">
                <div class="input-group">
                    <input type="password" class="form-control" id="form2Example22" aria-describedby="passwordHelp"
                        name="contrasenia" required>

                    <!-- Icono contraseña visible -->
                    <span class="input-group-text">
                        <i class="bi bi-eye-fill" id="btn-pass"
                            onclick="togglePasswordVisibility('form2Example22', 'btn-pass')"></i>
                    </span>
                </div>
                <label for="formExample22" class="form-label">Contraseña</label>
            </div>


            <!-- Campo Confirmación Contraseña -->
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirma tu contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="exampleInputPassword2"
                        aria-describedby="passwordHelp" name="confirm_contrasenia" onkeyup="checkPasswordMatch()"
                        required>

                    <!-- Icono contraseña visible -->
                    <span class="input-group-text">
                        <i class="bi bi-eye-fill" id="btn-pass1"
                            onclick="togglePasswordVisibility('exampleInputPassword2', 'btn-pass1')"></i>
                    </span>
                </div>
                <div id="confirmPasswordHelp" class="form-text"></div>
            </div>

            <button type="submit" name="submit" class="btn btn-custom">Guardar cambios</button>
            <a href="php/eliminar_cuenta.php" class="btn btn-danger">Eliminar cuenta</a>
        </form>
            </div>
        </div>
        
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>