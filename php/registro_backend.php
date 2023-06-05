<?php
    include 'conexion_db.php';

    if (isset($_POST['submit'])) {
        $nombre_apellido = $_POST['nombre_apellido'];
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        $contrasenia = hash('sha512',$contrasenia); //encriptación de contrasenia

        $query = "INSERT INTO usuario (nombre_apellido, correo, contrasenia)
                  VALUES ('$nombre_apellido', '$correo', '$contrasenia')";
    
        //verificar que el correo no se repita en la base de datos
        $consulta = "SELECT * FROM usuario where correo = '$correo'";
        $verificar_correo = mysqli_query($conexion, $consulta);

        if(mysqli_num_rows($verificar_correo) >0 ){
            echo '
                <script>
                    alert("Este correo ya esta registrado, intenta con otro diferente 🐱");
                    window.location = "../registro.php";
                </script>
            ';
            exit();
        }


        $ejecutar = mysqli_query($conexion, $query);

        if($ejecutar){
            echo '
                <script>
                    alert("Usuario almacenado exitosamente 😸");
                    window.location = "../login.php"
                </script>
            ';
        }else{
            echo '
                <script>
                    alert("Inténtalo de nuevo, usuario no almacenado 😿");
                    window.location = "../login.php"
                </script>
            ';
        }

    }
    

        /*
        if ($ejecutar) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
        */

        
  
        /*
        echo "Valor de nombre_apellido: " . $nombre_apellido . "<br>";
        echo "Valores de POST: <pre>" . print_r($_POST, true) . "</pre>";
        */

       
?>
