<?php
    session_start();
    include 'conexion_db.php';


    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    $contrasenia= hash('sha512', $contrasenia);

    $consulta = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasenia = '$contrasenia'";
    $validar_login = mysqli_query($conexion, $consulta);


    if(mysqli_num_rows($validar_login)>0){
        $_SESSION['usuario'] = $correo;
        header("location: ../princi.php");
        exit;

    }else{
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