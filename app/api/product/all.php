<?php

require "../../database/Database.php";
require "../../database/models/Products.php";

echo json_encode(getAllProducts());
