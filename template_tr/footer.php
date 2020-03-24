<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
IncludeTemplateLangFile(__FILE__);
?>

<? if ($APPLICATION->GetDirProperty("text_mode") == 'Y') { ?>
    </div>
    </div>
    </div>
<? } ?>

<?
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"vip_index",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "vip_index",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "26",
		"IBLOCK_TYPE" => "traveluxe_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Туры",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"FILE_404" => ""
	),
	false
);
?>

<footer>
    <div class="container">
        <div class="row-footer">
            <div class="col">
                <p class="footer-title">Контакты</p>
                <div class="row-1 row-4-sm">
                    <div class="col footer-contact-item">
                        <p>Москва</p>
                        <p class="roistat-msk-tel">+7 (495) 662-37-36</p>
                        <p>+7 (495) 120-07-80 </p>
                        <p><a href="mailto:fit@inflottravel.com">fit@inflottravel.com</a></p>
                    </div>
                    <div class="col footer-contact-item">
                        <p>Санкт-Петербург</p>
                        <p class="roistat-spb-tel">+7 (812) 702-07-70</p>
                        <p><a href="mailto:cruise@inflottravel.com">cruise@inflottravel.com</a></p>
                    </div>
                    <div class="col footer-contact-item">
                        <p>Казань</p>
                        <p class="roistat-kzn-tel">+7 (843) 570-53-30</p>
                        <p><a href="mailto:kazan@inflottravel.com">kazan@inflottravel.com</a></p>
                    </div>
                    <div class="col footer-contact-item">
                        <p>По России*</p>
                        <p class="roistat-800-tel">+7 (800) 500-81-72</p>
                        <p>*Звонок бесплатный</p>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <div class="col">
                <div class="footer-sep">
                    <p class="footer-title">Курс валют</p>
