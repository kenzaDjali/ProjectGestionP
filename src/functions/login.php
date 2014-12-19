<?php

    require_once '../application/mappers/UserMapper.php';
    require_once '../application/services/UserService.php';
    require_once '../application/Db.php';
    
    if (isset($_POST['submit']) && ! empty($_POST)) {
         
        $db=new Db('mysql','localhost','project','project','0000');
        $userMapper=new UserMapper($db);//composition
        $userService = new UserService($userMapper);
        
        $user = $userService->login($_POST['email'], $_POST['password'], $_POST['code']);
        if (! empty($user)) {
            if (array_key_exists($user[0]['role'], $roles)) {
                session_start();
                $_SESSION['role_id'] = $user[0]['role'];
                $page = '/welcome';
                header('Location: ' . $page);
            }
        }  
    }
