<?php
    $usuario = usuarioVacio();
    
    
    session_start();

    if(isset($_SESSION["usuario"])){
        $usuario = unserialize($_SESSION["usuario"]);
    }


?>