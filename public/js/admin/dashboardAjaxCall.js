$(document).ready(function(){
    // Get user Info data
    $.ajax({
        type: "GET",
        url : "/admin/user_info"
    }).done(function (response) {
        if(typeof response === 'object'){
            $(".user-info-name").text(response.name);
            $(".pull-left-info > span:first").text(response.email);
        }
    });
    // update user info
    $("#update_user_info").on("click",function(){
        $.ajax({
            type: "GET",
            url : "/admin/user/info"
        }).done(function (response) {
            $("#dashboard-content").html(response);
        });
    });

    // $("#change_password_user").on("click",function(){
    //     $.ajax({
    //         type: "GET",
    //         url : "/admin/user/info"
    //     }).done(function (response) {
    //         $("#dashboard-content").html(response);
    //     });
    // });

});