<?php

require "../../database/Database.php";

global $database;

$data = json_decode(file_get_contents('php://input'), true);

$user_id = $data['id'];
$items = json_encode($data['data']);

$SQL = "INSERT INTO `orders` (`user_id`, `items`) VALUES (:user_id, :cart_items)";
$database->prepare($SQL)->execute(['user_id' => $user_id, 'cart_items' => $items]);

$order_id = $database->lastInsertId();

echo json_encode(['order_id' => $order_id, 'message' => "Заказ успешно сформирован! Номер вашего заказа #{$order_id}"]);