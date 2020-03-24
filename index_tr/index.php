<?
if($_REQUEST['email']){
    die;
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Подбор и организация индивидуального тура от ведущего агентства индивидуальных туров TailorTour. Лучшие цены, отели, маршруты и предложения индивидуальных экскурсий и туров по всему миру.");
$APPLICATION->SetPageProperty("keywords", "индивидуальные туры");
$APPLICATION->SetTitle("Индивидуальные туры, эксклюзивный и индивидуальный туризм от TailorTour");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");

?>

<?
/*
global $USER;
$group_id = 5; // редакторы
if(!in_array($group_id, $USER->GetUserGroupArray())){
    LocalRedirect('/countries/');
}
 * 
 */
?>


    <?/*
    global $arFilterSpo;
    $arFilterSpo['PROPERTY_SHOW_IN_INDEX'] = 'Y';?>
    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"special_offers", 
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
		"COMPONENT_TEMPLATE" => "special_offers",
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
		"FILTER_NAME" => "arFilterSpo",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "22",
		"IBLOCK_TYPE" => "traveluxe_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "hotel",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "RAND",
		"SORT_BY2" => "RAND",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"FILE_404" => ""
	),
	false
);*/?>
<?
global $USER;
$rsUserT = CUser::GetByID($USER->GetID());
$arUserT = $rsUserT->Fetch();
$display = 'none';
$u = $arUserT["ID"];
if($u == '11'){
    $display = 'block';
}
?>
<div class="special_offers_new">
    <?
    global $arFilterSpo2;
    $arFilterSpo2['PROPERTY_SHOW_IN_INDEX'] = 'Y';?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "special_offers_new",
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
            "COMPONENT_TEMPLATE" => "special_offers_new",
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
            "FILTER_NAME" => "arFilterSpo2",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "22",
            "IBLOCK_TYPE" => "traveluxe_content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "6",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "",
                1 => "hotel",
                2 => "",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "Y",
            "SET_TITLE" => "N",
            "SHOW_404" => "Y",
            "SORT_BY1" => "RAND",
            "SORT_BY2" => "RAND",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "FILE_404" => ""
        ),
        false
    );?>
</div>
<div class="clear"></div>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR."include/index_personal_manager.php"
    )
);?>
<div class="container without-padding white-bg">
    <?
    global $arFilterTours;
    $arFilterTours['!PROPERTY_show_archive'] = 'Y';?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "tours_index",
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
            "COMPONENT_TEMPLATE" => "tours_index",
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
            "FILTER_NAME" => "arFilterTours",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "23",
            "IBLOCK_TYPE" => "traveluxe_content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "6",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "PRICE",
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
            "SORT_ORDER2" => "ASC"
        ),
        false
    );?>
</div>
<!--<div class="container without-padding white-bg">
    <div class="page">
        <div class="page-content page-content-main">
            <div class="text text-block-padding">
                <span style="text-align: left;display: block;font-size: 30px;font-family: 'playfair_displayitalic';color: #015663;">График дежурств отдела бронирования на Новогодние праздники 2017</span>
                <br>
                <ul>
                    <li>
                        <p>
                            31 декабря (суббота) – выходной день, офис закрыт.
                        </p>
                    </li>
                    <li>
                        <p>
                            1 января (воскресенье) – выходной день, офис закрыт.
                        </p>
                    </li>
                    <li>
                        <p>
                            2 января (понедельник) – дежурный менеджер в офисе с 11.00 до 17.00.
                        </p>
                    </li>
                    <li>
                        <p>
                            3 января (вторник) – дежурный менеджер на экстренном телефоне.
                        </p>
                    </li>
                    <li>
                        <p>
                            4 января (среда) – дежурный  менеджер в офисе с 11.00 до 17.00.
                        </p>
                    </li>
                    <li>
                        <p>
                            5 января (четверг) – дежурный менеджер на экстренном телефоне.
                        </p>
                    </li>
                    <li>
                        <p>
                            6 января (пятница) – дежурный менеджер на экстренном телефоне.
                        </p>
                    </li>
                    <li>
                        <p>
                            7 января (суббота) – выходной день, офис закрыт.
                        </p>
                    </li>
                    <li>
                        <p>
                            8 января (воскресенье) – выходной день, офис закрыт.
                        </p>
                    </li>
                </ul>
                <p style="color: red;">В праздничные дни работает телефон для экстренной связи: +7 (926) 792-41-49.</p>
            </div>
        </div>
    </div>
