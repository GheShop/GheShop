$(document).ready(function () {
    //set icon arrow

    var CheckButtonIconNavActive = true;
    $("#nav-menu").NavBarPlugin();
    $("#iconNav").on("click",function () {
        var browserWidth = $(document).width();
        if(browserWidth > 1000){
            if(CheckButtonIconNavActive === true){
                //Animate title dashboard
                $("#dashboard-title").text("").addClass("glyphicon glyphicon-pushpin");
                $("#dashboard-title,#dashboard-nav").animate({width: "4%"});
                //hidden element
                $(".pull-left-info,.nav-search,#nav-main-title,.nav-menu1-items .nav-menu > li >a>span:last-child,.arrowNav").addClass("hidden");
                // Animate Nav dashboard
                $("#dashboard-user-info,#dashboard-content").animate({width: "96%"});
                $(".nav-menu1-items > ul > li").css("text-align","center");
                $(".nav-menu1-items > ul > li ul").addClass("hidden");
                CheckButtonIconNavActive = false;
            }else{
                // Animate Nav dashboard
                $("#dashboard-user-info,#dashboard-content").animate({width: "86%"});
                $(".nav-menu1-items > ul > li").css("text-align","left");
                $(".nav-menu1-items .nav-menu > li >a>span:last-child,.nav-search,#nav-main-title,.arrowNav").removeClass("hidden");
                $("#dashboard-title,#dashboard-nav").animate({width: "14%"},function(){
                    $(".pull-left-info").removeClass("hidden");
                });
                $("#dashboard-title").removeClass("glyphicon glyphicon-pushpin").text("DashBoard");
                $(".nav-menu1-items > ul > li ul").removeClass("hidden");
                CheckButtonIconNavActive = true;
            }
        }else{

        }
    });
});

//plugin nav
$.fn.NavBarPlugin = function () {
    var NavBarID = this;
    NavBarID.find("a").on("click",function(){
        NavBarID.find("a").removeClass("active");
        $(this).addClass("active");
        $(this).parents("li").find(">a").addClass("active");
    });
  var ul_childs = NavBarID.find(">li").children("ul");
  if(ul_childs.length > 0){
      var elementInsert = "<span class='glyphicon glyphicon-chevron-left arrowNav' checkActive='0'></span>";
      var parentInsert = ul_childs.parent("li");
      $.each(parentInsert,function (index,value) {
          $(value).append(elementInsert);
          $(value).find(">a").on("click",function(){
              if(!$(value).find(">ul").hasClass("hidden")){
                  var element = $(value).children(".arrowNav");
                  if(element.attr("checkActive")== '0'){
                      element.rotate(-90,{
                          duration:200,
                          complete: function () {
                              element.attr("checkActive","1");
                          }
                      });
                      AnimateLiNextoElement(value,"down");
                  }else if(element.attr("checkActive") == '1'){
                      element.rotate(90,{
                          duration:200,
                          complete: function () {
                              element.attr("checkActive","0");
                          }
                      });
                      AnimateLiNextoElement(value,"up");
                  }
              }
          });
      });
      $(".arrowNav").css({
          "position": "absolute",
          "color": "#4b646f",
          "z-index": 100,
          "border-spacing": "0",
          "display": "inline-block",
          "height" : "14px"
      });
      $('.arrowNav').attr('style', function(i,s) { return s + 'top: 20px !important;' + 'right:20px !important;'});

      // animate margin bottom next to li.

      var AnimateLiNextoElement = function (liElement,type) {
          var ulChild = $(liElement).find(">ul");
          if(ulChild.length > 0){
              var UlHeight = ulChild.height();
              var nextLiElement = $(liElement).next();
              if(nextLiElement.length > 0){
                  if(nextLiElement.length > 0){
                      if(type === "down"){
                          $(liElement).children("ul").css("display","block");
                          nextLiElement.css("margin-top","-"+UlHeight+"px");
                          nextLiElement.animate({
                              "margin-top": "0px"
                          },200);
                      }else if(type === "up"){
                          var tempHeight = $(liElement).siblings(":last").height();
                          $(liElement).siblings(":last").height(tempHeight+UlHeight+"px");
                          nextLiElement.animate({
                              "margin-top": "-"+UlHeight+"px"
                          },200,function(){
                              $(liElement).children("ul").css("display","none")
                              nextLiElement.css("margin-top","0px");
                              $(liElement).siblings(":last").height(tempHeight+"px");
                          });
                      }
                  }
              }else{
                  if(type === "down"){
                      $(liElement).children("ul").css("display","block");
                  }else if(type === "up"){
                      $(liElement).children("ul").css("display","none");
                  }
              }

          }
      };

  }
};

