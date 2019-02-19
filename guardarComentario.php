

<?php require_once("controlador/user/usuario.php") ?>

<?php require_once("cabecera/cookies/cookies.php");  ?>

<?php require_once("modelo/DB/consultasMSQL.php"); ?>

<?php
    
    // var_dump($_GET);
    
    // si ID padre no se da se pone a string null para la base de datos
    if(!isset($_GET["ID_padre"])){
        $_GET["ID_padre"] = "null";
    }
    
    guardarComentario($_GET["ID_juego"], $_GET["textoComentario"], $_GET["ID_padre"], $usuario->getCorreo());
    header('location:/proyectoDAW/jugar.php?ID_juego='.$_GET["ID_juego"]);
?>