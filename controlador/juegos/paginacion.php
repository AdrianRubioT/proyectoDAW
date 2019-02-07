<?php

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
    
    
    
    //pagina siguiente
    $pag_aux = $pagina;
    $pag_aux = $pag_aux + 1;
    if($pagina < $numJuegos / $numElementos ){
        require("vista/paginacion/enlacesPagina.php");
    }




?>