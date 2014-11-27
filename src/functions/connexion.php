<?php

/** Connexion ***/
function connexion()
{
    $dsn = 'mysql:dbname=project;hoste=localhost';
    $user = 'project';
    $password = '0000';

    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $dbh;
}