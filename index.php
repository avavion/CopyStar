<?php

session_start();
require 'app/database/Database.php';
require 'app/database/models/Products.php';
require 'app/database/models/Collections.php';

$products = getProductsLimitByDesc(3);
$collections = getCollectionsLimitByDesc(3);

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

<section class="is--hero" id="hero">
    <div class="hero__outer">
        <div class="container">
            <div class="hero__inner">
                <h2 class="hero__title">
                    Copy<span class="green">Star</span>
                </h2>

                <p class="hero__text">
                    Наш принцип – работа на результат.
                </p>
            </div>
        </div>

    </div>

</section>

<section class="section featured-collection">
    <div class="container">
        <div class="section-header">
            <h2 class="section-header__title">
                Новинки
            </h2>
        </div>

        <div class="section-body">
            <div class="collections">
                <?php foreach ($products as $product): ?>

                    <div class="collection">
                        <?php if (isset($product['image'])): ?>
                            <img src="assets/img/<?= str_replace(' ', '_', $product['image']); ?>"
                                 alt="<?= $product['name']; ?>"/>
                        <?php else: ?>
                            <img src="assets/img/printer.png"
                                 alt="<?= $product['name']; ?>"/>
                        <?php endif; ?>

                        <h3 class="collection__title">
                            <?= $product['name']; ?>
                        </h3>

                        <p class="collection__text collection__price">
                            Стоимость: <?= $product['price']; ?> руб.
                        </p>

                        <p class="collection__text">
                            Модель: <?= $product['model']; ?>
                        </p>

                        <p class="collection__text">
                            Год выпуска: <?= $product['year']; ?>
                        </p>

                        <p class="collection__text">
                            Производитель: <?= $product['country']; ?>
                        </p>

                        <a href="/product.php?product_id=<?= $product['id']; ?>"
                           class="collection__button button button--large button--primary">
                            Перейти к <?= $product['name']; ?>
                        </a>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-header__title">
                Новые каталоги
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
