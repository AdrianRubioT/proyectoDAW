<?php
require_once("cabecera/imports.php");

    // echo $_GET["IDjuego"];
    // echo $_GET["puntuacion"];
    
    
    // guardarPuntuacion($_GET["IDjuego"], $_GET["puntuacion"] ,$usuario->getCorreo() );
    // actualizarPuntuacion($_GET["IDjuego"], $_GET["puntuacion"] ,$usuario->getCorreo() );
    // echo "tu puntuacion ". obtenerPuntuacion($_GET["IDjuego"] ,$usuario->getCorreo());

    //session_start();
    // comprobamos que a iniciado sesion
    if(isset($_SESSION["usuario"])){
        //requiere la clase de usuario para el unserialize
        $usuario = unserialize($_SESSION["usuario"]);
        //echo $usuario->getUser();
        
        $puntuacionPrevia = obtenerPuntuacion($_GET["IDjuego"] ,$usuario->getCorreo());
        
        
        // comprobamos si exiuste puntuacion anterior
        if(!is_null($puntuacionPrevia) ){
            // comprobamos si la nueva puntuacion es mayor
            if($_GET["puntuacion"] > $puntuacionPrevia){
                actualizarPuntuacion($_GET["IDjuego"], $_GET["puntuacion"] ,$usuario->getCorreo() );
                echo "has superado tu puntuacion";
            }else{
                echo "no has superado tu anterior puntuacion. sigue intentandolo";
            }
        }else{
            guardarPuntuacion($_GET["IDjuego"], $_GET["puntuacion"] ,$usuario->getCorreo() );
            echo "Puntuacion registrada";
        }
        
        
    }else{
        echo "Inicie sesion por favor";
    }
    

?>