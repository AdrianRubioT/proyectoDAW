<html>
    <head>
        <?php require("vista/head.php")?>
        
        <link rel="stylesheet" type="text/css" media="screen" href="styles/tablero.css" />
        <script src="scripts/puntuaciones.js"></script>
        <?php require("controlador/jugar/headJugar.php")?>
        
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
            <?php //require_once("controlador/puntuaciones/puntuaciones.php")?>
        </section>
        
        
        
        
        
    </body>
    
</html>