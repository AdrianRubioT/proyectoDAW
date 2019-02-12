<?php

    
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