<?php

    include 'conexion_db.php';

    $nombre_apellido = $_POST['nombre_apellido'];
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    $query = "INSERT INTO usuario(nombre_apellido, correo, contrasenia)
              values ('$nombre_apellido','$correo', '$contrasenia')";

    $ejecutar = mysqli_query($conexion, $query);

?>
