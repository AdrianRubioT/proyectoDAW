<?php


// si el usuario esta logueado puede dejar comentario
if($usuario->getLoged() ){
    include("vista/comentario/formComentario.php");
}


?>


<div id=comentarios calss="oculto"></div>