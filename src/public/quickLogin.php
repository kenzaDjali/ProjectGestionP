<?php
require_once '../db/user.php';
require_once '../application/mappers/UserMapper.php';
require_once '../application/services/UserService.php';
require_once '../application/Db.php';

$roles = array(
    '1' => 'Apprenant',
    '2' => 'Formateur',
    '3' => 'Secretaire',
    '4' => 'Administrateur'
);


if (!empty($_POST) && isset($_POST['code'])) {
    
    $db=new Db('mysql','localhost','project','project','0000');
    $userMapper=new UserMapper($db);//composition
    $userService = new UserService($userMapper);
    
    $user =$userService->login(null, null, $_POST['code']);
  
    if (!empty($user)) {
        if (key_exists($user[0]['role'], $roles)) {
            session_start();
            $_SESSION['role_id'] = $user[0]['role'];
            echo $page = '/welcome';
            
        }
    }
    
   
}