<?php
    include 'conexion_db.php';

    if (isset($_POST['submit'])) {
        $nombre_apellido = $_POST['nombre_apellido'];
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];

        $query = "INSERT INTO usuario (nombre_apellido, correo, contrasenia)
                  VALUES ('$nombre_apellido', '$correo', '$contrasenia')";

        $ejecutar = mysqli_query($conexion, $query);

        /*
        if ($ejecutar) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
        */

        mysqli_close($conexion);
    } else {
        echo "No se ha enviado el formulario";
    }
    /*
    echo "Valor de nombre_apellido: " . $nombre_apellido . "<br>";
    echo "Valores de POST: <pre>" . print_r($_POST, true) . "</pre>";
    */
?>
