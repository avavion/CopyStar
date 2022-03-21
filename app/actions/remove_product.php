<?php

require '../database/Database.php';
require '../database/models/Products.php';

if (isset($_GET['product_id'])) deleteProductById($_GET['product_id']);

header('Location: /admin.php');
