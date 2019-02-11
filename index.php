
<?php require_once("cabecera/imports.php")  ?>

<html>
    <head>
        <?php require_once("cabecera/head.php")  ?>
    </head>
    
    <body>
        
        <!--menu-->
        <?php require_once("vista/menu/menu.php")?>
        
        
        
        <!--listado de juegos-->
        <section id="grid-row">
            <?php require_once("controlador/listarJuegos.php")?>
        </section>
        
        <!--paginacion de las paginas -->
        <section id="paginacion">
            <?php require("controlador/paginacion.php"); ?>
        </section>
        
        
    </body>
    
</html>