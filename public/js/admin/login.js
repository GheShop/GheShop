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

    $('#myModal').on('hidden.bs.modal', function (e) {
        $("#title,#loginMain").css("filter","");
    });

    $("#reset-password-link").on("click",function () {
        $("#title,#loginMain").css("filter","blur(2px)");
    });
    $(".close,.closeModal").on("click",function () {
        $("#title,#loginMain").css("filter","");
        $(".modal_info_1").removeClass("hidden");
        $(".modal_info_2").addClass("hidden");
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
            beforeSend:function () {
                $("#loader").css({"opacity":1,"width":"auto","height":"auto","margin-right":"8px"});
                $("#loader").removeClass("hidden");
                $("#title,#loginMain").css("filter","blur(2px)");
            }
        }).done(function (response) {
            var result = jQuery.parseJSON(response);
            if(result.statusCode === 0){
                $(".error").text(result.message);
            }else{
                $(".modal_info_1").addClass("hidden");
                $(".modal_info_2").removeClass("hidden");
            }
            $("#loader").css({"opacity":0,"width":0,"height":0,"margin-right":0});
            $("#title,#loginMain").css("filter","");
        });
    });
});
