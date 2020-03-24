$(document).ready(function(){
    /*var l_h = $(".left-sidebar").css('height');
    $("#for_italy .main-img-block.for_italy").css('height', l_h);*/
    var data_text;
    $('.request_submit').click(function(){
        var data_click = $(this).data('element');
        $('body').find('.element_div').each(function(){
            var this_div = $(this);
            var data_div = this_div.data('element');
            if(data_click==data_div){
                data_text = this_div.find('div.header_text').text();
            }
        });
    }).fancybox({
        width: 550,
        autoSize: false,
        autoResize: true,
        padding: [20,40,20,40],
        type: 'ajax',
        href: '/italy_request.php',
        wrapCSS: 'fancybox-skin-new',
        scrolling: 'no',
        beforeShow: function() {
            $('.fancybox-overlay').addClass('fancybox-overlay-new');
        },
        afterShow: function () {
            $('.fast_change_tour_label_b select').styler();
            $('.fast_change_tour_label_b_date img').remove();

            $( '.fast_change_tour_label_b_date input').datepicker({
                dateFormat: 'dd.mm.yy',
                minDate: 0,
                autoclose: false,
                beforeShow: function () {
                    $('#ui-datepicker-div').addClass("custom-calendar");
                },
                onSelect: function() {
                    $(this).data('datepicker').inline = true;
                },
                onClose: function() {
                    $(this).data('datepicker').inline = false;
                }
            });
            $('.fast_change_tour_label_b input[type="checkbox"]').styler('destroy');
            $('.fast_change_tour_label_b_amount').find('br').remove();
            $( "#slider-range2" ).slider({
                range: true,
                min: 0,
                max: 500000,
                values: [ 0, 500000 ],
                slide: function( event, ui ) {
                    //console.log(ui.values[ 0 ]+', '+ui.values[ 1 ]);
                    $('input[name="form_text_192"]').val(ui.values[ 0 ]);
                    $('input[name="form_text_193"]').val(ui.values[ 1 ]);
                    //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $('input[name="form_text_192"]').keyup(function(){
                $( "#slider-range2" ).slider( "values", 0, $(this).val() );
            });
            $('input[name="form_text_193"]').keyup(function(){
                $( "#slider-range2" ).slider( "values", 1, $(this).val() );
            });
            $('.fast_change_tour_scroll').mCustomScrollbar({
                axis:"y",
                autoDraggerLength: true
            });
            $('.hidden_text-area').text(data_text);
            $('.hidden_text-area').parent().parent().hide();
        }
    });


});