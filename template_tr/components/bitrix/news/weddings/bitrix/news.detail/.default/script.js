$(document).ready(function(){
    $(".accordion_wrapper .slider_h").click(function(){
        var click = $(this);
        if(click.hasClass("active")){
            click.removeClass("active");
            click.parent().find(".slider_div, .img_list").hide("swing");
        } else {
            $(".accordion_wrapper").find(".slider_h").each(function(){
                if($(this).hasClass("active")){
                    $(this).parent().find(".slider_div, .img_list").hide("swing");
                    $(this).removeClass("active");
                }
            });
            $(this).parent().find(".slider_div, .img_list").show("swing");
            $(this).addClass("active");
        }
    });
});