<?php

require_once '../Database/QueryBuilder.php';

$db = new QueryBuilder();

$email = $_POST['email'];

$data = [
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "territory" => $_POST['district']
];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo $email . '<br>';
    $db->store("reg_users", $data);
} else {
    echo 'Неверный формат введенных данных';
}

header("Location: /"); exit;
