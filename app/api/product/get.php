<?php

require "app/database/Database.php";
require "app/database/models/Products.php";

if (isset($_GET)) {
    $id = $_GET['id'];

    $product = getProductById($id);

    echo json_encode($product);
}
