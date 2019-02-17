
<form action="<?php echo "index.php"; ?>" method="POST">
    <input class="input" type="text" name="user" placeholder="usuario"/>
    <input class="input" type="password" name="password" placeholder="contraseña" />
    <input class="boton" type="submit" name="iniciarSesion" value="Iniciar Sesion"/>
</form>
<div calss="error"><?php echo $sesionError ?></div>
       
<a id="enlaceRegistro" class="boton" href="registro.php">Registrate!</a>