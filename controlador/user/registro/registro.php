<?php

    require("../../../modelo/DB/consultasMSQL.php");

    insertarUsuario($_POST["regCorreo"], $_POST["regNombre"], $_POST["regPass"]);

    header('location: ../../../registro.php');

?>