<?php

session_start();

require('../database/Database.php');
require('../database/models/User.php');

unset($_SESSION['user']);

if (isset($_POST)) {

    $username = $_POST['login'];
    $password = $_POST['password'];

    $user = getUserByLogin($username);

    if (empty($user)) {
        header('Location: /login.php');
        die();
    }

    if ($user['password'] == md5($password)) {

        $_SESSION['user'] = getUserById($user['id']);

        header('Location: /cart.php');
        die();
    }

}

header('Location: /login.php');
