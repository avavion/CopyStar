<?php

$username = 'root';
// $password = 'avavionmvm';
$password = '';
$host = 'localhost';
$dbname = 'copy_star';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';

return $database = new PDO($dsn, $username, $password);
