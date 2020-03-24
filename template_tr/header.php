<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
IncludeTemplateLangFile(__FILE__);
$index = !!($APPLICATION->GetCurPage(false)=="/");
?>
<!DOCTYPE html>
<html>
<head>
    <title><?$APPLICATION->ShowTitle()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <? if($index) {?>
        <meta name='yandex-verification' content='7fb2c4db3cab49ab' />
        <meta name="google-site-verification" content="DkYljK-BECtzbhPShIcRtrBRC_rI9VfkDaw981IdBjc" />
        <meta name="yandex-verification" content="1cc8b9a8275eb98b" />
        <meta name="yandex-verification" content="9ece06faf59a1efb" />
        <meta name='wmail-verification' content='6b8a7aff5dfd9c2a61f61d9590745d02' />
    <? }
        $APPLICATION->AddHeadString('<!--[if lt IE 9]>');
        $APPLICATION->AddHeadString('<script src="/js/html5.js" type="text/javascript"></script>');
        $APPLICATION->AddHeadString('<![endif]-->');
        $APPLICATION->SetAdditionalCSS('https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,cyrillic');
        $APPLICATION->SetAdditionalCSS('https://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300&subset=latin,cyrillic');
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/base/jquery-ui-1.10.4.custom.min.css');
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/swiper.css');
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/style.css');
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/jquery.mCustomScrollbar.min.css');
        $APPLICATION->AddHeadScript('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
        $APPLICATION->AddHeadString('<script>!window.jQuery && document.write(\'<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery-1.10.2.min.js"><\/script>\');</script>');
        /*$page = $APPLICATION->GetCurPage();
        if(stristr($page, '/hotels/') > -1) {
            $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/bootstrap.min.css');
            $APPLICATION->AddHeadScript('http://online.sardinia3d.ru:8084/Scripts/jquery-3.2.1.min.js');
            $APPLICATION->AddHeadString('<script>!window.jQuery && document.write(\'<script src="http://online.sardinia3d.ru:8084/Scripts/jquery-3.2.1.min.js"><\/script>\');</script>');
        }else{
            $APPLICATION->AddHeadScript('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
            $APPLICATION->AddHeadString('<script>!window.jQuery && document.write(\'<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery-1.10.2.min.js"><\/script>\');</script>');
        }*/
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.validate.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.mask.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.touchSwipe.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.formstyler.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.jcarousel.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.countdown.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery-ui-1.10.4.custom.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/datepicker-ru.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/responsiveslides.min.js');
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/assets/css/fancybox/jquery.fancybox.css?v=2.1.5');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.fancybox.js?v=2.1.5');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/swiper.jquery.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.jscrollpane.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.matchHeight-min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/jquery.mCustomScrollbar.concat.min.js');
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/assets/js/main.js');
        CUtil::InitJSCore(Array("ajax"));
    /*
    link href='' rel='stylesheet' type='text/css'>
    <link href='' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>" media="screen, projection, print">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>" media="screen, projection, print">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>" media="screen, projection, print"*/
    /*
    <!--[if lt IE 9]>
    <script src="/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <!--script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->

    <!--<LINK rel="icon" href="/favicon.ico" type="image/x-icon">
    <LINK rel="shortcut icon" href="/favicon.ico" type="image/x-icon">-->
    */
    /*script type="text/javascript" src=""></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>" type="text/css" media="screen" />
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>"></script>
    <script>
        !window.jQuery && document.write('<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery-1.10.2.min.js"><\/script>');
    </script*/
    $APPLICATION->ShowHead();?>
</head>
<?$page = $APPLICATION->GetCurPage();?>
<body<?if($page!='/'){?> id="noindex_page"<?}?>>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?if ($_SESSION['POLITICS_AGREE'] !== 'Y'):?>
    <div class="header_politics">
        <div class="container">
            <div class="row">
                <p>Пользуясь сайтом https://www.tailortour.ru/, Вы автоматически принимаете <a target="_blank" href="/pravila-peredachi-i-obrabotki-personalnykh-dannykh/">правила передачи и обработки персональных данных</a>.</p>
                <span class="header_politics_hide"></span>
            </div>
        </div>
    </div>
