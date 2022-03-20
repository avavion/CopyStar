<?php

function getCollectionById($id)
{
    global $database;

    $data = $database->query("SELECT * FROM `collections` WHERE `id` = {$id}")->fetch(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}

function getAllCollection()
{
    global $database;

    $data = $database->query('SELECT * FROM `collections`')->fetchAll(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}


function getCollectionsLimitByDesc($limit)
{
    global $database;

    $data = $database->query("SELECT * FROM `collections` ORDER BY `id` DESC LIMIT {$limit}")->fetchAll(PDO::FETCH_ASSOC);

    if ($data == '') {
        $data = array();
    }

    return $data;
}