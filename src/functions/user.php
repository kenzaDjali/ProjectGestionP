<?php
require_once '../db/user.php';

//traitement d'ajout d'un utilisateur
if (isset($_POST['submit']) && $_POST['submit'] == "register"){
   $result = creat($_POST);
  var_dump($result); exit(0);
}
