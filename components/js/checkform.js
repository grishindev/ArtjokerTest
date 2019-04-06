var name;
var nameStat;
var email;
var emailStat;
var region;
var regionStat;
var city;
var cityStat;
var district;
var districtStat;

$('head').append('<link rel="stylesheet" href="/components/css/checkformstyle.css">');

$(function () {

    // Name
    $("#name").change(function () {
        name = $("#name").val();
        var expName = /^[/\w/\sа-яА-Я-]+$/gmi;
        var resName = name.search(expName);
        if (resName == -1) {
            $("#nameinfo").hide().text("Неверный формат имени").css("color", "red").fadeIn(400);
            $("#name").removeClass("inputRed inputGreen").addClass("inputRed");
            nameStat = 0;
            buttonOnAndOff();
        } else {

            $.ajax({
                statusCode: {
                    200: function () {
                        console.log("OK");
                    }
                }
            });

            nameStat = 1;
            buttonOnAndOff();
        }
    });
    $("#name").keyup(function () {
        $("#name").removeClass("inputRed inputGreen");
        $("#nameinfo").text("");
    });

    // Email
    $("#email").change(function () {
        email = $("#email").val();
        var expEmail = /[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}/i;
        var resEmail = email.search(expEmail);
        if (resEmail == -1) {
            $("#emailinfo").hide().text("Неверный формат e-mail").css("color", "red").fadeIn(400);
            $("#email").removeClass("inputRed inputGreen").addClass("inputRed");
            emailStat = 0;
            buttonOnAndOff();
        } else {

            $.ajax({
                url: "../controllers/checkemail.php",
                type: "GET",
                data: "email=" + email,
                cache: false,
                success: function (response) {

                    if (response == "no") {
                        $("#emailinfo").hide().text("Пользователь с таким e-mail уже зарегистрирован").css("color", "red").fadeIn(400);
                        $("#email").removeClass("inputRed inputGreen").addClass("inputRed");
                        var link = $('#mylink');
                        link.attr('href', `/view/usercard.php?email=${email}`);
                        $('#myModal').modal('show');

                        emailStat = 0;
                        buttonOnAndOff();

                    } else {
                        $("#email").removeClass("inputRed inputGreen");
                        $("#emailinfo").text("");
                    }
                }

            });

            emailStat = 1;
            buttonOnAndOff();
        }

    });
    $("#email").keyup(function () {
        $("#email").removeClass("inputRed inputGreen");
        $("#emailinfo").text("");
    });

    // Region

    // $("#region").chosen();
    // $("#region").chosen({no_results_text: "Ничего не найдено..."});

    $("#region").change(function () {
        region = $("#region").val();
        var expRegion = /^.+$/gmi;
        var resRegion = region.search(expRegion);
        if (resRegion == -1) {
            regionStat = 0;
            buttonOnAndOff();
        } else {

            $.ajax({
                statusCode: {
                    200: function () {
                        console.log("Region OK");
                    }
                }
            });

            regionStat = 1;
            buttonOnAndOff();
        }
    });
    $("#region").keyup(function () {
        $("#region").removeClass("inputRed inputGreen");
        $("#region").next().text("");
    });

    // City

    // $("#city").chosen();
    // $("#city").chosen({no_results_text: "Ничего не найдено..."});

    $("#city").change(function () {
        city = $("#city").val();
            $.ajax({
                statusCode: {
                    200: function () {
                        console.log("City OK");
                    }
                }
            });

            cityStat = 1;
            buttonOnAndOff();
    });
    $("#city").keyup(function () {
        $("#city").removeClass("inputRed inputGreen");
        $("#city").next().text("");
    });

    // District

    // $("#district").chosen();
    // $("#district").chosen({no_results_text: "Ничего не найдено..."});

    $("#district").change(function () {
        district = $("#district").val();

            $.ajax({
                statusCode: {
                    200: function () {
                        console.log("District OK");
                    }
                }
            });

            districtStat = 1;
            buttonOnAndOff();
    });

    $("#district").keyup(function () {
        $("#district").removeClass("inputRed inputGreen");
        $("#district").next().text("");
    });

    function buttonOnAndOff() {
        if (nameStat === 1 && regionStat === 1 && cityStat === 1 && districtStat === 1) {
            $("#submit").removeAttr("disabled");
        } else {
            $("#submit").attr("disabled", "disabled");
        }
    }

});
