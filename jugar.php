<?php require("cabecera/imports.php")  ?>

<html>
    <head>
        <?php require("cabecera/head.php")  ?>

        <!--<script type="module" src="cabecera/scripts/puntuaciones.js"></script>-->
        <!--<script type="module" src="cabecera/scripts/s.js"></script>-->
        
        <script type="module" src="cabecera/scripts/comentarios.js"></script>
        
        
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
        

        <section id="inputComentarios">
            <?php require_once("controlador/comentarios/inputComentarios.php")?>
        </section>
        
        
    </body>
    
</html>