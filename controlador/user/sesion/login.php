<?php

    $inicioSesion = "";
    $sesionError ="";
    
    
        
    if(isset($_POST["iniciarSesion"])){
        
        $sha1_pass = sha1($_POST["password"]);
        $consulta = obtenerUsuario($_POST["user"], $sha1_pass);
        
        //var_dump($consulta);
        
       
        //validar usuario
        if( $consulta["0"]["Nombre"] == $_POST["user"] and $consulta["0"]["Password"] == $sha1_pass ){
            // echo "correcto";
            $usuario = new usuario($consulta["0"]["Correo"], $consulta["0"]["Nombre"], true);
            $_SESSION["usuario"] = serialize($usuario);
        }else{
            $sesionError = "Usuario o contraseña incorrecta";
        }
    }

    
    

?>