</div>
-->
<?
global $arrFilterRecommended;
$arrFilterRecommended['PROPERTY_RECOMMENDED'] = 'Y';
?>
<?/*$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"recomended",
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
		"COMPONENT_TEMPLATE" => "recomended",
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
		"FILTER_NAME" => "arrFilterRecommended",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "32",
		"IBLOCK_TYPE" => "traveluxe_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "COUNTRY",
			1 => "CITY",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
	false
);*/?>
<?/*<div class="container without-padding white-bg">
    <div class="page">
        <div class="page-content page-content-main">
            <div class="text text-block-padding">
                <h2>Услуги по организации индивидуальных туров</h2>
                <p>Многообразие стран и отелей, впечатляющее количество индивидуальных
                    экскурсионных туров и персональных сервисов, прямые контракты с отельными структурами,
                    многолетний опыт специалистов по направлениям и, конечно персональный подход
                    к организации индивидуального отдыха для каждого клиента  это - TailorTour.
                    С нами вы легко организуете любые индивидуальные путешествия мечты в любую точку мира!</p>
            </div>
        </div>
    </div>
</div>
*/?>
<?/*<div class="container without-padding white-bg">
    <div class="page">
        <div class="page-content page-content-main">
            <div class="text text-block-padding">
                <h3>Спецпредложения, эксклюзивные туры</h3>
                <p>Благодаря многолетнему опыту работы в сфере индивидуальных путешествий,
                    TailorTour одним из первых получает спецпредложения,
                    скидки и информацию о бонусных акциях от отельеров и партнеров,
                    что позволяет весьма оперативно организовывать эксклюзивные туры по всему миру.
                    Подробнее ознакомиться с вариантами, ценами и выбрать спецпредложение по индивидуальным турам можно
                    <a href="/specialoffers/" class="style_link">здесь</a>.</p>
            </div>
        </div>
    </div>
</div>
*/?>
<?/*$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "tour",
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
        "CACHE_TIME" => "36000001",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "tour",
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
        "IBLOCK_ID" => "23",
        "IBLOCK_TYPE" => "traveluxe_content",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "1000",
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
            0 => "PRICE",
            1 => "COUNTRY",
            2 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC"
    ),
    false
);*/?>
<?/*<div class="container white-bg">
    <div class="row-1 row-personal-tour white-active-block">
        <div class="col">
            <p class="title-text">Индивидуальный тур</p>
            <p>Наш менеджер организует</p>
            <p>незабываемый отдых</p>
        </div>
        <div class="col">
            <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "your_wishes", array(
                "SEF_MODE" => "Y",
                "WEB_FORM_ID" => "6",
                "LIST_URL" => "",
                "EDIT_URL" => "",
                "SUCCESS_URL" => "",
                "CHAIN_ITEM_TEXT" => "",
                "CHAIN_ITEM_LINK" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "Y",
                "USE_EXTENDED_ERRORS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "SEF_FOLDER" => "/",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "COMPONENT_TEMPLATE" => "your_wishes"
            ),
                false,
                array(
                    "ACTIVE_COMPONENT" => "Y"
                )
            );?>

        </div>
    </div>
</div>*/?>
<?
global $arFilterNews;
$arFilterNews['!PROPERTY_show_archive'] = 'Y';?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news_index", 
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
		"COMPONENT_TEMPLATE" => "news_index",
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
        "FILTER_NAME" => "arFilterNews",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "24",
		"IBLOCK_TYPE" => "traveluxe_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36001",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
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
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "recomended4",
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
        "COMPONENT_TEMPLATE" => "recomended4",
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
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "53",
        "IBLOCK_TYPE" => "traveluxe_content",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "1",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "COUNTRY",
            1 => "CITY",
            2 => "RECOMMENDED1",
            3 => "RECOMMENDED2",
            4 => "RECOMMENDED3",
            5 => "RECOMMENDED4",
            6 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "N",
        "SHOW_404" => "Y",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "NAME",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC"
    ),
    false
);?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR."include/index_vip.php"
    )
);?>
<?/*$APPLICATION->IncludeComponent(
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
        "COMPONENT_TEMPLATE" => "tour",
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
            2 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC"
    ),
    false
);*/?>
<?/*$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "fmenu_right",
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
        "COMPONENT_TEMPLATE" => "tour",
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
        "IBLOCK_ID" => "74",
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
        "PAGER_TITLE" => "",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "menu_link",
            1 => "",
            2 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC"
    ),
    false
);*/?>
    <div class="container without-padding white-bg" style="margin-top: 30px;">
        <div class="page">
            <div class="page-content page-content-main">
                <div class="text text-block-padding">
                    <span class="h1">Индивидуальные туры ручной работы</span>
                    <p>TailorTour - путешествие ручной работы! Эксклюзивный отдых и индивидуальный туризм - наш основной профиль!
                        Проект TailorTour.ru призван подарить незабываемые впечатления от поистине индивидуального тура.
                        С самого начала планирования путешествия с туристом работает опытный персональный менеджер по направлению,
                        который квалифицированно и ответственно сориентирует по всем вопросам -
                        от выбора отеля до предоставления индивидуальных сервисов на курорте.</p>
                </div>
            </div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>