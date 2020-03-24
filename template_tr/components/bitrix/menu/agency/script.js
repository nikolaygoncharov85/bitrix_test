$(document).ready(function(){
    var gid_carousel_wr = $(".gid_carousel_wr").width();
    $(".gid_carousel_wr li").css('width', gid_carousel_wr);
    $('.gid_carousel').jcarousel({wrap: 'circular'}).jcarouselAutoscroll({interval: 3500});
});