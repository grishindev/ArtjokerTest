$(function () { // Обработка после полной загрузки документа

    var region_ter_id = $(".region").val(); // Продублировали из функции ниже, т.к. не получали значение region_ter_id (ошибка в консоли)

    $.ajax({                  // Продублировали нижнюю функцию, чтобы помимо выбора этот .ajax постоянно обращался к файлу cities3.php
        type: "POST",
        url: "../controllers/cities.php",
        data: {region_ter_id: region_ter_id},
        success: function (data) {
            $(".city").html(data);
        }
    });

    $(".region").change(function () { // Выбираем селект с классом region и событие change (т.е. когда выбран элемент)
        var region_ter_id = $(".region").val(); // Получаем id элемента
        $.ajax({
            type: "POST",
            url: "../controllers/cities.php",
            data: {region_ter_id: region_ter_id}, // Данные, которые мы отправляем - ter_id Области
            success: function (data) {
                $(".city").html(data); // Выбираем span с классом city и помещаем в него html(data)
            }
        });
    });
});
