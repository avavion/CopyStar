<?php

session_start();

require('../database/Database.php');
require('../database/models/User.php');

unset($_SESSION['user']);

if (isset($_POST)) {
    $user = [];

    foreach ($_POST as $key => $value) {

        if ($key == 'password_repeat') continue;

        if ($key == 'password') {
            $user[$key] = md5($value);
            continue;
        }

        $user[$key] = $value;
    }

    if (empty(getUserByEmail($user['email']))) {
        $uid = createUser($user);

        $_SESSION['user'] = getUserById($uid);

        header('Location: /index.php');
        die();
    }
}

header('Location: /register.php');
