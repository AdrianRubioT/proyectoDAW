
<?php require_once("controlador/cookies/cookies.php")  ?>

<html>
    <head>
        <?php require_once("vista/head.php")  ?>
    </head>
    
    <body>
        
        <!--menu-->
        <?php require_once("vista/menu/menu.php")?>
        
        <!--listado de juegos-->
        <?php require_once("controlador/juegos/listarJuegos.php")?>
        
        <!--paginacion de las paginas -->
        <?php require("controlador/juegos/paginacion.php"); ?>
        
        
        
    </body>
    
</html>