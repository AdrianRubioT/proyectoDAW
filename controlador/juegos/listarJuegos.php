<?php

    $numElementos = 8;
    
    //inicializar variable si no se especifica
    $pagina = 1;
    // 
    if(isset($_GET["pagina"]) ){
        if($_GET["pagina"] > 1 ){
            $pagina= $_GET["pagina"];
        }
    }
    
    
    $listaJuegos = obtenerListadoJuegos($pagina - 1, $numElementos);
  ?>    
    <div id="grid-row">
         <?php    
            //sacar las variables para la vista
            foreach ($listaJuegos as $key => $value){
                $ID_juego = $value["ID"];
                $rutaJuego = $value["Ruta"];
                $imgJuego = $value["Ruta_IMG"];
                $nombreJuego = $value["Nombre"];
                $categoria = "";
                $fav = "";
          
                
                include("vista/juegos/juego.php");
            }
        
    ?>
    </div>
