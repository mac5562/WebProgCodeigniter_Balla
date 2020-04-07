<?php 
    echo anchor(base_url('cities/add'), 'Új város'); 
?>


<?php
    if($cities == NULL || empty($cities)):
?>

<p>A városok tábla üres!</p>

<?php 
    else: 
?>

<table style="color:lime; background:#303030">
    <thead>
        <tr>
            <th>ID</th>
            <th>Város</th>
            <th>Irányítószám</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>

        <?php
            foreach ($cities as &$cty): 
        ?>

        <tr>
            <td><?=$cty->id?></td>
            <td><?=$cty->name?></td>
            <td><?=$cty->postal_code?></td>
            <td>
                <?php echo anchor(base_url('cities/edit/'.$cty->id), 'Szerkeszt')?>
                <?php echo anchor(base_url('cities/delete/'.$cty->id), 'Töröl')?>
            </td>            
        </tr>
        <?php
            endforeach; 
        ?>
    </tbody>
</table>

    <?php 
        endif; 
    ?>
