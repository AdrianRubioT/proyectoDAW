<?php
    function crearTablaPuntuaciones($array){
    ?>
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
        for ($i=0;$i<count($array);$i++){
        ?>
    <tr>
        <td>
            <?php echo $array[$i]["Nombre"];?>
        </td>
        
        <td>
            <?php echo $array[$i]["Puntuacion"];?>
        </td>
    <tr>
    <?php
        }
        
    ?>
</table>
    
    <?php    
    }
    
?>

    
