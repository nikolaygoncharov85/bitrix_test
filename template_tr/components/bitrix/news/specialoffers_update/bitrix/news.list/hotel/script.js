$(document).ready(function(){
    if($(window).width()>768){
        $('.img_slider_hotels .img_slider_hotels_ul.spo_hotel_slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000
        });
    }else{
        $('.img_slider_hotels .img_slider_hotels_ul.spo_hotel_slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000
        });
    }
});