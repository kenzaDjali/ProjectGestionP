<?php
require_once '../db/user.php';



if (isset($_POST['submit']) && !empty($_POST)) {
    $user = findByEmailPassword($_POST);
    if(!empty($user)){
       
    }
    
    // si admin

    $page ='/welcome';
    header('Location:'.$page);
}