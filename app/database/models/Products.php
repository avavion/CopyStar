<?php

function getAllProducts()
{
    global $database;

    $data = $database->query("SELECT * FROM `products`")->fetchAll(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function getItemsByCollectionId($id)
{
    global $database;

    $data = $database->query("SELECT * FROM `products` WHERE `collection_id` = {$id}")->fetchAll(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function getProductById($id)
{
    global $database;

    $data = $database->query("SELECT * FROM `products` WHERE `id` = {$id}")->fetch(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function getProductsLimitByDesc($limit)
{
    global $database;

    $data = $database->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT {$limit}")->fetchAll(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function deleteProductById($id)
{
    global $database;

    $database->query("DELETE FROM `products` WHERE `id` = {$id}");
}

function updateProduct($product)
{
    global $database;

    $SQL = "UPDATE `products`
            SET `name` = :name,
            `price` = :price, 
            `model` = :model, 
            `year` = :year, 
            `image` = :image, 
            `country` = :country,
            `collection_id` = :collection_id
            WHERE `id` = :id";

    $database->prepare($SQL)->execute($product);

    return $product;
}
