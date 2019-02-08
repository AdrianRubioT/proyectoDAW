<?php

    require("../controlador/user/usuario.php");

    echo $_GET["IDjuego"];

    echo $_GET["puntuacion"];
    
    //var_dump($_GET);
    
    
    session_start();

    if(isset($_SESSION["usuario"])){
        //echo "hay variable de sesion usuario";
        $usuario = unserialize($_SESSION["usuario"]);
        echo $usuario->getUser();
    }

    


?>