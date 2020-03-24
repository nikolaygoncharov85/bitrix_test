/*http://pingvisha.ru*/
$(document).ready(function() {
    $('.header_politics_hide').click(function(){
        $.ajax({
            url: '/bitrix/ajax/politics_agree.php',
            dataType: 'json',
            success: function(data) {

                console.log(data);
                var datas = JSON.parse(data);
                console.log(datas);
                if (datas === true) {
                    $('.header_politics').slideUp(400, function(){
                        $(this).remove();
                    });
                }
            }
        });
    });

    $('.custom-select').styler();

    $('.rslides').responsiveSlides({
        speed: 1000,
        timeout: 5000,
        pager: true,
        nav: true,
        navContainer: "#pager"
    });
    $('.rslides').swipe({
        swipeLeft: function(event, direction, distance, duration, fingerCount) {
            $(".rslides_nav.next").click();
        },
        swipeRight: function(event, direction, distance, duration, fingerCount) {
            $(".rslides_nav.prev").click();
        }
    });
    $('.datapicker').datepicker({
        autoclose: true,
        dateFormat: 'dd.mm.yy',
        minDate: 0,
        beforeShow: function () {
            $('#ui-datepicker-div').addClass("custom-calendar");
        },
        onSelect: function() {
            //$(this).data('datepicker').inline = true;
        },
        onClose: function() {
            $(this).data('datepicker').inline = false;
            if($(this).hasClass('datapicker_from')){
                var datapicker_from = $(".datapicker_from").val();
                $(".datapicker_to").val(datapicker_from);
            }
        }
    });
    $(".fancybox").fancybox({
        padding: 0
    });

    /************************************/
    var jcarousel = $('.bottom-carousel');
    var min_item_width = 240;
    jcarousel
        .on('jcarousel:reload jcarousel:create', function () {
            var carousel = $(this),
                width = carousel.innerWidth();

            var container = $('.row-1');
            var item_width = container.innerWidth()/3;
            if (item_width < min_item_width) item_width = min_item_width;
            var max_count_item = parseInt($(window).width() / item_width);
            if (max_count_item % 2 == 0 && item_width != min_item_width) max_count_item--;
            if (carousel.jcarousel('items').length <= max_count_item) {
                max_count_item = carousel.jcarousel('items').length;
                $('.jcarousel-control-prev, .jcarousel-control-next').hide();
            } else {
                $('.jcarousel-control-prev, .jcarousel-control-next').show();
            }
            carousel.jcarousel('items').css('width', item_width + 'px');
            carousel.width(item_width*max_count_item);

        })
        .jcarousel({
            wrap: 'circular'
        })
        .jcarouselAutoscroll({
            interval: 5000
        })

    $('.jcarousel-control-prev')
        .jcarouselControl({
            target: '-=1'
        });

    $('.jcarousel-control-next')
        .jcarouselControl({
            target: '+=1'
        });
    /************************************/
    var jcarousel2 = $('.transfers_near');
    var min_item_width = 240;
    jcarousel2
        .on('jcarousel:reload jcarousel:create', function () {
            var main_w = $(".transfers_near").parent().width();
            $(".transfers_near").css('width',main_w);
            var col_w = main_w/3;
            $(".transfers_near li").css('width',col_w);
        })
        .jcarousel({
            wrap: 'circular'
        })
        .jcarouselAutoscroll({
            interval: 5000
        })

    $('.transfers_js .pr')
        .jcarouselControl({
            target: '-=1'
        });

    $('.transfers_js .ne')
        .jcarouselControl({
            target: '+=1'
        });
    /************************************/
    var jcarousel3 = $('.excurse_near');
    var min_item_width = 240;
    jcarousel3
        .on('jcarousel:reload jcarousel:create', function () {
            var main_w = $(".excurse_near").parent().width();
            $(".excurse_near").css('width',main_w);
            var col_w = main_w/3;
            $(".excurse_near li").css('width',col_w);
        })
        .jcarousel({
            wrap: 'circular'
        })
        .jcarouselAutoscroll({
            interval: 5000
        })

    $('.excurse_js .pr')
        .jcarouselControl({
            target: '-=1'
        });

    $('.excurse_js .ne')
        .jcarouselControl({
            target: '+=1'
        });
    /************************************/
    $('.show-hide-block').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active').prev('.hide-block').hide();
        } else {
            $(this).addClass('active').prev('.hide-block').show();
        }
        return false;
    });

    $('.service-menu-title').on('click', function () {
       $(this).parent().toggleClass('active').parents('.service-menu-block').toggleClass('active');
    });

    $('.header-phone-name').on('click', function () {
        $(this).toggleClass('active');
    });

    $('.header_phone-city').on('click', 'a', function () {
        $(this).parents('ul').append('<li><a href="#" data-number="' + $('.header-phone-number').text() + '">'+ $('.header-phone-name').text() + '</a></li>');
        $('.header-phone-name').text($(this).text());
        $('.header-phone-number').text($(this).data('number'));
        $(".header-phone-name").toggleClass('active');
        $(this).parent().remove();
        return false;
    });

    $('.choose-city-name').on('click', function () {
        $(this).toggleClass('active');
    });

    $('.choose-city-list').on('click', 'a', function () {
        $(this).parents('ul').append('<li><a href="#" data-number="' + $('.choose-city-number-phone').text() + '">'+ $('.choose-city-name').text() + '</a></li>');
        $('.choose-city-name').text($(this).text());
        $('.choose-city-number-phone').text($(this).data('number'));
        $(".choose-city-name").toggleClass('active');
        $(this).parent().remove();
        return false;
    });

    $('.menu-list-title').on('click', function () {
        $(this).toggleClass('opened');
        return false;
    });

    $('.tabs-county-item-country').on('click', function () {
        var dataGroup = $(this).data('group');
        $('.country-tab-content .country-item-block').hide();
        $('.country-tab-content .country-item-block[data-group*=' + dataGroup + ']').fadeIn(200);
        $('.tabs-county-item.active').removeClass('active');
        $(this).addClass('active');
        return false;
    });

    $('.tabs-item').on('click', function () {
        $('.tabs-item.active, .tabs-content-item.active').removeClass('active');
        $(this).addClass('active').parents('.tabs').next().children().eq($(this).index()).addClass('active');
        return false;
    });

    $('.left-sidebar-icon-menu').on('click', function () {
       $(this).parent().toggleClass('opened');
    });

    var galleryTop = new Swiper ('.swiper-gallery', {
        loop: true,
        initialSlide: 1,
        nextButton: '.gallery-thumbs-next',
        prevButton: '.gallery-thumbs-prev'
    });
    /*var galleryThumbs = new Swiper('.gallery-thumbs', {
        centeredSlides: true,
        slidesPerView: 'auto',
        slideToClickedSlide: true,
        nextButton: '.gallery-thumbs-next',
        prevButton: '.gallery-thumbs-prev',
        initialSlide: 1
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;*/


    $(".hidden_block_title").on('click', function () {
        $(this).toggleClass("opening");
        event.stopPropagation();
    });

    if ($('.compare-param').length) {
        var apis = [];
        function jScrollPaneReload () {
            if (apis.length) {
                $.each(
                    apis,
                    function(i) {
                        this.destroy();
                    }
                );
                apis = [];
            }
            $('.compare-products-list').each(
                function()
                {
                    apis.push($(this).jScrollPane().data().jsp);
                }
            );
            return false;

        }
        //COMPARE TABLE
        $(window).load(function () {
            $('.compare-param div').each( function (index_td) {
                var first_td = $(this);
                var max_height = $(this).innerHeight();
                $('.compare-products-item').each( function (index_table) {
                    var current_td = $(this).find('div').eq(index_td);
                    var height = current_td.innerHeight();
                    if (height > max_height) {
                        first_td.innerHeight(height);
                        for (var i = 0; i < index_table; i++) {
                            $('.compare-products-item').eq(i).find('div').eq(index_td).innerHeight(height);
                        }
                        max_height = height;
                    } else {
                        current_td.innerHeight(max_height);
                    }
                });
            });



            $('.compare-products-list').jScrollPane();

        });
        $(window).resize(function () {
            jScrollPaneReload ();
        });
    }



    function positionPopup (popupClass) {
        var heightPopup = $('.popup:visible').height()/2;
        if (typeof popupClass !== "undefined") {
             heightPopup = $('.'+popupClass + ' .popup').height()/2;
        }
        var marginTop = $(window).height()/2 - heightPopup;
        if (marginTop < 0) marginTop = 0;
        $('.popup-bg:visible > .container').css('margin-top', marginTop);
    }

    $(window).resize(function () {
        positionPopup ();
    });

    $('.open-popup').on('click', function () {
        $('.popup-bg:visible').fadeOut(200);
        var popupClass = $(this).data("popup");
        var popupBg = $("." + popupClass);
        popupBg.fadeIn(200);
        $('html').addClass('popup-open').css('padding-right', getScrollBarWidth());
        positionPopup (popupClass);
        return false;
    });

    //HIDEPOPUP
    $('.popup-bg').click(function(event) {
        if ($(event.target).closest('.popup').parent().length) return;
        $(this).fadeOut(200);
        $('html').removeClass('popup-open').css('padding-right', 0);
        event.stopPropagation();
    });
    $('.popup-close').on('click', function () {
        $(this).parents('.popup-bg').fadeOut(200);
        $('html').removeClass('popup-open').css('padding-right', 0);
        return false;
    });

    function getScrollBarWidth () {
        var inner = document.createElement('p');
        inner.style.width = "100%";
        inner.style.height = "200px";

        var outer = document.createElement('div');
        outer.style.position = "absolute";
        outer.style.top = "0px";
        outer.style.left = "0px";
        outer.style.visibility = "hidden";
        outer.style.width = "200px";
        outer.style.height = "150px";
        outer.style.overflow = "hidden";
        outer.appendChild (inner);

        document.body.appendChild (outer);
        var w1 = inner.offsetWidth;
        outer.style.overflow = 'scroll';
        var w2 = inner.offsetWidth;
        if (w1 == w2) w2 = outer.clientWidth;

        document.body.removeChild (outer);

        return (w1 - w2);
    }

    $('.register-form').validate();

    $('.count-down-timer').each(function () {
        $(this).countdown(
            $(this).data('time-end'), function(event) {
            $(this).text(
                event.strftime($(this).data('time-format'))
            );
        }).on('update.countdown', function(event) {
                var days = declOfNum(parseInt(event.strftime('%D')),['день', 'дня', 'дней']);
                var hr = declOfNum(parseInt(event.strftime('%H')),['час', 'часа', 'часов']);
                var minuts = declOfNum(parseInt(event.strftime('%M')),['минута', 'минуты', 'минут']);
                var $this = $(this).html(event.strftime(''
                    + '<div class="countdown-val countdown-day"><div class="big">%D</div> '+ days + '</div>  '
                    + '<div class="countdown-val countdown-hr"><div class="big">%H</div> '+ hr + '</div>  '
                    + '<div class="countdown-sep">:</div>  '
                    + '<div class="countdown-val countdown-min"><div class="big">%M</div> '+ minuts + '</div>'));
                console.log();
        });
    });

    function declOfNum(number, titles) {
        cases = [2, 0, 1, 1, 1, 2];
        return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
    }
    //main banner height
    /*setTimeout(function(){
        var wrap = $(".main_slider .rslides").height();
        $(".main_slider ul.rslides li").each(function(){
            var tf = $(this);
            var block = tf.find(".text-main-slider").height();
            var newH;
            newH = (wrap - block)/2*0.6;
            tf.find(".text-main-slider").css('top', newH);
        });
    }, 1000);
    $(window).resize(function(){
        var wrap = $(".main_slider .rslides").height();
        $(".main_slider ul.rslides li").each(function(){
            var tf = $(this);
            var block = tf.find(".text-main-slider").height();
            var newH;
            newH = (wrap - block)/2*0.6;
            tf.find(".text-main-slider").css('top', newH);
        });
    });*/
    //main banner height

    $('.fast_change_tour_link').fancybox({
        width: 550,
        autoSize: false,
        autoResize: true,
        padding: [20,40,20,40],
        type: 'ajax',
        href: '/fast_change_tour.php',
        wrapCSS: 'fancybox-skin-new',
        scrolling: 'no',
        beforeShow: function() {
            $('.fancybox-overlay').addClass('fancybox-overlay-new');
        },
        afterShow: function () {
            $('.fast_change_tour_label_b_date_img input').mask('00.00.0000');
            $('input[name="form_text_105"]').mask('000000');
            $('input[name="form_text_151"]').mask('000000');
            $('input[name="form_text_94"]').mask("OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO", {
                translation: {
                    'O': {
                        pattern: /[а-яА-Яa-zA-Z\s]/,
                        optional: true
                    }
                }, placeholder: "Страна, город"}
            );
            $('input[name="form_text_107"]').mask("OOOOOOOOOOOOOOOOOOOOOOOOOOOO", {
                translation: {
                    'O': {
                        pattern: /[а-яА-Яa-zA-Z\s]/,
                        optional: true
                    }
                }}
            );
            $('input[name="form_text_109"]').mask("A", {
                translation: {
                        "A": { pattern: /[\w@\-.+]/, recursive: true }
                }
            });
            $('input[name="form_text_108"]').mask('+000000000000000000000000');
            $('.fancybox-overlay-new select[name="form_dropdown_day_of_week"]').children('option').last().attr('disabled','disabled');
            $('.fancybox-overlay-new select[name="form_dropdown_hours"]').attr('disabled', 'disabled');
            $('.fancybox-overlay-new select[name="form_dropdown_minutes"]').attr('disabled', 'disabled');
            $('.fancybox-overlay-new select[name="form_dropdown_day_of_week"]').change(function(){
                $('.fancybox-overlay-new select[name="form_dropdown_hours"]').val($('.fancybox-overlay-new select[name="form_dropdown_hours"]').children('option').first().val());
                $('.fancybox-overlay-new select[name="form_dropdown_minutes"]').val($('.fancybox-overlay-new select[name="form_dropdown_minutes"]').children('option').first().val());
                if ($(this).val() == '573') {
                    $('.fancybox-overlay-new select[name="form_dropdown_hours"]').removeAttr('disabled').trigger('refresh');
                    $('.fancybox-overlay-new select[name="form_dropdown_minutes"]').removeAttr('disabled').trigger('refresh');
                    $('.fancybox-overlay-new select[name="form_dropdown_hours"]').children().each(function(){
                        if ($(this).val() == '119' || $(this).val() == '127' || $(this).val() == '128' || $(this).val() == '149') {
                            $(this).attr('disabled','disabled').trigger('refresh');
                        }
                    });
                } else if ($(this).val() == '567') {
                    $('.fancybox-overlay-new select[name="form_dropdown_hours"]').attr('disabled','disabled').trigger('refresh');
                    $('.fancybox-overlay-new select[name="form_dropdown_minutes"]').attr('disabled','disabled').trigger('refresh');
                } else {
                    $('.fancybox-overlay-new select[name="form_dropdown_hours"]').removeAttr('disabled').trigger('refresh');
                    $('.fancybox-overlay-new select[name="form_dropdown_minutes"]').removeAttr('disabled').trigger('refresh');
                    $('.fancybox-overlay-new select[name="form_dropdown_hours"]').children().removeAttr('disabled').trigger('refresh');
                    //$('input[name="form_dropdown_hours"]').children('option').first().attr('disabled','disabled');
                }
            });
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
                axis:"y",
                autoDraggerLength: true
            });
        }
    });
    $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_day_of_week"]').children('option').last().attr('disabled','disabled').trigger('refresh');
    $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_hours"]').attr('disabled','disabled').trigger('refresh');
    $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_minutes"]').attr('disabled','disabled').trigger('refresh');
    $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_day_of_week"]').change(function(){
        $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_hours"]').val($('select[name="form_dropdown_hours"]').children('option').first().val()).trigger('refresh');
        $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_minutes"]').val($('select[name="form_dropdown_minutes"]').children('option').first().val()).trigger('refresh');
        if ($(this).val() == '581') {
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_hours"]').removeAttr('disabled').trigger('refresh');
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_minutes"]').removeAttr('disabled').trigger('refresh');
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_hours"]').children().each(function(){
                if ($(this).val() == '307' || $(this).val() == '309' || $(this).val() == '310' || $(this).val() == '318' || $(this).val() == '319') {
                    $(this).attr('disabled','disabled').trigger('refresh');
                }
            });
        } else if ($(this).val() == '575') {
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_hours"]').attr('disabled','disabled').trigger('refresh');
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_minutes"]').attr('disabled','disabled').trigger('refresh');
        } else {
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_hours"]').removeAttr('disabled').trigger('refresh');
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_minutes"]').removeAttr('disabled').trigger('refresh');
            $('form[name="traveluxe_feedback_form"] select[name="form_dropdown_hours"]').children().removeAttr('disabled').trigger('refresh');
            //$('input[name="form_dropdown_hours"]').children('option').first().attr('disabled','disabled');
        }
    });
    $('input[name="form_text_27"]').mask("OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO", {
        translation: {
            'O': {
                pattern: /[а-яА-Яa-zA-Z\s]/,
                optional: true
            }
        }}
    );
    $('input[name="form_text_28"]').mask('+000000000000000000000000');
});
/*
$(window).load(function(){
    var height = $(".main-filter").offset().top;
    var win_height = $(window).scrollTop();
    if (win_height < height) {
        $('html, body').animate({scrollTop: height},1000);
        return false;
    }
});*/
