<?php

require_once '../Database/QueryBuilder.php';

$db = new QueryBuilder();

$email = $_GET['email'];

$user = $db->getOneByEmail("reg_users", $email);

?>

<!doctype html>
<html lang="en">
<head>
    <title>ArtJoker Test Task</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../components/css/bootstrap/bootstrap.css">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><h2>Пользователь с e-mail <u><b><?php echo "$email"; ?></b></u> уже зарегистрирован</h2>
            <a href="/registration" class="btn btn-info">Назад</a><br><br>

            <table class="table">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>E-mail</th>
                    <th>Адрес</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['territory']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
