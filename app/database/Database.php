<?php

$username = 'root';
$password = 'avavionmvm';
$host = 'localhost';
$dbname = 'eshop';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';

return $database = new PDO($dsn, $username, $password);