<?endif;?>
<div class="header">
    <div class="container">
        <div class="row-1 row-3-sm">
            <div class="col">
                <div class="scroll_top">
                    <style type="text/css">
                        .scroll_top {
                            width: 52px;
                            height: 52px;
                            background: url("<?= SITE_TEMPLATE_PATH ?>/assets/img/up.png") no-repeat;
                            position: fixed;
                            right: 20px;
                            bottom: 20px;
                            z-index: 15;
                            cursor: pointer;
                        }
                        .scroll_top.scroll_top_hide {
                            display: none;
                        }
                        <?if($APPLICATION->GetCurDir() != '/'){?>
                        .main-filter {
                            display: none;
                        }
                        <?}?>
                    </style>
                    <script type="text/javascript">
                        $(function () {
                            var btn_scroll_top = $(".scroll_top");
                            btn_scroll_top.addClass("scroll_top_hide");
                            $(window).scroll(function () {
                                var scroll = $(window).scrollTop();
                                if (scroll > 0) {
                                    btn_scroll_top.removeClass("scroll_top_hide");
                                    $(".menu").css('position', 'fixed');
                                    $(".menu").css('z-index', '100');
                                    $(".menu").css('background-color', '#013f56');
                                    $(".menu").stop().animate({ top: "0px" }, 100);/*update 10.2017*/
                                } else {
                                    btn_scroll_top.addClass("scroll_top_hide");
                                    $(".menu").css('position', 'absolute');
                                    $(".menu").css('z-index', '5');
                                    $(".menu").css('background-color', 'transparent');
                                    var top = 70;
                                    if ($('.header_politics').outerHeight() > 0) {
                                        top += $('.header_politics').outerHeight();
                                    }
                                    $(".menu").stop().animate({ top: top+"px" }, 100);/*update 10.2017*/
                                }
                            });
                            btn_scroll_top.on("click", function () {
                                var body = $("html, body");
                                body.animate({scrollTop: 0}, '500', 'swing', function () {
                                });
                                return false;
                            });
                        });
                    </script>
                </div>
                <a href="/" class="logo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/tlogo.png" alt=""/>
                </a>
            </div>
            <div class="col without-padding">
                <ul class="top-menu">
                    <li>
                        <a href="/about/">О компании</a>
                    </li>
                    <li>
                        <a href="/contacts/">Контакты</a>
                    </li>
                    <li>
                        <a href="/agency/">Агентствам</a>
                    </li>
                    <li>
                        <a href="/tourists/">Туристам</a>
                    </li>
                    <!--<li>
                        <div class="header_right_link">
                            <?/* if ($USER->IsAuthorized()) { */?>
                                <a href="?logout=yes" class="login">Выйти</a>
                            <?/* } else { */?>
                                <a href="<?/*= SITE_DIR */?>login/" class="login">Войти</a>
                            <?/* } */?>
                        </div>
                    </li>-->
                </ul>
            </div>
            <div class="col">
                <div class="header-phone">
                    <div class="header-phone-select-city">
                        <?/*<span class="icon icon-header-phone"></span>*/?>
                        <span class="header-phone-city-name">
                            <span class="header-phone-name">Москва</span>
                            <div class="header_phone-city">
                                <ul>
                                    <li>
                                        <a href="#" data-number="<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header_phone_spb.php"), false);?>" class="roistat-spb-tel">Санкт-Петербург</a>
                                    </li>
                                    <li>
                                        <a href="#" data-number="<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header_phone_kaz.php"), false);?>" class="roistat-kzn-tel">Казань</a>
                                    </li>
                                    <li>
                                        <a href="#" data-number="<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header_phone_800.php"), false);?>" class="roistat-800-tel">Бесплатно по РФ</a>
                                    </li>
                                </ul>
                            </div>
                        </span>
                    </div>
                    <span class="header-phone-number roistat-msk-tel"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header_phone_msk.php"), false);?></span>
                    <br>
                    <span>пн-пт 10 -19, сб 11-17</span>
                    <?/*<span class="phone-request"><a href="/#index_feedback_phone">Заказать обратный звонок</a></span>*/?>
                </div>
            </div>
        </div>
        <style type="text/css">
            .header {
                height: 70px;
            }
            span.alert_span {
                color: white;
                display: block;
                width: 100%;
                margin-left: 0;
                line-height: 10px;
                font-size: 11px;
                margin-top: -10px;
                text-align: right;
            }
            a.alert_span {
                z-index: 1000;
                position: relative;
                color: #fff;
                top: -20px;
            }
        </style>
        <?/*<a target="_blank" href="https://www.inflottravel.ru/news/article/1194269.html" class="alert_span">
            График работы офисов Инфлот в период новогодних праздников
        </a>*/?>
    </div>
