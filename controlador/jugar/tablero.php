<?php

    
    if(isset($_GET["ID_juego"])){
    
        if(file_exists('contenido/'. $_GET["ID_juego"] ."/index.html")){
            
            echo "juego encontrado";
            include('contenido/'. $_GET["ID_juego"] ."/index.html");
            
        } else {
            echo "juego no encontrado";
        }
            
        
    }

?>