<?php

    if(isset($_GET["IDjuego"])){
    
        if(file_exists('/paginaWeb/contenido/juego/'. $_GET["IDjuego"])){
        
            $scripJuego = '/paginaWeb/contenido/juego/'. $_GET["IDjuego"]."/scrip.js";
            if (file_exists($scripJuego)) {
                // echo "scrip js encontrado";        
                include("/vista/jugar/headJuegoJS.php");
            }
            
            $stileCss ='/paginaWeb/contenido/juego/'. $_GET["IDjuego"]."/stile.css";
            if (file_exists($stileCss)) {
                include("/vista/jugar/headJuegoCSS.php");
            }
            
        } else {
            echo "juego no encontrado";
        }
            
        
    }

    
?>