

<?php require_once("controlador/user/usuario.php") ?>

<?php require_once("cabecera/cookies/cookies.php");  ?>

<?php require_once("modelo/DB/consultasMSQL.php"); ?>

<?php
    
    // var_dump($_GET);
    guardarComentario($_GET["ID_juego"], $_GET["textoComentario"], "null", $usuario->getCorreo());
    header('location:/proyectoDAW/jugar.php?ID_juego='.$_GET["ID_juego"]);
?>