</div>
<? if (CSite::InDir('/booking/')) {}else{ ?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"banner_index",
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
		"COMPONENT_TEMPLATE" => "banner_index",
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
		"IBLOCK_ID" => "25",
		"IBLOCK_TYPE" => "banner_index",
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
			0 => "LINK",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"FILE_404" => ""
	),
	false
);?>
    <div class="menu">
        <div class="container without-padding">
            <div class="menu-list-title for-mobile">
                <span class="icon icon-menu"></span>
                МЕНЮ
            </div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "undertop", array(
                "ROOT_MENU_TYPE" => "undertop",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "36000001",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MAX_LEVEL" => "2",
                "CHILD_MENU_TYPE" => "uundertop",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y"
            ),
                false
            );?>
            <ul class="menu-list" id="menu-list" style="display: none;">
                <li>
                    <a href="/countries/">Страны</a>
                    <ul class="under_menu">
                        <li><a href="/countries/avstriya/">Австрия</a></li>
                        <li><a href="/countries/velikobritaniya/">Великобритания</a></li>
                        <li><a href="/countries/gretsiya/">Греция</a></li>
                        <li><a href="/countries/izrail/">Израиль</a></li>
                        <li><a href="/countries/ispaniya/">Испания</a></li>
                        <li><a href="/countries/kipr/">Кипр</a></li>
                        <li><a href="/countries/mavrikiy/">Маврикий</a></li>
                        <li><a href="/countries/maldivy/">Мальдивы</a></li>
                        <li><a href="/countries/seyshely/">Сейшелы</a></li>
                        <li><a href="/countries/ssha/">США</a></li>
                        <li><a href="/countries/frantsiya/">Франция</a></li>
                        <li><a href="/countries/shveytsariya/">Швейцария</a></li>
                        <li><a href="/countries/oae/">ОАЭ</a></li>
                        <li><a href="/countries/yuar/">ЮАР</a></li>
                    </ul>
                </li>
                <!--li>
                    <a href="/special-offers/">Спецпредложения</a>
                </li-->
                <li>
                    <a href="/tours/">Туры</a>
                    <ul class="under_menu">
                        <li><a href="/tours/?SID=251">SPA и релакс</a></li>
                        <li><a href="/tours/?SID=250">Вино и гастрономия</a></li>
                        <li><a href="/tours/?SID=263">Все включено</a></li>
                        <li><a href="/tours/?SID=247">Горные лыжи</a></li>
                        <li><a href="/tours/?SID=255">Групповые экскурсионные туры</a></li>
                        <li><a href="/tours/?SID=254">Индивидуальные экскурсионные туры</a></li>
                        <li><a href="/tours/?SID=248">Новогодние туры </a></li>
                        <li><a href="/tours/?SID=257">Отдых с детьми</a></li>
                        <li><a href="/tours/?SID=256">Пляжный отдых</a></li>
                        <li><a href="/tours/?SID=246">Событийные туры </a></li>
                        <li><a href="/tours/?SID=252">Туры на weekend</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/hotels/">Отели</a>
                    <ul class="under_menu">
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=97&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Австрия</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=99&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Великобритания</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=86&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Греция</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=109&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Израиль</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=95&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Испания</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=153&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Маврикий</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=112&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Мальдивы</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=185&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Сейшелы</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=80&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">США</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=87&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Франция</a></li>
                        <li><a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=92&arrFilter_pf%5BCITY%5D=&set_filter=Фильтр">Швейцария</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Услуги</a>
                    <ul class="under_menu">
                        <li><a href="">Online бронирование</a></li>
                        <li><a href="/visa/">Визы</a></li>
                        <li><a href="">Авиаперелет</a></li>
                        <li><a href="/tickets/">ЖД билеты</a></li>
                        <li><a href="">Страхование</a></li>
                        <!--<li><a href="https://click-car.ru" target="_blank">Аренда машин</a></li>-->
                    </ul>
                </li>
                <li>
                    <a href="/vipservice/">VIP Сервис</a>
                    <ul class="under_menu">
                        <li><a href="">VIP сервис в аэропортах Москвы</a></li>
                        <li><a href="">VIP сервис в аэропортах Мира</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/agency/register-online.php">Личный кабинет</a>
                    <ul class="under_menu">
                        <li><a href="/agency/">Договор </a></li>
                        <li><a href="/agency/register-online.php" class="current">Регистрация on-line </a></li>
                        <li><a href="/agency/payments-methods.php">Формы оплаты </a></li>
                        <li><a href="/agency/seminars.php">Семинары </a></li>
                        <li><a href="/agency/webinars.php">Вебинары </a></li>
                        <li><a href="/agency/adv-tours.php">Рекламные туры </a></li>
                        <li><a href="/agency/health-insurance-terms.php">Медицинское страхование </a></li>
                        <li><a href="/agency/travel-cancellation-expenses.php">Страхование от невыезда </a></li>
                        <li><a href="/agency/subscribe-to-newsletter.php">Подписка на рассылку </a></li>
                        <li><a href="/agency/quality-control.php">Контроль качества </a></li>
                        <li><a href="/agency/order-visit.php">Заказать визит </a></li>
                    </ul>
                    <? /* if (!$USER->IsAuthorized()) { ?>
                    <a href="#" class="open-popup" data-popup="popup-login" id="login-link">Личный кабинет</a>
                    <? } else { ?>
                    <a href="/agency/register-online.php">Личный кабинет</a>
                    <? } */ ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="service-menu-block">
        <div class="service-menu-block-inner">
            <div class="service-menu">
                <div class="service-menu-title">
                    <p>TailorTour</p>
                    <p>Услуги</p>
                </div>
                <div class="service-menu-hide">
                    <ul class="service-menu-list">
                        <li>
                            <a href="/feedback/">Обратный звонок</a>
                        </li>
                        <li>
                            <a href="/send-request/">Отправить запрос</a>
                        </li>
                        <li>
                            <a href="/vipservice/">VIP услуги</a>
                        </li>
                        <li>
                            <a href="/contacts/">Контакты</a>
                        </li>
                    </ul>
                    <div class="service-sep"></div>
                    <ul class="service-menu-list">
                        <li>
                            <a href="/agency/">Агентствам</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?
    $dir = $APPLICATION->GetCurDir();
    if($dir == '/'){
        $display = 'block';
    }else{
        $display = 'none';
    }
    ?>
    <div class="container relative" style="display:<?=$display?>" data-display="<?=$dir?>">
        <div class="main-filter">
            <style type="text/css">
                .main-filter {
                    width: 240px;
                    position: absolute;
                    bottom: 90px;
                    left: 0;
                }
                .main-filter .input_wrapper {
                    width: 100%;
                    margin-bottom: 10px;
                }
            </style>
            <div class="h2">Быстрый поиск</div>
            <?
            if ($_SESSION['typeOfUser'] == 'b2b') {
                $action = '/booking/';
            } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                $action = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx';
            } else {
                $action = '/booking/';
            }
            ?>
            <form  action="<?=$action?>" target="_blank" method="get">
                <input type="hidden" name="departFrom" value="975">

                <?/*<input type="hidden" name="dateTo" id="dateTo" value="2016-05-01">*/?>
                <input type="hidden" name="adults" value="2">
                <input type="hidden" name="childs" value="0">
                <input type="hidden" name="pageSize" value="20">
                <input type="hidden" name="hotelQuotaMask" value="5">
                <input type="hidden" name="aviaQuotaMask" value="5">
                <input type="hidden" name="mainOnly" value="0">

                <div class="row-1">
                    <div class="input_wrapper">
                        <select name="country" class="custom-select" data-placeholder="Направление">
                            <option></option>
                            <?php // список стран
                            CModule::IncludeModule('iblock');
                            $obRes = CIblockSection::GetList(array("NAME"=>"ASC"),array("IBLOCK_ID"=>27,'GLOBAL_ACTIVE'=>'Y'),false,array("NAME","ID","UF_MASTER_SECTION_ID"));
                            while($arContry = $obRes->Fetch()){
                                if($arContry[UF_MASTER_SECTION_ID]>0 && $arContry[NAME]){?>
                                    <option value="<?=$arContry[UF_MASTER_SECTION_ID]?>"><?=$arContry[NAME]?></option>
                                <?}
                                // print_pre($arContry,1);
                            }/*
                        ?>
                        <option value="29">Греция</option>
                        <option value="729">Израиль</option>
                        <option value="6302">Иордания</option>
                        <option value="84">Испания</option>
                        <option value="10">Кипр</option>
                        <option value="960">Мальдивы</option>
                        <option value="22">Португалия</option>
                        <option value="6301">Сейшелы</option>
                        <option value="7">США</option>
                        <option value="30">Франция</option>
                        <? */ ?>
                        </select>
                    </div>
                    <div class="input_wrapper">
                        <input type="text" name="dateFrom" placeholder="Дата заезда" class="main-filter-datapicker datapicker datapicker_from"/>
                    </div>

                    <div class="input_wrapper">
                        <input type="text" name="dateTo" placeholder="Дата выезда" class="main-filter-datapicker datapicker datapicker_to"/>
                    </div>

                    <div class="input_wrapper">
                        <input type="submit" class="btn btn-red btn-100" value="найти"/>
                    </div>
                </div>
            </form>
            <div class="find_tour_b find_tour_b_form find_tour_b_main-filter">
                <div class="find_tour_title">
                    Кто я?
                </div>
                <div class="find_tour_list">
                    <form class="find_tour_item" action="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx" method="get">
                        <input type="hidden" name="departFrom" value="975">
                        <input type="hidden" name="dateTo" value="2016-05-01">
                        <input type="hidden" name="adults" value="2">
                        <input type="hidden" name="childs" value="0">
                        <input type="hidden" name="pageSize" value="40">
                        <input type="hidden" name="country" value="">
                        <input type="hidden" name="TourType" value="">
                        <input type="hidden" name="dateFrom" value="">
                        <input type="hidden" name="hotelQuotaMask" value="5">
                        <input type="hidden" name="aviaQuotaMask" value="5">
                        <input type="hidden" name="typeOfUser" value="b2c">
                        <input type="submit" value="Я частное лицо">
                    </form>
                    <form class="find_tour_item" action="http://www.tailortour.ru/booking/" method="get">
                        <input type="hidden" name="departFrom" value="0">
                        <input type="hidden" name="dateTo" value="2016-05-01">
                        <input type="hidden" name="adults" value="2">
                        <input type="hidden" name="childs" value="0">
                        <input type="hidden" name="pageSize" value="40">
                        <input type="hidden" name="country" value="">
                        <input type="hidden" name="TourType" value="">
                        <input type="hidden" name="dateFrom" value="">
                        <input type="hidden" name="hotelQuotaMask" value="5">
                        <input type="hidden" name="aviaQuotaMask" value="5">
                        <input type="hidden" name="typeOfUser" value="b2b">
                        <input type="submit" value="Я агент">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<? } ?>
