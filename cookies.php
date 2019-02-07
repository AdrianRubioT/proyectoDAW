<?php
    require_once("controlador/user/usuario.php");

    session_start();

    if(isset($_SESSION["usuario"])){
        $usuario = unserialize($_SESSION["usuario"]);
    }else{
        $usuario = new usuario();
    }


?>