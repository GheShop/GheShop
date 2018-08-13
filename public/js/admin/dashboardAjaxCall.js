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
});