$(document).ready(function(){
    $(".spo_detail .spo_detail_slider").responsiveSlides({
        speed: 2000,
        timeout: 5000,
        pager: true,
        nav: true,
        navContainer: ".img_slider_spo_pager"
    });
    $(".feedback_url_button").fancybox({
        padding: 0
    });
    $(".read_more").click(function(){
        $(this).parent().parent().find(".early_booking_short").hide('swing');
        $(this).parent().parent().find(".early_booking_full").show('swing');
        $(this).parent().parent().find(".read_more_hide").show('swing');
        $(this).hide('swing');
    });
    $(".read_more_hide").click(function(){
        $(this).parent().parent().find(".early_booking_full").hide('swing');
        $(this).parent().parent().find(".early_booking_short").show('swing');
        $(this).parent().parent().find(".read_more").show('swing');
        $(this).hide('swing');
    });
});