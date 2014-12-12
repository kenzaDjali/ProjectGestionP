<?php
require_once '../db/user.php';
require_once '../application/mappers/UserMapper.php';
require_once '../application/services/UserService.php';
require_once '../application/Db.php';

// traitement d'ajout d'un utilisateur
if (isset($_POST['submit']) && $_POST['submit'] == "register") {
    if (creat($_POST)) {
        $message = "Utilisaeur créé ";
    }
}

// Récupère la liste des utilisateurs
$db = new Db('mysql', 'localhost', 'project', 'project', '0000');
$userMapper = new UserMapper($db); // composition
$userService = new UserService($userMapper);
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