<?php require_once("controlador/user/usuario.php") ?>

<?php require_once("cabecera/cookies/cookies.php");  ?>

<?php require_once("modelo/DB/consultasMSQL.php"); ?>

<?php

// fiehcaro para crear el xml con los comentarios


header ("Content-Type: application/xml");

        $pagina = 0;
        $numElementos = 5;

    $idMensages = obtenerMensagesPadreJuegos($_GET["page"]);
    
    echo "<comentarios>";
    
    foreach($idMensages as $key => $value){
        imprimirComentario($value, $pagina, $numElementos);
    }
    
    echo "</comentarios>";
    
    function imprimirComentario($ID_men){
        echo "<comentario>";
        // $pagina = 0;
        // $numElementos = 5;
        
        $respuestas = obtenerIDMenRespuesta($ID_men);
        $comentario = obtenerMensage($ID_men);
            echo "<nombre>";
            echo $comentario["nombre"];
            echo "</nombre>";
            echo "<texto>";
            echo $comentario["texto"];
            echo "</texto>";
        
        if(!is_null($respuestas)){
            
            foreach($respuestas as $key => $value){
                
                imprimirComentario($value);
                
            }    
        }
        
        echo "</comentario>";
    }
    
?>