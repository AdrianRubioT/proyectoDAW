
<table>
    <tr>
        <th>
            Jugador
        </th>
        <th>
            Puntos
        </th>
    </tr>

    <?php 
        //obtenemos información puntuación para listado
        
    ?>
    
    <?php
    
        function crearTablaPuntuaciones($array){
            
            foreach ($array as $posicion => $valor){ ?>
                <tr>
                    <td>
                        <?php echo $valor;?>
                    </td>
                    
                    <td>
                        <?php echo $valor;?>
                    </td>
                <tr>
        <?php
            }
        }
    ?>
    
    
</table>