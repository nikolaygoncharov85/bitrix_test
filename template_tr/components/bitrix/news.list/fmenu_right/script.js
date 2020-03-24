$(document).ready(function(){
    var top_fmenu = $(".right_fmenu").height();
    $(".list_fmenu ul").css('top', top_fmenu-10);
    $(".right_fmenu").click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(".right_fmenu .list_fmenu ul").hide('slow');
        }else{
            $(this).addClass('active');
            $(".right_fmenu .list_fmenu ul").show('slow');
        }
    });
});