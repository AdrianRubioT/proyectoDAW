
<form action="<?php echo "index.php"; ?>" method="POST">
    <input type="text" name="user"/>
    <input type="password" name="password"/>
    <input type="submit" name="iniciarSesion" value="Iniciar Sesion"/>
</form>
<div calss="error"><?php echo $sesionError ?></div>
       
<a id="enlaceRegistro" href="registro.php">Registrate!</a>