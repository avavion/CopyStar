<?php

session_start();
require 'app/database/Database.php';

$is_admin = boolval($_SESSION['user']['is_admin']);

if (!$is_admin) header('Location: /login.php');

require 'app/database/models/Collections.php';
require 'app/database/models/Products.php';

$collections = getAllCollection();

if (isset($_GET['product_id'])) {
    $product = getProductById($_GET['product_id']);
}

$columns = $database->query("SHOW COLUMNS FROM `products`")->fetchAll(PDO::FETCH_ASSOC);

$types = [];

foreach ($columns as $column) {
    foreach ($column as $field => $value) {
        if ($field == 'Field') $types[] = $value;
    }
}

?>

<!doctype html>
<html lang="ru">

<head>
    <?php require('app/snippets/meta-tags.php'); ?>
    <title>Главная страница CopyStar</title>
</head>

<body>
    <?php require('app/snippets/header.php'); ?>

    <section class="section is--admin">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">
                    Редактирование продукта
                </h2>
            </div>

            <div class="section-body">
                <form action="app/actions/update_product.php" enctype="multipart/form-data" class="form" method='POST'>
                    <?php foreach ($types as $type) : ?>

                        <?php if ($type == 'image') : ?>
                            <input type='hidden' name="<?= $type; ?>" value='<?= $product[$type]; ?>'>
                            <?php continue; ?>
                        <?php endif; ?>

                        <?php if ($type == 'id') : ?>
                            <input type='hidden' name="<?= $type; ?>" value='<?= $product[$type]; ?>'>
                            <?php continue; ?>
                        <?php endif; ?>

                        <?php if ($type == 'collection_id') : ?>
                            <select name="<?= $type; ?>" id="<?= $type; ?>Select">
                                <?php foreach ($collections as $collection) : ?>
                                    <option <?php if ($product[$type] == $collection['id']) : ?> selected<?php endif; ?> value='<?= $collection['id']; ?>'>
                                        <?= $collection['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php continue; ?>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="passwordInput" class="form__label">
                                <?= $type; ?>
                            </label>
                            <input type="text" value="<?= $product[$type]; ?>" name="<?= $type; ?>" id="<?= $type; ?>Input" class="form__input" required>
                        </div>
                    <?php endforeach; ?>


                    <button type='submit' class='button button--primary button--large'>
                        Обновить запись
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php require('app/snippets/notifications.php'); ?>
    <?php require('app/snippets/footer.php'); ?>

</body>

</html>