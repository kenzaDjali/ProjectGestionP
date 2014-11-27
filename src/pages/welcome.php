<?php
$roles = array(
    '1' => 'Apprenant',
    '2' => 'Formateur',
    '3' => 'Secretaire',
    '4' => 'Administrateur'
);

// TODO: Test quel utilisateur est ? apprenant, secretaire, formateur


if (isset($_SESSION['role_id'])){
    if (key_exists($_SESSION['role_id'], $roles)) {
        $role_id = $_SESSION['role_id'];
        switch ($role_id){
            case '1': require_once '../pages/form_learner.php';
                break;
            case '2':   require_once '../pages/teacher.php';
                break;
            case '3':   require_once '../pages/secretary.php';
                break;
            case '4': require_once '../pages/admin.php';
                break;
        }
        
    }
}

