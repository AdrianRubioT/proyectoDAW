<?php



    // funcion que guardara el comentario
    function guardarComentario($ID_juego, $texto, $respuesta, $correo){
    
        require("modelo/DB/conexion.php");
        
        // insertamos los datos en la tabla
        $consulta = "INSERT INTO mensages (texto, ID_respuesta) VALUES('$texto', $respuesta)";
        mysqli_query($conn, $consulta);
        
        // conocer el id asignado del insert anterior
        // http://cambrico.net/30-04-2008/mysql-como-averiguar-el-ultimo-registro-insertado-en-una-tabla
        $consulta = "select last_insert_id()";
        $result = mysqli_query($conn, $consulta);
        $fila = mysqli_fetch_array($result);
        
        // insertamos la ubicacion del mensaje
        $consulta = "INSERT INTO dejanMensages (ID_men, Correo, ID_juego) VALUES('".$fila["0"]."','$correo', '$ID_juego')";
        mysqli_query($conn, $consulta);
    }


    //  funcion que debuelbe los id de respuesta al comentario padre
    function obtenerIDMenRespuesta($ID_menPadre){
        require("modelo/DB/conexion.php");
        
        $consulta = "select ID_men
        from mensages
        where mensages.ID_respuesta = '$ID_menPadre'
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
                return false;
            }
        }
    
    
    
    }
    
    // funcion que devuelve el nombre y texto de un comentario
    function obtenerMensage($ID_men){
        
                
        require("modelo/DB/conexion.php");
        
        $consulta = "
        select Nombre, Texto, mensages.ID_men , mensages.ID_respuesta
        from usuarios, dejanMensages, mensages 
            where 
            mensages.ID_men = dejanMensages.ID_men and 
            dejanMensages.Correo = usuarios.Correo and 
            mensages.ID_men = '$ID_men'
            ";

        $result = mysqli_query($conn, $consulta);
    
        if($result != false){
            if(mysqli_num_rows($result) == 1){

                $listado = array();
        
                while ($fila = mysqli_fetch_array($result)) {
                    
                    $listado["Nombre"] = $fila["Nombre"];
                    $listado["Texto"] = $fila["Texto"];
                    $listado["ID_men"] = $fila["ID_men"];
                    $listado["ID_respuesta"] = $fila["ID_respuesta"];
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
            select mensages.ID_men 
            from dejanMensages, mensages
            where 
                dejanMensages.ID_juego = $ID_juego and
                dejanMensages.ID_men = mensages.ID_men and
                mensages.ID_respuesta IS NULL
            LIMIT $pagina,$numElementos";
            
        $result = mysqli_query($conn, $consulta);

        $contador = 0;
        $listado = array();

        while ($fila = mysqli_fetch_array($result)) {
            
            $listado[$contador] = $fila["ID_men"];
            $contador++;
        }
        return $listado;
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

        // $consulta = "select ID_juego, Nombre, Puntuacion from puntuaciones, usuarios where ID_juego = '$ID_juego' AND puntuaciones.Correo = usuarios.Correo LIMIT $pagina,$numElementos "; 
        $consulta = "select Nombre, Puntuacion from puntuaciones, usuarios where puntuaciones.correo = usuarios.correo and puntuaciones.ID_juego = $ID_juego ORDER BY puntuaciones.Puntuacion DESC LIMIT $pagina,$numElementos ";
        $result = mysqli_query($conn, $consulta);
    
        if($result != false){

            $contador = 0;
            $listado = array();
    
            while ($fila = mysqli_fetch_array($result)) {
                
                $listado[$contador]["Nombre"] = $fila["Nombre"];
                $listado[$contador]["Puntuacion"] = $fila["Puntuacion"];
                    
                $contador++;
            }
            return $listado;

        }

    }    


    function insertarUsuario($correo, $nombre, $password){
        require("../../../modelo/DB/conexion.php");
        
        $sha1_pass = sha1($password);
        
        $consulta = "INSERT INTO usuarios (Correo, Nombre, Password) VALUES('$correo', '$nombre', '$sha1_pass')";
        mysqli_query($conn, $consulta);
        
    }


    function existeCorreo($correo){
        
        require("modelo/DB/conexion.php");
        
        $consulta = "select * from usuarios where Correo = '$correo'";
        $result = mysqli_query($conn, $consulta);
        
        if(mysqli_num_rows($result) < 0){
            return false;
        }else{
            return true;
        }
        
        
        
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