<?php

    if ($usuario->getLoged()){
        
        include("vista/menu/opciones_Sesion.php");
    }else{
        
        include("vista/menu/form_Inicio_Sesion.php");
    }

?>