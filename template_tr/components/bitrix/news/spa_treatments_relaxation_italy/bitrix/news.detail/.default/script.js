$(document).ready(function(){
    $(".read_more").click(function(){
        $(".read_full").show('swing');
        $(".read_full").css('display', 'inline');
        $(this).remove();
    });
});