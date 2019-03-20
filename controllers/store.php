<?php

require_once '../Database/QueryBuilder.php';

$db = new QueryBuilder();

$data = [
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "territory" => $_POST['district']
];

$db->store("reg_users", $data);

header("Location: /"); exit;
