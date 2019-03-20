<?php

require_once '../Database/QueryBuilder.php';

$db = new QueryBuilder();

$allEmailsNested = $db->getAllFromField("reg_users", "email");

// Преобразуем полученный двумерный массив в строку, затем в нижний регистр и затем в одномерный массив
$allEmails = $allEmailsNested[0][email]; // Помещаем первый элемент из входящего массива в новую
$i = 1;
while ($i < count($allEmailsNested)) {
    $allEmails = $allEmails . ',' . $allEmailsNested[$i][email];
    $i++;
}
$allEmails = strtolower($allEmails);
$allEmails = explode(",", $allEmails);

// Проверяем совпадение введенного e-mail со всеми из БД
if(isset($_GET['email'])) {
    $email = $_GET['email'];
    $email = strtolower($email);
    if(in_array($email, $allEmails)){
        echo 'no';
    } else {
        echo 'yes';
    }
}
