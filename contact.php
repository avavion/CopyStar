<?php

session_start();
require 'app/database/Database.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/index.js"></script>
    <title>Контакты</title>
</head>
<body>

<?php require('app/snippets/header.php'); ?>

<section class="section is--about" id="about">

    <div class="container">
        <div class="section-header">
            <h2 class="section-header__title">
                Контакты
            </h2>
        </div>

        <div class="section-body">
            <div class="contacts">

                <div class="map">
                    <img src="assets/img/map.png" alt="Карта">
                </div>

                <div class="info">
                    <ul>
                        <li>
                            <span class="bold black">Телефон:</span> <a href="tel:+78432032555">+7 (843) 203-25-55</a>
                        </li>

                        <li>
                            <span class="bold black">Электронная почта:</span> <a href="mailto:2032143@bk.ru">2032143@bk.ru</a>
                        </li>

                        <li>
                            <span class="bold black"> Адрес:</span> Россия, 420101, г. Казань, ул. Академика Парина, д.
                            18
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

</section>
<?php require('app/snippets/notifications.php'); ?>

<?php require('app/snippets/footer.php'); ?>

</body>
</html>
