<?php


    require_once("controlador/user/sesion/login.php");
    require_once("controlador/cookies/cookies.php");
    
    //$usuario = "adrian";
    if (usuarioConectado()){
        
        include("vista/menu/opciones_Sesion.php");
    }else{
        
        include("vista/menu/form_Inicio_Sesion.php");
        
    }

    function usuarioConectado(){
        
        if($usuario->getLoged()){
            return true;
        }else{
            return false;
        }
        
    }
    

?>