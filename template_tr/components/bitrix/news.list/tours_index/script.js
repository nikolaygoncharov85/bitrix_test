$(document).ready(function(){
    var H_el = 0;
    $(".tour_element").each(function(){
       var H_t = $(this).height();
        if("H_t >= H_el") {
            H_el = H_t;
        }
    });
    if($(window).width()>768){
        $(".tour_element").css('height', H_el);
    }else{
        $(".tour_element").css('height', H_el+10);
    }
    var country;
    $(".filter_links .country_select").each(function(){
        if($(this).hasClass('active')){
            country = $(this).data('country');
        }
    });
   /* $(".tours_list .tour_element").each(function(){
        var element = $(this).data('country');
        if(element == country){
            $(this).css('display', 'block');
        } else {
            $(this).css('display', 'none');
        }
    });*/
    $(".country_select").click(function(){
        var c_sel = $(this).data('country');
        if($(this).hasClass('active')){}else{
            $(".country_select").removeClass('active');
            $(this).addClass('active');
            $(".tours_list .tour_element").fadeOut(200);
            $(".tours_list .tour_element").each(function(){
                var t_sel = $(this).data('country');
                if(t_sel==c_sel){
                    $(this).fadeIn(200);
                }
            });
        }
    });
});