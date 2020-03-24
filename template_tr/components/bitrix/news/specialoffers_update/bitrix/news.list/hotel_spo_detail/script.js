$(document).ready(function(){
    if($(window).width()>768){
        $('.img_slider_hotels .img_slider_hotels_ul.spo_hotel_slider').slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            arrows: false
        });
    }else{
        $('.img_slider_hotels .img_slider_hotels_ul.spo_hotel_slider').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false
        });
    }
    $(".hotels_spo_all_list").each(function(){
        var li_h = 0;
        $(this).find('div.img_slide_hotel').each(function(){
            var li_th = $(this).height();
            if(li_th>li_h){li_h=li_th;}
        });
        $(this).find('div.img_slide_hotel').css('height',li_h + 20);
    });
});