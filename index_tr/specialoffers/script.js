$(document).ready(function(){
    $(".best_spo_conditions").click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find(".best_spo_conditions_text").hide('swing');
        }else{
            $(this).addClass('active');
            $(this).find(".best_spo_conditions_text").show('swing');
        }
    });
    $(".img_slider_hotels_ul").each(function(){
        var li_h = 0;
        $(this).find('li.img_slide_hotel').each(function(){
            var li_th = $(this).height();
            if(li_th>li_h){li_h=li_th;}
        });
        $(this).find('li.img_slide_hotel').css('height',li_h + 20);
    });
    $('.spo_banner1 ul, .spo_banner2 ul').responsiveSlides({
        pause: false,
        pauseControls: false,
        auto: true,
        speed: 500,
        timeout: 1000,
    });
    if($(window).width()<=768){
        var best_spo_li = 0;
        $(".best_spo_slider .best_spo_li").each(function(){
            if($(this).height() > best_spo_li){best_spo_li=$(this).height();}
        });
        $(".best_spo_slider .best_spo_li").css('height', best_spo_li);
        $(".jq-selectbox__select").click(function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).parent().find('.jq-selectbox__dropdown').hide();
            }else{
                $(this).addClass('active');
                $(this).parent().find('.jq-selectbox__dropdown').show();
            }
        });
        $(document).on('click', function(e) {
            if (!$(e.target).closest("div.custom-select").length) {
                $('.jq-selectbox__dropdown').hide();
                $(".jq-selectbox__select").removeClass('active');
            }
            e.stopPropagation();
        });
    }
    $('.best_spo_slider .best_spo').responsiveSlides({
        speed: 300,
        timeout: 5000,
        pager: true,
        nav: true,
        navContainer: ".img_slider_spo_pager"
    });
    $('.best_spo_slider .best_spo').swipe({
        swipeLeft: function(event, direction, distance, duration, fingerCount) {
            $(".best_spo_slider .rslides_nav.next").click();
        },
        swipeRight: function(event, direction, distance, duration, fingerCount) {
            $(".best_spo_slider .rslides_nav.prev").click();
        }
    });
    $(".breadcrumbs_update .jq-selectbox__dropdown li").click(function(){
        setTimeout($(".breadcrumbs_el .btn").trigger('click'),250);
    });
});