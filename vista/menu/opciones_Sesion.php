
<?php echo "Hola ".$usuario->getUser(); ?>

<ul class="desplegable">
    <li>opciones de sesion;
        <ul>
            <li><a id="enlacePerfil" href="perfil.php">perfil</a></li>
            <li><a id="cerrarSesion" href="controlador/user/sesion/logout.php">cerrar Sesion</a></li>
        </ul>
    </li>
</ul>    