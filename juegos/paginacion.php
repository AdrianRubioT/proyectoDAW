<?php
    require_once("modelo/DB/consultasMSQL.php");

    // pagina del listado de juegos
    $numJuegos = contartJuegos();
    
    //retroceder pagina
    $pag_aux = $pagina;
    
    $pag_aux--;
    //pagina anterior
    if($pagina > 1 ){
        require("vista/paginacion/enlacesPagina.php");
    }
    
    //pagina actual
    $pag_aux = $pagina;
    // $pag_aux++;
    require("vista/paginacion/estasAqui.php");
    
    
    $pag_aux = $pagina;
    $pag_aux = $pag_aux + 1;
    //pagina siguiente
    if($pagina + 1 < $numJuegos / $numElementos ){
        require("vista/paginacion/enlacesPagina.php");
    }




?>