<?php

require '../database/Database.php';
require '../database/models/Products.php';

if (isset($_POST)) updateProduct($_POST);

header('Location: /admin.php');
