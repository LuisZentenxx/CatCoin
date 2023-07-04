<?php
    session_start();
    include 'conexion_db.php';

    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    $contrasenia = hash('sha512', $contrasenia);

    $consulta = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasenia = '$contrasenia'";
    $validar_login = mysqli_query($conexion, $consulta);

    if(mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo;

        // Obtener el ID del usuario desde la base de datos
        $consulta_usuario_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo = '$correo'");
        $row_id = mysqli_fetch_assoc($consulta_usuario_id);
        $usuario_id = $row_id['id_usuario'];

        // Obtener el presupuesto del usuario desde la base de datos y almacenarlo en $_SESSION['presupuesto']
        $consulta_presupuesto_usuario = mysqli_query($conexion, "SELECT monto FROM presupuesto WHERE id_usuario = $usuario_id");
        $row_presupuesto_usuario = mysqli_fetch_assoc($consulta_presupuesto_usuario);
        $_SESSION['presupuesto'] = $row_presupuesto_usuario['monto'];

        header("location: ../principal.php");
        exit;
    } else {
        echo '
            <script>
                alert("Usuario no existe, verificar datos introducidos 🐈");
                window.location = "../login.php"
            </script>
        ';
        exit;
    }
    //mysqli_close($conexion);
?>
