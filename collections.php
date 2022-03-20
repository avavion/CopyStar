<?php

session_start();
require 'app/database/Database.php';
require 'app/database/models/Collections.php';

$collections = getAllCollection();

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
    <title>Главная страница CopyStar</title>
</head>
<body>

<?php require('app/snippets/header.php'); ?>

<section class="section is--collections" id="collections">

    <div class="container">
        <div class="section-header">
            <h2 class="section-header__title">
                Каталог
            </h2>
        </div>

        <div class="section-body">
            <div class="collections">
                <?php foreach ($collections as $collection): ?>
                    <div class="collection">
                        <?php if (isset($collection['image'])): ?>
                            <img src="assets/img/<?= str_replace(' ', '_', $collection['image']); ?>"
                                 alt="<?= $collection['name']; ?>"/>
                        <?php else: ?>
                            <img src="assets/img/printer.png"
                                 alt="<?= $collection['name']; ?>"/>
                        <?php endif; ?>

                        <h3 class="collection__title">
                            <?= $collection['name']; ?>
                        </h3>

                        <a href="/collection.php?collection_id=<?= $collection['id']; ?>"
                           class="collection__button button button--large button--primary">
                            Перейти к каталогу
                        </a>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php require('app/snippets/notifications.php'); ?>

<?php require('app/snippets/footer.php'); ?>

</body>
</html>
