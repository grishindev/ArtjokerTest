<!doctype html>
<html lang="en">
<head>
    <title>ArtJoker Test Task</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../components/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../components/css/checkformstyle.css">
<!--    <link rel="stylesheet" href="../components/css/chosen/chosen.css">-->

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><h2>Зарегистрировать нового пользователя</h2>

            <a href="/" class="btn btn-info">Назад</a><br><br>

            <form action="../controllers/store.php" method="post">

                <div class="form-group">
                    <label for="name">ФИО:</label><span>&nbsp;&nbsp;&nbsp;</span><span id="nameinfo"></span><br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Петренко Иван Васильевич" autofocus required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label><span>&nbsp;&nbsp;&nbsp;</span><span id="emailinfo"></span><br>
                    <input type="text" class="form-control" name="email" id="email" placeholder="example@mail.com" required>
                </div>

                <div class="form-group">
                    <label for="region">Территория:</label>
                    <select class="form-control region" name="region" id="region" required>
                        <option value="0" selected disabled>Область</option>
                        <?php

                        $query = $db->allRegionsQuery();

                        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                            echo "<option value='{$row->ter_id}'>$row->ter_name</option>";
                        }
                        ?>
                    </select>

                    <span class="city" id="city"></span>
                    <span class="district" id="district"></span>

                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit" id="submit" disabled>Зарегистрировать</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Невозвожно использовать e-mail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Пользователь с таким e-mail уже зарегистрирован</p>
                <a href="" id="mylink">Карточка пользователя</a>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть окно</button>
            </div>

        </div>
    </div>
</div>

<script src="../components/js/jquery/jquery-3.3.1.js"></script>
<script src="../components/js/bootstrap/popper.js"></script>
<script src="../components/js/bootstrap/bootstrap.js"></script>
<!--<script src="../components/js/chosen/chosen.jquery.js"></script>-->
<script src="../components/js/checkform.js"></script>
<script src="../components/js/createcitieslist.js"></script>
<script src="../components/js/createdistrictslist.js"></script>

</body>
</html>
