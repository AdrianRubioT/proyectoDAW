
<p><?php echo "Hola ".$usuario->getUser(); ?></p>

<ul class="desplegable">
    <li> <p>Opciones de sesion</p>
        <ul>
            <li><a id="enlacePerfil" href="perfil.php">perfil</a></li>
            <li><a id="cerrarSesion" href="controlador/user/sesion/logout.php">cerrar Sesion</a></li>
        </ul>
    </li>
</ul>    