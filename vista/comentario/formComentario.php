
<div class="dejarComentario">
    <h1>Deja tu comentario</h1>
    <form action="guardarComentario.php" method = "GET">
        <input type="hidden" name="ID_juego" value="<?php echo $_GET["ID_juego"]?>">
        <textarea name="textoComentario"> </textarea>
        <input type="submit" value="Comentar"/>
    </form>
</div>