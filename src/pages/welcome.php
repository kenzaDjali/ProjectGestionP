<?php

    if (isset($_SESSION)) {
        if (!isset($_SESSION['role_id'])) {
            header('Location: /form_login');
        }
    }

    // Test quel utilisateur est ? apprenant, secretaire, formateur ou admin
    if (isset($_SESSION['role_id'])) {
        if (array_key_exists($_SESSION['role_id'], $roles)) {
            
            $role_id = $_SESSION['role_id'];
            switch ($role_id) {
                case '1':
                    require_once '../pages/form_learner.php';
                    break;
                case '2':
                    require_once '../pages/teacher.php';
                    break;
                case '3':
                    require_once '../pages/secretary.php';
                    break;
                case '4':
                    require_once '../pages/admin.php';
                    break;
            }
        }
    }
