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

if (isset($_POST['region_ter_id']) && !empty($_POST['region_ter_id'])) {
    $region_ter_id = intval($_POST['region_ter_id']);
    $query = $db->allCitiesQuery($region_ter_id);

    echo "<select class='form-control city' name='city'>";
    echo "<option value='0' selected disabled>Город / Район области</option>";
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        echo "<option class='city cityVal' value='{$row->ter_id}'>{$row->ter_name}</option>";
    }
    echo "</select>";

} else {
    echo "<select class='form-control city' name='city' disabled><option>Город / Район области</option></select>";
}

?>

<script src="../components/js/jquery/jquery-3.3.1.js"></script>
<script src="../components/js/bootstrap/bootstrap.js"></script>
<!--<script src="../components/js/chosen/chosen.jquery.js"></script>-->
<script src="../components/js/checkform.js"></script>

</body>
</html>
