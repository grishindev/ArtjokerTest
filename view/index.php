<?php

$users = $db->allUsers('reg_users', 't_koatuu_tree');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ArtJoker Test Task</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../components/css/bootstrap/bootstrap.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <br><h2>Зарегистрированные пользователи</h2>
          <a href="/registration" class="btn btn-success">Зарегистрировать нового пользователя</a><br><br>

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
              <?php foreach ($users as $user):?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['ter_address']; ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
          </table>
        </div>
    </div>
</div>

<script src="../components/js/jquery/jquery-3.3.1.js"></script>

</body>
</html>
