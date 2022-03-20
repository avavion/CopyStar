<?php

require "../../database/Database.php";
require "../../database/models/Products.php";

global $database;

$data = json_decode(file_get_contents('php://input'));

$json = json_encode($data->data);
////print_r($json);
////print_r();

//$sql = "INSERT INTO `orders` (`user_id`, `items`) VALUES ('2', '{\"id\": 1}')";

$database->query("INSERT INTO `orders` (`user_id`, `items`) VALUES({$data->id}, {$json})");