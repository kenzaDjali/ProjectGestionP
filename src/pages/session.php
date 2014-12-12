<?php
require_once '../functions/user.php';

$endHeader = "<link href='//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css'  rel='stylesheet'>";
$endFooter = "<script>$(document).ready(function(){ $('#myTableUser').DataTable();}); </script>";

 
?>
<div class= "container" style="background-color:#FFF">
   <hr/>
   <h2>Liste utilisateurs</h2>
   <hr/>
    <table id ="myTableUser" class = "display">
     <thead>
        <tr>
            <th>Nom </th>
            <th>Prénom</th>
            <th>N° télephone</th>
            <th>E-mail</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
     <?php foreach($users as $user) {?>
        <tr>
            <td><?= $user->getLast_name()?></td>
            <td><?= $user->getFirst_name()?></td>
            <td><?= $user->getCell_phone_number()?></td>
            <td><?= $user->getEmail()?></td>
            <td><?= getNameRole($user->getRole())?></td>
        </tr>
     <?php }?>
    </tbody>
    </table>
</div>   