<? $master = new CMainMaster(); ?>
                    <div class="footer-contact-item">
                        <p><?= date('d.m.Y') ?>:</p>
                        <p>USD - <?= round($master->getCource(), 4) ?></p>
                        <p>EUR - <?= round($master->getCource('EUR'), 4) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-footer">
            <div class="col">
                <ul class="footer-menu">
                    <?
                    if ($_SESSION['typeOfUser'] == 'b2b') {
                        $link = '/booking/';
                    } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                        $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx';
                    } else {
                        $link = 'javascript:void(0);';
                    }
                    ?>
                    <li>
                        <a class="online_order_link" href="<?=$link?>">Бронирование</a>
                    </li>
                    <li>
                        <a href="/countries/">Направления</a>
                    </li>
                    <li>
                        <a href="u/hotels/">Отели</a>
                    </li>
                    <li>
                        <a href="#index_personal_manager">ОБРАТНАЯ СВЯЗЬ</a><!-- ЧАСТНЫЕ ПОЕЗДКИ – меняем на ОБРАТНАЯ СВЯЗЬ со ссылкой на поле обратной связи -->
                    </li>
                    <!--li>
                        <a href="/services/">УСЛУГИ</a>
                    </li-->
                    <li>
                        <a href="/specialoffers">СПЕЦПРЕДЛОЖЕНИЯ </a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <div><style>
                        .social_links a {
                            float: left;
                            margin: 8px 10px;
                            display: block;
                            width: 26px;
                            height: 26px;
                            background: transparent;
                            color: #fff;
                            border-radius: 50%;
                        }
                    </style>
                    <div class="footer-contact-item social_links">
                        <noindex>
                            <a target="_blank" href="https://vk.com/club17952934" class="vk_link" style="background: url('/local/templates/s3d/assets/img/vk.png') no-repeat center center #4975a0;" title="Vkontakte"></a>
                            <a target="_blank" href="https://www.facebook.com/Tailor.Tour.Inflot/" class="fb_link" style="background: url('/local/templates/s3d/assets/img/fb.png') no-repeat center center #3c5793;" title="Facebook"></a>
                            <a target="_blank" href="https://instagram.com/inflot_cruises?ref=badge" class="ig_link" style="background: url('/local/templates/s3d/assets/img/ig.png') no-repeat center center" title="Instagram"></a>
                        </noindex>
                        <div class="clear"></div>
                    </div></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row-footer">
            <div class="col">
                <span style="text-transform: uppercase; font-size: 18px;">Наши проекты:</span>
                <ul class="footer-menu">
                    <!--<li><a href="https://www.inflottravel.ru" target="_blank">inflottravel.ru</a></li>
                    <li><a href="https://www.inflottravel.ru/navigator/index.php?set_filter=Y&amp;CS=Y&amp;ORDER[DEPARTURE_DATE]=ASC&amp;FILTER[GEOGRAPHIC_AREA_ID][]=&amp;FILTER[CRUICE_LINE][]=RCC&amp;FILTER[CRUICE_LINE][]=CEL&amp;FILTER[CRUICE_LINE][]=AZA&amp;FILTER[CRUICE_LINE][]=COSTA&amp;FILTER[PORT_ID][]=&amp;FILTER[SHIP_ID][]=&amp;DEP_DATE[FROM]=&amp;DEP_DATE[TO]=&amp;CRUISE_LENGTH=" target="_blank">КРУИЗ СКАНЕР</a></li>
                    <li><a href="https://www.sardinia3d.ru/" title="sardinia3d.ru" alt="sardinia3d.ru" target="_blank">sardinia3d.ru</a></li>-->

                    <li class="logo_img"><a href="https://www.inflottravel.ru" target="_blank"><img class="logo_img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/Inflot_34px.png"/></a></li>
                    <li class="logo_img"><a href="https://www.inflottravel.ru/navigator/" target="_blank"><img class="logo_img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/CruiseScanner_34px.png"/></a></li>
                    <li class="logo_img"><a href="https://www.sardinia3d.ru/" title="sardinia3d.ru" alt="sardinia3d.ru" target="_blank"><img class="logo_img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/Sardinia_3D_34px.png"/></a></li>
                </ul>
            </div>
        </div>
    </div>

    <? /* div class="container" style="margin-top: -5px; margin-bottom: 10px; padding-bottom: 5px;">
        <p class="footer_title" style="font-size: 16px;text-transform: uppercase;font-family: playfair_displayregular;color:#ffffff;">
            Наши проекты:
            <a href="https://www.inflottravel.ru" target="_blank">inflottravel.ru</a>
            <a href="https://www.inflottravel.ru/navigator/index.php?set_filter=Y&amp;CS=Y&amp;ORDER[DEPARTURE_DATE]=ASC&amp;FILTER[GEOGRAPHIC_AREA_ID][]=&amp;FILTER[CRUICE_LINE][]=RCC&amp;FILTER[CRUICE_LINE][]=CEL&amp;FILTER[CRUICE_LINE][]=AZA&amp;FILTER[CRUICE_LINE][]=COSTA&amp;FILTER[PORT_ID][]=&amp;FILTER[SHIP_ID][]=&amp;DEP_DATE[FROM]=&amp;DEP_DATE[TO]=&amp;CRUISE_LENGTH=" target="_blank">КРУИЗ СКАНЕР</a>
            <!--a href="https://www.click-car.ru/" target="_blank">click-car.ru</a>   -->
            <a href="https://www.sardinia3d.ru/" title="sardinia3d.ru" alt="sardinia3d.ru" target="_blank">sardinia3d.ru</a>
        </p>
    </div*/ ?>
    <div class="container">
        <a href="/" class="logo-footer">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo-footer.png" alt=""/>
        </a>
        <span class="copyright">© <?= date("Y") ?>  ИНФЛОТ КРУЗЫ И ПУТЕШЕСТВИЯ: ПУТЕШЕСТВИЕ РУЧНОЙ РАБОТЫ!</span>
        <p style="font-size: 12px;">
            Все права на материалы, опубликованные на сайте <a href="https://tailortour.ru/" title="tailortour.ru" alt="tailortour.ru" style="font-weight: bold;">tailortour.ru</a>,
            принадлежат компании "Инфлот круизы и путешествия" и охраняются в соответствии с законодательством РФ.
            Использование материалов, опубликованных на сайте <a href="https://tailortour.ru/" title="tailortour.ru" alt="tailortour.ru" style="font-weight: bold;">tailortour.ru</a>
            допускается только с письменного разрешения правообладателя и с обязательной прямой гиперссылкой на страницу, с которой материал заимствован.
            Гиперссылка должна размещаться непосредственно в тексте, воспроизводящем оригинальный материал <a href="https://tailortour.ru/" title="tailortour.ru" alt="tailortour.ru" style="font-weight: bold;">tailortour.ru</a>
            до или после цитируемого блока.
        </p>
    </div>
