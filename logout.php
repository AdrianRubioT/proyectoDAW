
<?php

// https://codigosdeprogramacion.com/2016/12/20/sistema-de-usuarios-y-sesiones-en-php-y-mysql-1-login-sesiones-y-logout/

//Inicia una nueva sesión o reanuda la existente 
    session_start(); 
//Destruye toda la información registrada de una sesión
    session_destroy(); 
	
//Redirecciona a la página de login
    header('location: index.php'); 
?>