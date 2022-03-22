<?php

session_start();
require 'app/database/Database.php';

?>

<!doctype html>
<html lang="ru">

<head>
    <?php require('app/snippets/meta-tags.php'); ?>
    <title>Авторизация</title>
</head>

<body>

    <?php require('app/snippets/header.php'); ?>

    <section class="section is--login" id="login">

        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">
                    Авторизация
                </h2>
            </div>


            <div class="section-body">
                <form method="POST" class="form" action="app/actions/login.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="loginInput" class="form__label">
                            Имя пользователя (Логин)
                        </label>
                        <input type="text" name="login" id="loginInput" class="form__input" required>
                    </div>

                    <div class="form-group">
                        <label for="passwordInput" class="form__label">
                            Пароль
                        </label>
                        <input type="password" name="password" id="passwordInput" class="form__input" required>
                    </div>

                    <button type="submit" class="button button--primary form__button">Авторизация</button>
                </form>
            </div>
        </div>

    </section>
    <?php require('app/snippets/notifications.php'); ?>

    <?php require('app/snippets/footer.php'); ?>

</body>

</html>