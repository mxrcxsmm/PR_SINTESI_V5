<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
              VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    //Verificacion de correo : PARA QUE NO SE DUPLIQUEN

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'"); 

    if(mysqli_num_rows($verificar_correo) > 0) {
        echo '
            <script>
            alert("Este correo ya esta en uso")
            window.location = "registro.php"
            </script>
        ';
        exit();
    }

        //Verificacion de usuarios : PARA QUE NO SE DUPLIQUEN

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0) {
        echo '
            <script>
            alert("Este usuario ya esta en uso")
            window.location = "registro.php"
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("usuario almacenado exitosamente");
                window.location = "registro.php";
            </script>
    
        ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo");
            window.location = "registro.php";
        </script>

    ';
}

?>