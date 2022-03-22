<?php

session_start();

$collection_id = $_GET['collection_id'];

if (!isset($collection_id)) {
    header('Location: /collections.php');
}

require 'app/database/Database.php';
require 'app/database/models/Collections.php';
require 'app/database/models/Products.php';

$collection = getCollectionById($collection_id);
$products = getItemsByCollectionId($collection_id);

?>

<!doctype html>
<html lang="ru">

<head>
    <?php require('app/snippets/meta-tags.php'); ?>
    <title>Каталог: <?= $collection['name'] ?></title>
</head>

<body>

    <?php require('app/snippets/header.php'); ?>

    <section class="section is--collections" id="collections">

        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">
                    <?= $collection['name'] ?>
                </h2>
            </div>

            <div class="section-body">
                <div class="collections">
                    <?php foreach ($products as $product) : ?>

                        <div class="collection">
                            <?php if (isset($product['image'])) : ?>
                                <img src="assets/img/<?= str_replace(' ', '_', $product['image']); ?>" alt="<?= $product['name']; ?>" />
                            <?php else : ?>
                                <img src="assets/img/printer.png" alt="<?= $product['name']; ?>" />
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

                            <a href="/product.php?product_id=<?= $product['id']; ?>" class="collection__button button button--large button--primary">
                                Перейти к <?= $product['name']; ?>
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