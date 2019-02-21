<?php require_once("controlador/user/usuario.php") ?>
<?php require_once("cabecera/cookies/cookies.php");  ?>
<?php require_once("modelo/DB/consultasMSQL.php"); ?>
<?php

// archivo para crear el xml con los comentarios

header ("Content-Type: application/xml");

        $pagina = 0;
        $numElementos = 5;
    
    $idMensages = obtenerMensagesPadreJuegos($_GET["ID_juego"], $pagina, $numElementos);
    // var_dump($idMensages);
    echo "<comentarios>";
    
    // debugArray($idMensages);
    
    foreach($idMensages as $key => $value){
        // debugArray($idMensages);
        imprimirComentario($value);
    }
    
    echo "</comentarios>";
    
function imprimirComentario($ID_men){
    
    echo "<comentario>";

    $respuestas = obtenerIDMenRespuesta($ID_men);
    //($respuestas);
    $comentario = obtenerMensage($ID_men);
    //debugArray($comentario);
        echo "<id>";
        echo $comentario["ID_men"];
        echo "</id>";
        echo "<nombre>";
        echo $comentario["Nombre"];
        echo "</nombre>";
        echo "<texto>";
        echo $comentario["Texto"];
        echo "</texto>";

    if($respuestas != false){
        foreach($respuestas as $key => $value){
            imprimirComentario($value);
        }
    }
    
    echo "</comentario>";
}
    
    function debugArray($myarray){
        if($myarray != false){
        
        foreach($myarray as $num => $value){
    	echo " -b ". $num." TIENE ". $value." d- ";
        }
        echo "------------";
        }else{
            echo "VALOR FALSO";
        }
    }
    
?>