<?php

    //  funcion que debuelbe los id de respuesta al comentario padre
    function obtenerIDMenRespuesta($ID_menPadre){
        require("modelo/DB/conexion.php");
        
        $consulta = "select ID_men
        from mensages
        where mensages.ID_respuesta = $ID_menPadre
        ";
        // LIMIT $pagina, $numElementos";

        $result = mysqli_query($conn, $consulta);
    
        if($result != false){
            if(mysqli_num_rows($result) == 1){
                
                $contador = 0;
                $listado = array();
        
                while ($fila = mysqli_fetch_array($result)) {
                    
                    $listado[$contador] = $fila["ID_men"];
                    $contador++;
                    
                }
                return $listado;
                
            }else{
                return null;
            }
        }
    
    
    
    }
    
    // funcion que devuelve el nombre y texto de un comentario
    function obtenerMensage($ID_men){
        
                
        require("modelo/DB/conexion.php");
        
        $consulta = "select nombre, texto
            from usuarios, dejanMensage, mensages 
            where
            mensages.ID_men = dejanMensages.ID_men and
            dejanMensages.correo = usuarios.correo and
            
            mensages.ID_men = '$ID_men'";

        $result = mysqli_query($conn, $consulta);
    
        if($result != false){
            if(mysqli_num_rows($result) == 1){

                $listado = array();
        
                while ($fila = mysqli_fetch_array($result)) {
                    
                    $listado["Nombre"] = $fila["Nombre"];
                    $listado["texto"] = $fila["texto"];
                }
                return $listado;
                
            }else{
                return false;
            }
        }
    }

    // funcion que lista los id de los comentarios de un juego
    function obtenerMensagesPadreJuegos($ID_juego, $pagina, $numElementos ){
        
        require("modelo/DB/conexion.php");
        
        $consulta = "
            select ID_men 
            from dejanMensages
            where dejanMensages.ID_men = $ID_juego
            LIMIT $pagina,$numElementos";
            
        $result = mysqli_query($conn, $consulta);
    
        if($result != false){
            if(mysqli_num_rows($result) == 1){

                $contador = 0;
                $listado = array();
        
                while ($fila = mysqli_fetch_array($result)) {
                    
                    $listado[$contador] = $fila["ID_men"];
                    $contador++;
                }
                return $listado;
                
            }else{
                return false;
            }
        }
        
    }


    function obtenerPuntuacion($ID_juego, $usuario){
        
        require("modelo/DB/conexion.php");
        
        $consulta = "select Puntuacion from puntuaciones where ID_juego='$ID_juego' and Correo='$usuario'";
        $result = mysqli_query($conn, $consulta);
        
        $listado = mysqli_fetch_array($result)["Puntuacion"];
        return $listado;
        
    }

    function actualizarPuntuacion($ID_juego, $puntuacion, $usuario){
        
        require("modelo/DB/conexion.php");
        
        $consulta = "update puntuaciones set Puntuacion=$puntuacion where ID_juego='$ID_juego' and Correo='$usuario'";
        mysqli_query($conn, $consulta);
    }
    
    
    function guardarPuntuacion($ID_juego, $puntuacion, $usuario){
        
        require("modelo/DB/conexion.php");
        
        $consulta = "INSERT INTO puntuaciones (ID_juego, Correo, Puntuacion) VALUES('$ID_juego', '$usuario', '$puntuacion')";
        mysqli_query($conn, $consulta);
        
    }

    function obtenerPuntuaciones($ID_juego, $pagina, $numElementos){
        
        require("modelo/DB/conexion.php");

        // $consulta = "select ID_juego, Nombre, Puntuacion from puntuaciones, usuarios where ID_juegho = '$ID_juego' AND puntuaciones.Correo = usuarios.Correo LIMIT $pagina,$numElementos "; 
        $consulta = "select Nombre, Puntuacion from puntuaciones, usuarios where puntuaciones.correo = usuarios.correo and puntuaciones.ID_juego = $ID_juego LIMIT $pagina,$numElementos ";
        $result = mysqli_query($conn, $consulta);
    
        if($result != false){
            if(mysqli_num_rows($result) == 1){
                
                $contador = 0;
                $listado = array();
        
                while ($fila = mysqli_fetch_array($result)) {
                    
                    $listado[$contador]["Nombre"] = $fila["Nombre"];
                    $listado[$contador]["Puntuacion"] = $fila["Puntuacion"];
                        
                    $contador++;
                    
                }
                return $listado;
                
            }else{
                return false;
            }
        }

    }    


    function insertarUsuario($correo, $nombre, $password){
        require("../../../modelo/DB/conexion.php");
        
        $sha1_pass = sha1($password);
        
        $consulta = "INSERT INTO usuarios (Correo, Nombre, Password) VALUES('$correo', '$nombre', '$sha1_pass')";
        mysqli_query($conn, $consulta);
        
    }


    function obtenerUsuario($nombre, $pass){
        
        require("modelo/DB/conexion.php");
        
        $consulta = "select * from usuarios where Nombre = '$nombre' and Password = '$pass'";
        $result = mysqli_query($conn, $consulta);
    
        if($result != false){
            if(mysqli_num_rows($result) == 1){
                
                $contador = 0;
                $listado = array();
        
                while ($fila = mysqli_fetch_array($result)) {
                    
                    $listado[$contador]["Correo"] = $fila["Correo"];
                    $listado[$contador]["Nombre"] = $fila["Nombre"];
                    $listado[$contador]["Password"] = $fila["Password"];
                        
                    $contador++;
                    
                }
                return $listado;
                
            }else{
                return false;
            }
        }

    }    
    
    
    
    function obtenerListadoJuegos($pagina, $numElementos){
        
        require("modelo/DB/conexion.php");
        
        $pagina = $pagina * $numElementos;
        
        
        // $consulta = "Select * from juegos";
        $consulta = "Select ID_juego, Ruta, Nombre, Ruta_IMG from juegos ORDER BY fecha DESC LIMIT $pagina,$numElementos ";
        $result = mysqli_query($conn, $consulta);
           
        $contador = 0;
        $listado = array();
        
        while ($fila = mysqli_fetch_array($result)) {
            
            $listado[$contador]["ID"] = $fila["ID_juego"];
            $listado[$contador]["Ruta"] = $fila["Ruta"];
            $listado[$contador]["Nombre"] = $fila["Nombre"];
            $listado[$contador]["Ruta_IMG"] = $fila["Ruta_IMG"];
            
            $contador++;
        }
        
        mysqli_close($conn);
        
        return $listado;
    }

    function contartJuegos(){
        
        require("modelo/DB/conexion.php");
        
        $consulta = "Select count(*) from juegos";
        $result = mysqli_query($conn, $consulta);
        
        return mysqli_fetch_array($result)["count(*)"];
        
    }

?>