<?php

    require("../controlador/user/usuario.php");
    require_once("../modelo/DB/consultasMSQL.php");
    
    // echo "php: recivido";
    // echo $_GET["IDjuego"];
    // echo $_GET["puntuacion"];
    // var_dump($_GET);

    session_start();
    if(isset($_SESSION["usuario"])){
        //requiere la clase de usuario para el unserialize
        $usuario = unserialize($_SESSION["usuario"]);
        //echo $usuario->getUser();
        
        guardarPuntuacion($_GET["IDjuego"], $_GET["puntuacion"] ,$usuario->getCorreo() );
        
        
    }

    
    // echo "terminado";

?>