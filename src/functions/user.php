<?php
require_once '../db/user.php';
require_once '../application/mappers/UserMapper.php';
require_once '../application/services/UserService.php';
require_once '../application/Db.php';

$db = new Db('mysql', 'localhost', 'project', 'project', '0000');
$userMapper = new UserMapper($db); // composition
$userService = new UserService($userMapper);


// traitement d'ajout d'un utilisateur
if (isset($_POST['submit']) && $_POST['submit'] == "register") {

    $user = new User();
    $user->setFirst_name($_POST['first_name']);
    $user->setLast_name($_POST['last_name']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setRole((int)$_POST['role_id']);
    $user->setCell_phone_number($_POST['cell_phone_number']);
    $user->setPhone_number($_POST['phone_number']);
    $user->setCode(123);
//     var_dump($user); exit(0);
    if ($userService->save($user)) {
       var_dump('Utilisaeur créé') ;
    }else  var_dump('Erreur') ;
}

// Récupère la liste des utilisateurs

$users = $userService->readAll();

function getNameRole($nb)
{
    $roles = array(
        '1' => 'Apprenant',
        '2' => 'Formateur',
        '3' => 'Secretaire',
        '4' => 'Administrateur'
    );
    
    foreach ($roles as $key => $role) {
        if ($key == $nb) {
            return $role;
        }
    }
}