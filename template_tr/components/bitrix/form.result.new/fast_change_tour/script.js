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
$( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 500000,
    values: [ 0, 500000 ],
    slide: function( event, ui ) {
        console.log(ui.values[ 0 ]+', '+ui.values[ 1 ]);
        $('input[name="form_text_105"]').val(ui.values[ 0 ]);
        $('input[name="form_text_151"]').val(ui.values[ 1 ]);
        //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
    }
});
$('input[name="form_text_105"]').keyup(function(){
    $( "#slider-range" ).slider( "values", 0, $(this).val() );
});
$('input[name="form_text_151"]').keyup(function(){
    $( "#slider-range" ).slider( "values", 1, $(this).val() );
});
$('.fast_change_tour_scroll').mCustomScrollbar({
    axis:"y"
});
