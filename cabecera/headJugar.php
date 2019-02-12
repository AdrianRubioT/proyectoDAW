<?php

    if(isset($_GET["ID_juego"])){
        
        if(file_exists('contenido/'.$_GET["ID_juego"])){
            $scripJuego = 'contenido/'. $_GET["ID_juego"]."/script.js";
            if (file_exists('contenido/'. $_GET["ID_juego"]."/script.js")) {
                // echo "scrip js encontrado";        
                include("cabecera/headJuegoJS.php");
            }
            
            $stileCss ='contenido/'. $_GET["ID_juego"]."/style.css";
            if (file_exists($stileCss)) {
                include("cabecera/headJuegoCSS.php");
            }
            
        } else {
            echo "juego no encontrado";
        }
    }
    
?>