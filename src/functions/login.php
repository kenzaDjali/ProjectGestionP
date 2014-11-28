<?php
require_once '../db/user.php';

$roles = array(
    '1' => 'Apprenant',
    '2' => 'Formateur',
    '3' => 'Secretaire',
    '4' => 'Administrateur'
);

if (isset($_POST['submit']) && ! empty($_POST)) {
    $user = findByEmailPassword($_POST);
    if (! empty($user)) {
        if (key_exists($user[0]['role'], $roles)) {
            session_start();
            $_SESSION['role_id'] = $user[0]['role'];
            $page = '/welcome';
            header('Location:' . $page);
        }
    }
    
   
}