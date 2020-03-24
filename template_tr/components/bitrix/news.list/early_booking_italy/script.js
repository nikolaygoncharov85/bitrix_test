$(document).ready(function(){
    $("h1").text("Раннее бронирование в отелях Италии");
    $(".element_div").each(function(){
        if($(this).find(".hotels_list ul").hasClass('Y')){
            $(this).find("li:last-child").append(' и другие');
        }
    });
});