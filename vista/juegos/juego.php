
<div class="juego">
    
    <a href="jugar.php?ID_juego=<?php echo $ID_juego ?>">
    
        <div class="iconoJuego">
            <img src="contenido/<?php echo $ID_juego ."/". $imgJuego ?>">
            <!--<img src="https://source.unsplash.com/random/400x400/"/>-->
        </div>
        
        <div class="nombreJuego">
            <p><?php echo $nombreJuego ?></p>
        </div>
        
        <div class="categoria">
            <p><?php echo $categoria ?></p>
        </div>
        
        <div class="fav">
            <p><?php echo $fav ?></p>
        </div>
        
    </a>
    
</div>