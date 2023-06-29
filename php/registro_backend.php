<?php
    include 'conexion_db.php';

    if (isset($_POST['submit'])) {
        $nombre_apellido = $_POST['nombre_apellido'];
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        $confirm_contrasenia = $_POST['confirm_contrasenia'];
        
        // Verificar que las contraseñas coincidan
        if ($contrasenia !== $confirm_contrasenia) {
            echo '
                <script>
                    alert("Las contraseñas no coinciden, por favor inténtalo de nuevo 🐱");
                    window.location = "../registrar.php";
                </script>
            ';
            exit();
        }
        
        $contrasenia = hash('sha512', $contrasenia); // Encriptación de contraseña

        $query = "INSERT INTO usuario (nombre_apellido, correo, contrasenia)
                  VALUES ('$nombre_apellido', '$correo', '$contrasenia')";
    
        // Verificar que el correo no se repita en la base de datos
        $consulta = "SELECT * FROM usuario WHERE correo = '$correo'";
        $verificar_correo = mysqli_query($conexion, $consulta);

        if(mysqli_num_rows($verificar_correo) > 0 ){
            echo '
                <script>
                    alert("Este correo ya está registrado, intenta con otro diferente 🐱");
                    window.location = "../registrar.php";
                </script>
            ';
            exit();
        }

        $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            echo '
                <script>
                    alert("Usuario almacenado exitosamente 😸");
                    window.location = "../login.php";
                </script>
            ';
        }else{
            echo '
                <script>
                    alert("Inténtalo de nuevo, usuario no almacenado 😿");
                    window.location = "../login.php";
                </script>
            ';
        }
    }
?>