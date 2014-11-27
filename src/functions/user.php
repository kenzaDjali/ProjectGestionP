<?php
require_once '../db/user.php';

//traitement d'ajout d'un utilisateur
if (isset($_POST['submit']) && $_POST['submit'] == "register"){
  if(creat($_POST)){
      
      $message = "Utilisaeur créé ";
      
  }
  
}
