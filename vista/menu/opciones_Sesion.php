
<div id="usuario">
    <p class="boton"><?php echo "Hola ".$usuario->getUser(); ?></p>
</div>

<div id="opciones">
    <ul class="desplegable">
        <li> <p class="boton">Opciones de sesion &darr;</p>
            <ul>
                <li><a id="enlacePerfil" class="boton" href="perfil.php">perfil</a></li>
                <li><a id="cerrarSesion" class="boton" href="controlador/user/sesion/logout.php">cerrar Sesion</a></li>
            </ul>
        </li>
    </ul>
</div>