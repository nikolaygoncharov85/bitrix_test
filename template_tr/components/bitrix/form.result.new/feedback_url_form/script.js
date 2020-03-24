$(document).ready(function(){
    var url = $("span.traveluxe_url").data('url');
    $("input.traveluxe_url").val(url);
    $(".phone_name .phone_").mask('+7(000) 000-00-00');
});