$(function () { // Обработка после полной загрузки документа

    var city_ter_id = $(".city").val();

    $.ajax({
        type: "POST",
        url: "../controllers/districts.php",
        data: {city_ter_id: city_ter_id},
        success: function (data) {
            $(".district").html(data);
        }
    });

    $(".city").change(function () {
        var city_ter_id = $(".cityVal:selected").val();
        if (city_ter_id === 0) {
        }

        $.ajax({
            type: "POST",
            url: "../controllers/districts.php",
            data: {city_ter_id: city_ter_id},
            success: function (data) {
                $(".district").html(data);
            }
        });
    });
});
