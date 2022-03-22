<?php

session_start();

$product_id = $_GET['product_id'];

if (!isset($product_id)) {
    header('Location: /collections.php');
}

require 'app/database/Database.php';
require 'app/database/models/Collections.php';
require 'app/database/models/Products.php';

$product = getProductById($product_id);
$collection = getCollectionById($product['collection_id']);

if (isset($_SESSION['user'])) $user = $_SESSION['user'];

?>

<!doctype html>
<html lang="ru">

<head>
    <?php require('app/snippets/meta-tags.php'); ?>
    <title>Каталог: <?= $product['name'] ?></title>
</head>

<body>

    <?php

    $translate = [
        'id' => 'Артикул',
        'model' => 'Модель',
        'year' => 'Год выпуска',
        'country' => 'Страна производитель'
    ];

    ?>

    <?php require('app/snippets/header.php'); ?>

    <section class="section is--product" id="product">

        <div class="container">
            <div class="section-body">
                <div class="product">

                    <div class="product__gallery">
                        <?php if (isset($product['image'])) : ?>
                            <img width='1280' height="1024" src="assets/img/<?= str_replace(' ', '_', $product['image']); ?>" alt="<?= $product['name']; ?>" />
                        <?php else : ?>
                            <img width='1280' height="1024" src="assets/img/printer.png" alt="<?= $product['name']; ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="product__info">
                        <h2 class="product__title">
                            <?= $product['name'] ?>
                        </h2>

                        <p class="product__price">Стоимость: <span class="black bold"><?= $product['price'] ?></span> руб.
                        </p>

                        <div class="grid table">
                            <div class="row">
                                <?php foreach ($translate as $key => $value) : ?>
                                    <div class="col">
                                        <h4 class="col__title">
                                            <?= $value; ?>:
                                        </h4>
                                    </div>

                                    <div class="col">
                                        <?= $product[$key] === NULL ? 'Не указанно' : $product[$key]; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <?php if (isset($user)) : ?>
                            <button class="button button--primary">
                                Добавить в корзину
                            </button>
                        <?php else : ?>
                            <a href='/login.php' class="product__link">
                                Для покупки необходимо авторизоваться
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script id="product-json" type="application/json">
        <?= json_encode($product); ?>
    </script>
    <?php require('app/snippets/notifications.php'); ?>

    <?php require('app/snippets/footer.php'); ?>

</body>

</html>