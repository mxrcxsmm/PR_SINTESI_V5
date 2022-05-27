<?php

    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'
    and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        session_start();
        $_SESSION['email']=$correo;
        header("location: ../log_home.php");
        exit;
    }else{
        echo '
        <script>
            alert("usuario o contraseña erroneos intentelo de nuevo");
            window.location = "registro.php";
        </script>
        ';
        exit;
    }

?>