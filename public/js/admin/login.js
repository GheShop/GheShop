$(document).ready(function () {
    $('#loginTop').animate({
        top : "0"
    },1000);
    $("#loginCenter").animate({
        top : "80px",
        opacity: 1
    },1000,function () {
        $("#title").animate({
            opacity : 1
        },1000,function () {
            $("#username").focus();
        });
    });
});
