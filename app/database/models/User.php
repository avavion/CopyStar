<?php

function createUser($user)
{
    global $database;

    $state = $database->prepare("INSERT INTO `users` (`name`, `surname`, `patronymic`, `login`, `email`, `password`) VALUES (:name, :surname, :patronymic, :login, :email, :password)");
    $state->execute($user);

    return $database->lastInsertId();
}

function getUserById($id)
{
    global $database;

    $data = $database->query("SELECT * FROM `users` WHERE `id` = {$id}")->fetch(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function getUserByEmail($email)
{
    global $database;

    $data = $database->query("SELECT * FROM `users` WHERE `email` = \"{$email}\"")->fetch(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function getUserByLogin($login)
{
    global $database;

    $data = $database->query("SELECT * FROM `users` WHERE `login` = \"{$login}\"")->fetch(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}
