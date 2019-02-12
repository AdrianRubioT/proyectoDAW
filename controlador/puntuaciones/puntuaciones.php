<?php
// controlador ppara la zona de puntuaciones 
    
    require_once("modelo/DB/consultasMSQL.php");
    require_once("vista/tablaPuntuacion/tablaPuntuacion.php");
    
    $pagina = 0;
    $numElementos = 10;
    
    if(isset($_GET["ID_juego"])){
        $listaPuntuacion = obtenerPuntuaciones($_GET["ID_juego"], $pagina, $numElementos);
        crearTablaPuntuaciones($listaPuntuacion);
    }
    
    
    
?>
