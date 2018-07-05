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
//  handel modal reset password
    $("#reset-password-link").on("click",function () {
        $("#title,#loginMain").css("filter","blur(2px)");
    });
    $(".close").on("click",function () {
        $("#title,#loginMain").css("filter","");
    });

    $("#sendResetPassword").on("click",function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':  $(".modal-body form input[type='hidden']").val()
            }
        });
        $.ajax({
            type: "POST",
            url: "/admin/password_reset",
            data:{"email_reset":$("#email_reset").val()},
        }).done(function (response) {
           console.log(response);
        });
    });

});
