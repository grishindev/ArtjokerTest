<?php

require_once '../Database/QueryBuilder.php';

$db = new QueryBuilder();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ArtJoker Test Task</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../components/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../components/css/checkformstyle.css">
<!--    <link rel="stylesheet" href="../components/css/chosen/chosen.css">-->

</head>

<body>

<?php

if (isset($_POST['city_ter_id']) && !empty($_POST['city_ter_id'])) {
    $city_ter_id = intval($_POST['city_ter_id']);
    $query = $db->allDistrictsQuery($city_ter_id);

    echo "<select class='form-control district' name='district'>";
    echo "<option value='0' selected disabled>Район города</option>";

    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<option value='{$row->ter_id}'>{$row->ter_name}</option>";
    }

    // Выполняем следующий шаг, если у города нет районов для выбора
    if ($query->fetch(PDO::FETCH_OBJ) == null) {
        $query = $db->addressByTerId($city_ter_id);

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<option value='{$row->ter_id}'>-- Не выбирать район города --</option>";
        }
    }

    echo "</select>";

} else {
    echo "<select class='form-control district' name='district' disabled><option>Район города</option></select>";
}

?>

<script src="../components/js/jquery/jquery-3.3.1.js"></script>
<script src="../components/js/bootstrap/bootstrap.js"></script>
<!--<script src="../components/js/chosen/chosen.jquery.js"></script>-->
<script src="../components/js/checkform.js"></script>

</body>
</html>
