<?php
    
    require_once("modelo/DB/consultasMSQL.php");
    
    
    $numElementos = 4;
    
    //inicializar variable si no se especifica
    $pagina = 0;
    // 
    if(isset($_GET["pagina"]) ){
        if($_GET["pagina"] > 0 ){
            $pagina= $_GET["pagina"];
        }
    }
    
    
    $listaJuegos = obtenerListadoJuegos($pagina, $numElementos);
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
