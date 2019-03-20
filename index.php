<?php

require_once 'Database/QueryBuilder.php';

$db = new QueryBuilder();

//MY MINI FRONT ROUTER
$url = $_SERVER['REQUEST_URI'];

if ($url == '/') {
    require 'view/index.php'; exit;

} elseif ($url == '/registration') {
    require 'view/registration.php'; exit;

}

echo '404 | ERROR';
