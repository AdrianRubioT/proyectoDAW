<?php require_once("cabecera/imports.php")  ?>

<html>
    <head>
        <?php require("cabecera/head.php")  ?>
        
        <link rel="stylesheet" type="text/css" media="screen" href="cabecera/styles/tablero.css" />
        <!--<script type="module" src="cabecera/scripts/puntuaciones.js"></script>-->
        <!--<script type="module" src="cabecera/scripts/s.js"></script>-->
        <?php require("cabecera/headJugar.php")?>
        
    </head>
    
    <body>
        
        <!--menu-->
        <?php require("vista/menu/menu.php")?>
        
        
        <!--zona de juego-->
        <section id="tablero">
            <?php require("controlador/jugar/tablero.php")?>
        </section>
        
        
        <!--puntuaciones-->
        <section id="puntuaciones">
            <?php require_once("controlador/puntuaciones/puntuaciones.php")?>
        </section>
        

        
        
        
    </body>
    
</html>