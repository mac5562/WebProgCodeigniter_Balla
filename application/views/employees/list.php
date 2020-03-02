<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($employees == NULL || empty($employees)): ?>
<p>Nincs egy dolgozó sem</p>
<?php else: ?>
<table style="color:lime; background:#303030">
    <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>SSN</th>
            <th>TIN</th>
        </tr>
    </thead>
    <tbody>
        <?php         foreach ($employees as &$emp): ?>
        <tr>
            <td><?=$emp->id?></td>
            <td><?=$emp->name?></td>
            <td><?=$emp->ssn?></td>
            <td><?=$emp->tin?></td>
        </tr>
        <?php         endforeach; ?>
    </tbody>
</table>

<?php endif; ?>
