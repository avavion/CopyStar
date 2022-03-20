<?php

session_start();
require 'app/database/Database.php';

$user = $_SESSION['user'];

if (!isset($user)) header('Location: /login.php');

?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/index.js"></script>
    <title>Главная страница CopyStar</title>
</head>

<body>

    <?php require('app/snippets/header.php'); ?>

    <section class="section is--cart" id="cart">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">
                    Корзина
                </h2>
            </div>

            <div class="section-body">
                <div class="cart__wrapper">

                    <div class="cart-items"></div>

                    <div class="cart-info">
                        <h3 class="cart-info__title">
                            Итоговая стоимость:<br><span cart-total-price='0'>0</span> руб.
                        </h3>

                        <button data-user-id="<?= $user['id']; ?>" class="w100 js-create-order button button--primary">
                            Создать заказ
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php require('app/snippets/notifications.php'); ?>

    <?php require('app/snippets/footer.php'); ?>

</body>

</html>