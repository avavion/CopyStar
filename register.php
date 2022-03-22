<?php

session_start();
require 'app/database/Database.php';

?>

<!doctype html>
<html lang="ru">

<head>
    <?php require('app/snippets/meta-tags.php'); ?>

    <title>Регистрация</title>
</head>

<body>

    <?php require('app/snippets/header.php'); ?>

    <section class="section is--register" id="register">

        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">
                    Регистрация
                </h2>
            </div>

            <div class="section-body">
                <form method="POST" class="form" action="app/actions/register.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usernameInput" class="form__label">
                            Имя
                        </label>
                        <input type="text" name="name" id="usernameInput" class="form__input" required>
                    </div>

                    <div class="form-group">
                        <label for="surnameInput" class="form__label">
                            Фамилия
                        </label>
                        <input type="text" name="surname" id="surnameInput" class="form__input" required>
                    </div>

                    <div class="form-group">
                        <label for="patronymicInput" class="form__label">
                            Patronymic
                        </label>
                        <input type="text" name="patronymic" id="patronymicInput" class="form__input">
                    </div>

                    <div class="form-group">
                        <label for="loginInput" class="form__label">
                            Имя пользователя (Логин)
                        </label>
                        <input type="text" name="login" id="loginInput" class="form__input" required>
                    </div>

                    <div class="form-group">
                        <label for="emailInput" class="form__label">
                            Электронная почта
                        </label>
                        <input type="text" name="email" id="emailInput" class="form__input" required>
                    </div>

                    <div class="form-group">
                        <label for="passwordInput" class="form__label">
                            Пароль
                        </label>
                        <input type="password" name="password" id="passwordInput" class="form__input" required>
                    </div>


                    <div class="form-group">
                        <label for="passwordRepeatInput" class="form__label">
                            Повторите пароль
                        </label>
                        <input type="password" name="password_repeat" id="passwordRepeatInput" class="form__input" required>
                    </div>

                    <div class="form-checkbox">
                        <label for="checkboxInput">Согласен с правилами регистрации</label>
                        <input id="checkboxInput" type="checkbox" value="accept_rule">
                    </div>

                    <button type="submit" class="button button--primary form__button" disabled>Регистрация</button>

                </form>
            </div>
        </div>

    </section>
    <?php require('app/snippets/notifications.php'); ?>

    <?php require('app/snippets/footer.php'); ?>

</body>

</html>