</footer>

<?//global $USER;
//if ($USER->IsAuthorized() && in_array($USER->GetID(), array(47,43,1))):?>
    <div class="fast_change_tour_link_b">
        <div class="fast_change_tour_link_b_pulse"></div>
        <a class="fast_change_tour_link" href="#">Быстрый подбор тура</a>
    </div>
<?//endif;?>

<? if (!CSite::InDir('/index.php')) { ?>
<script>
    $(window).load(function(){
        var height = $(".main-filter").offset().top;
        var win_height = $(window).scrollTop();
        if (win_height < height) {
            $('html, body').animate({scrollTop: height},1000);
            return false;
        }
    });
</script>
<? } ?>
<?print_pre($_SESSION['typeOfUser'],1)?>
<!-- GoogleAnalytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-88519650-4', 'auto');
    ga('send', 'pageview');

</script>
<!-- GoogleAnalytics -->
<?/*<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter37588745 = new Ya.Metrika({ id:37588745,params: {ip_adress: "<?=$_SERVER['REMOTE_ADDR']; ?>" }, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch (e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script> <noscript><div><img src="https://mc.yandex.ru/watch/37588745" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->*/?>
<script type="text/javascript">
    $(document).ready(function(){
        <?if (!isset($_SESSION['typeOfUser'])):?>
            $('.main-filter').find('.btn').click(function(){
                $.fancybox.open($('.find_tour_b_main-filter'),{
                    wrapCSS: 'fancybox-skin-new fancybox-find_tour_b',
                    padding: [40,40,40,40],
                    autoSize: true,
                    autoResize: true,
                    fitToView: true,
                    afterLoad: function(){
                        $('.find_tour_b_main-filter .find_tour_item input[name="country"]').val($('select[name="country"]').val());
                        $('.find_tour_b_main-filter .find_tour_item input[name="TourType"]').val($('select[name="TourType"]').val());
                        $('.find_tour_b_main-filter .find_tour_item input[name="dateFrom"]').val($('input[name="dateFrom"]').val());
                    },
                    beforeShow: function(){
                        $('.find_tour_b').parents('.fancybox-overlay').addClass('fancybox-overlay-new fancybox-overlay-find_tour');
                    },
                });
                return false;
            });
            $('.btn-link-order').click(function(){
                var dataID = $(this).data('id');
                //console.log(dataID);
                $.fancybox.open($('#find_tour_b_excursion-'+dataID),{
                    wrapCSS: 'fancybox-skin-new fancybox-find_tour_b',
                    padding: [40,40,40,40],
                    autoSize: true,
                    autoResize: true,
                    fitToView: true,
                    beforeShow: function(){
                        $('.find_tour_b').parents('.fancybox-overlay').addClass('fancybox-overlay-new fancybox-overlay-find_tour');
                    },
                });
            });
            $('.online_order_link').click(function(){
                $.fancybox.open($('.find_tour_b-online_order_link'),{
                    wrapCSS: 'fancybox-skin-new fancybox-find_tour_b',
                    padding: [40,40,40,40],
                    autoSize: true,
                    autoResize: true,
                    fitToView: true,
                    beforeShow: function(){
                        $('.find_tour_b-online_order_link').parents('.fancybox-overlay').addClass('fancybox-overlay-new fancybox-overlay-find_tour');
                    },
                });
            });
            $('.element_right_reserv').click(function(){
                var dataID = $(this).data('id');
                console.log(dataID);
                $.fancybox.open($('#find_tour_b_'+dataID),{
                    wrapCSS: 'fancybox-find_tour_b',
                    padding: [40,40,40,40],
                    autoSize: true,
                    autoResize: true,
                    fitToView: true,
                    beforeShow: function(){
                        $('.find_tour_b').parents('.fancybox-overlay').addClass('fancybox-overlay-find_tour');
                    },
                    afterShow: function(){
                        $('.fancybox-find_tour_b').find('.fancybox-close').html('<svg viewBox="-5 -5 50 50"><path style="stroke: #fff; fill: transparent; stroke-width: 5;" d="M 10,10 L 30,30 M 30,10 L 10,30"></path></svg>');
                    }
                });
            });
            $('.order_room > form').find('.btn_room_order').click(function(){
                $.fancybox.open($('.find_tour_b_form_spec'),{
                    wrapCSS: 'fancybox-find_tour_b',
                    padding: [40,40,40,40],
                    autoSize: true,
                    autoResize: true,
                    fitToView: true,
                    afterLoad: function(){
                                            $('.find_tour_b_form_spec .find_tour_item input[name="childs"]').val($('.order_room select[name="childs"]').val());
                        $('.find_tour_b_form_spec .find_tour_item input[name="adults"]').val($('.order_room select[name="adults"]').val());
                        $('.find_tour_b_form_spec .find_tour_item input[name="hotel"]').val($('.order_room select[name="hotel"]').val());
                        $('.find_tour_b_form_spec .find_tour_item input[name="dateFrom"]').val($('.order_room input[name="dateFrom"]').val());
                    },
                    beforeShow: function(){
                        $('.find_tour_b').parents('.fancybox-overlay').addClass('fancybox-overlay-find_tour');
                    },
                    afterShow: function(){
                        $('.fancybox-find_tour_b').find('.fancybox-close').html('<svg viewBox="-5 -5 50 50"><path style="stroke: #fff; fill: transparent; stroke-width: 5;" d="M 10,10 L 30,30 M 30,10 L 10,30"></path></svg>');
                    }
                });
                return false;
            });
            $('.find_tour_item input[type="submit"]').click(function(e){
                e.preventDefault();
                var thisForm = $(this).parent('form'),
                    type = $(this).prev('input[name="typeOfUser"]').val();
                $.ajax({
                    url: '/local/php_interface/ajax/typeOfUser.php',
                    data: 'type='+type,
                    success: function(data){
                        console.log(data);
                        //return false;
                        thisForm.submit();
                    },
                });
                return false;
            });
            $('.find_tour_item a').click(function(e){
                e.preventDefault();
                var thisHref = $(this).attr('href');
                    type = $(this).prev('.typeOfUser').attr('data-value');
                    console.log(type);
                $.ajax({
                    url: '/local/php_interface/ajax/typeOfUser.php',
                    data: 'type='+type,
                    success: function(data){
                        console.log(data);
                        //return false;
                        window.location.href = thisHref;
                    },
                });
                return false;
            });
        <?endif;?>
    });
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(46293162, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/46293162" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '59186125c8de6268407d9ff7c2ee8806');
</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'WjKOX98Bsf';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
<!-- BEGIN JIVOSITE INTEGRATION WITH ROISTAT -->
<script type='text/javascript'>
var getCookie = window.getCookie = function (name) {
    var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
return matches ? decodeURIComponent(matches[1]) : undefined;
};
function jivo_onLoadCallback() {
    jivo_api.setUserToken(getCookie('roistat_visit'));
    }
</script>
<!-- END JIVOSITE INTEGRATION WITH ROISTAT --> 
<noscript><div><img src="https://mc.yandex.ru/watch/46293162" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?/**/?>
<?/*<script data-skip-moving="true">
    (function(w,d,u,b){
        s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;
        h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://b24.inflot.travel/upload/crm/site_button/loader_7_3spnc3.js');
</script>*/?>
</body>
</html>
