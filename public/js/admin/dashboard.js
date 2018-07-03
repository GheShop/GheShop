$(document).ready(function () {
    var CheckButtonIconNavActive = false;
    $("#iconNav").on("click",function () {
        var browserWidth = $(document).width();
        if(browserWidth > 768){
            if(CheckButtonIconNavActive === false){
                //Animate title dashboard
                $("#dashboard-title").text("").addClass("glyphicon glyphicon-pushpin");
                $("#dashboard-title,#dashboard-nav").animate({width: "4%"});
                //hidden element
                $(".pull-left-info,.nav-search,#nav-main-title").addClass("hidden");
                $(".nav-menu-items .nav-menu > li >a>span:last-child").addClass("hidden");
                $(".nav-menu-items > ul > li").css("text-align","center");
                // Animate Nav dashboard
                $("#dashboard-user-info,#dashboard-content").animate({width: "96%"});
                CheckButtonIconNavActive = true;
            }else{
                // Animate Nav dashboard
                $("#dashboard-user-info,#dashboard-content").animate({width: "83.33333333%"});
                $("#dashboard-title,#dashboard-nav").animate({width: "16.66666667%"},function(){
                    $(".nav-menu-items > ul > li").css("text-align","left");
                    $(".pull-left-info,.nav-search,#nav-main-title").removeClass("hidden");
                    $(".nav-menu-items .nav-menu > li >a>span:last-child").removeClass("hidden");
                });
                $("#dashboard-title").removeClass("glyphicon glyphicon-pushpin").text("DashBoard");
                CheckButtonIconNavActive = false;

            }
        }else{

        }
    });
    $(".nav-menu-items ul li a").on("click",function(){
        $(".nav-menu-items ul li a").removeClass("active");
        $(this).addClass("active");
        $(this).parents("li").find(">a").addClass("active");
    });
});
