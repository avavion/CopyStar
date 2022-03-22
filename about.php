<?php

session_start();
require 'app/database/Database.php';

?>

<!doctype html>
<html lang="ru">

<head>
    <?php require('app/snippets/meta-tags.php'); ?>

    <title>О нас</title>
</head>

<body>

    <?php require('app/snippets/header.php'); ?>

    <section class="section is--about" id="about">

        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">
                    О нас
                </h2>
            </div>

            <div class="section-body">

                <h3 class="about__title">
                    Наш принцип – работа на результат.
                </h3>

                <p class="about__content">
                    Наша задача доставить максимум качества каждому клиенту.
                    Коллектив компании – команда квалифицированных специалистов с большим опытом работы.
                </p>

                <div class="grid gallery">

                    <div class="photo">
                        <img src="assets/img/about_1.jpg" alt="Gallery Photo #1">
                    </div>

                    <div class="photo">
                        <img src="assets/img/about_2.jpg" alt="Gallery Photo #1">
                    </div>

                    <div class="photo">
                        <img src="assets/img/about_3.jpg" alt="Gallery Photo #1">
                    </div>

                    <div class="photo">
                        <img src="assets/img/about_4.png" alt="Gallery Photo #1">
                    </div>

                    <div class="photo">
                        <img src="assets/img/about_5.jpg" alt="Gallery Photo #1">
                    </div>

                </div>
            </div>
        </div>

    </section>
    <?php require('app/snippets/notifications.php'); ?>

    <?php require('app/snippets/footer.php'); ?>

</body>

</html>