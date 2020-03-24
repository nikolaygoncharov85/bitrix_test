$(document).ready(function(){
    $(".hotels_spo_all_list").each(function(){
        var li_h = 0;
        $(this).find('div.img_slide_hotel').each(function(){
            var li_th = $(this).height();
            if(li_th>li_h){li_h=li_th;}
        });
        $(this).find('div.img_slide_hotel').css('height',li_h + 20);
    });
});