<?/*<div style="margin: 40px auto; width: 400px;text-align: center;">
    <br>
    <br>
    <span style="font-size: 16px; font-weight: bold">
        Приносим свои извинения, по техническим причинам сайт временно не работает.
        <br>
        По вопросам бронирования обращаться:
    </span>
    <br>
    <span style="font-size: 16px; font-weight: bold">+7(495) 662-37-36 ( доб.1501)</span>
    <br>
    <a href="mailto:fit5@inflottravel.com" style="font-size: 16px; font-weight: bold">e-mail: fit5@inflottravel.com</a>
</div>*/?>
<? if (!CSite::InDir('/index.php')) { ?>

<div class="container">
    <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "",Array(
            "START_FROM" => "0",
            "PATH" => "",
            "SITE_ID" => "s2"
        )
    );?>
    <?$APPLICATION->ShowViewContent("excursion-order")?>
    <h1>
        <? if ($_REQUEST['ELEMENT_ID'] > 0) { ?>
        <?$APPLICATION->ShowTitle(false)?>
        <? } else { ?>
        <?$APPLICATION->ShowTitle()?>
        <? } ?>
    </h1>
</div>
<? } ?>
<? if ($APPLICATION->GetDirProperty("text_mode") == 'Y') { ?>
<div class="container without-padding">
    <div class="page">
        <? if ($APPLICATION->GetDirProperty("show_menu") == 'Y') { ?>
        <div class="left-sidebar">
            <div class="left-sidebar-icon-menu for-mobile">
                <span class="icon icon-menu"></span>
            </div>
            <p class="left-sidebar-menu-title"><?$APPLICATION->ShowTitle()?></p>
            <?
            $dir = $APPLICATION->GetCurDir();
            if($dir == '/agency/'){?>
                <?$APPLICATION->IncludeComponent("bitrix:menu", "agency", array(
                    "ROOT_MENU_TYPE" => "inner",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "36000000",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(
                    ),
                    "MAX_LEVEL" => "2",
                    "CHILD_MENU_TYPE" => "",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                    false
                );?>
            <?}else{?>
                <?$APPLICATION->IncludeComponent("bitrix:menu", "inner", array(
                    "ROOT_MENU_TYPE" => "inner",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "36000000",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(
                    ),
                    "MAX_LEVEL" => "2",
                    "CHILD_MENU_TYPE" => "",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                    false
                );?>
            <?}?>
        </div>
        <? } ?>
        <div class="page-content">
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                    "AREA_FILE_SHOW" => "sect",
                    "AREA_FILE_SUFFIX" => "main_text",
                    "AREA_FILE_RECURSIVE" => "Y",
                    "EDIT_TEMPLATE" => "standard.php"
                )
            );?>
<? } ?>
