<?php
require_once '../functions/connexion.php';

/**
 * 
 * @param unknown $data
 * @return string
 */
function creat($data)
{
    $result = true;
    $connect = connexion();

    $sql = 'INSERT INTO `project`.`users` (`id`, `last_name`, `first_name`, `email`, `password`,`role`, `cell_phone_number`,`phone_number`)
			VALUES (NULL, :last_name, :first_name, :password, :email, :role_id, :cell_phone_number, :phone_number);';
    $sth = $connect->prepare($sql);
    $sth->execute(array(
        'last_name' => $data['last_name'],
        'first_name' => $data['first_name'],
        'password' => $data['password'],
        'email' => $data['email'],
        'role_id' => $data['role_id'],
        'cell_phone_number' => $data['cell_phone_number'],
        'phone_number' => $data['phone_number']
    ));
    if ($sth->errorCode() != '00000' && $sth->errorCode() !== NULL) {
        echo $sth->errorInfo()[2];
        $result = false;
    }

    return $connect->lastInsertId();
}


/**
 *
 * @return multitype:
 */

function readAll()
{
    $connect = connexion();
    $sql = "SELECT * FROM users";
    $sth = $connect->prepare($sql);
    $sth->execute();
    $users = $sth->fetchAll(PDO::FETCH_ASSOC); // Retrieves a string array

    return $users;
}


/**
 *
 * @param unknown $id
 * @return multitype:
 */
function findById($id)
{
    $connect = connexion();
    $sql = "SELECT * FROM users WHERE `users`.`id` =$id;";
    $sth = $connect->prepare($sql);
    $sth->execute();
    if ($sth->rowCount() > 1) {
        // ERREUR FATALE
    }
    $user = $sth->fetchAll(PDO::FETCH_ASSOC); // Retrieves a string array
    return $user;
}

/**
 *
 * @param unknown $id
 * @return boolean
 */
function delete($id)
{
    $result = true;
    $connect = connexion();
    $sql = "DELETE FROM  `users` WHERE  `users`.`id` =$id;";
    $sth = $connect->prepare($sql);
    $sth->execute();
    if ($sth->errorCode() != '00000' && $sth->errorCode() !== NULL) {
        echo $sth->errorInfo()[2];
        $result = false;
    }

    return $result;
}

/**
 *
 * @param unknown $data
 * @return boolean
 */
function update($data)
{

    $result = true;
    $connect = connexion();
    $sql = "UPDATE  `mini_projet`.`address` SET  `address` =  :address ,`title` =  :title, `description`=:description,
         `url` = :link WHERE `address`.`id`= :id ;";
    $sth = $connect->prepare($sql);
    $sth->execute(array(
        'id'=>$data['id'],
        'address' => $data['address'],
        'title' => $data['title'],
        'description' => $data['description'],
        'link' => $data['link']
    ));
    if ($sth->errorCode() != '00000' && $sth->errorCode() !== NULL) {
        echo $sth->errorInfo()[2];
        $result = false;
    }

    return $result;
}