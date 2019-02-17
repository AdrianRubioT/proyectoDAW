

<section id="registro">
        
    <h1>Registrarse en la pagina</h1>
        
    <form id="formRegistro" action="controlador/user/registro/registro.php" method="POST">
        
        <div>
            <label for="regCorreo">Correo electronico</label>
            <input class="input" id="regCorreo" type="text" name="regCorreo" placeholder="Correo electronico"/>
        </div>
        
        <div>
            <label for="regNombre">Nombre</label>
            <input class="input" id="regNombre" type="text" name="regNombre" placeholder="¿Como te llamas?"/>
        </div>
        
        <div>
            <label for="regPass">Password</label>
            <input class="input" id="regPass" type="password" name="regPass" placeholder="No lo pierdas"/>
        </div>
        
        <input class="boton" type="submit" value="Crear cuenta"/>
    </form>
    
</section >