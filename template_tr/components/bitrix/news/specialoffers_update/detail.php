<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$arFilter[CODE] = $arResult[VARIABLES][ELEMENT_CODE];
$arFilter[IBLOCK_ID] = $arParams[IBLOCK_ID];
$item = CIblockElement::GetList(array(),$arFilter)->Fetch();
$country = CIBlockElement::GetProperty($arParams[IBLOCK_ID], $item[ID], "name", "asc", Array("CODE"=>"COUNTRY"))->Fetch();
$countryId = $country[VALUE];
if ($countryId > 0) {
    $arCountry = CIblockSection::GetList(array(),array('IBLOCK_ID' => 27, 'ID' => $countryId))->Fetch();
    $countryCode = $arCountry['CODE'];
}
?>
<link href="/specialoffers/style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="/specialoffers/script.js"></script>
<br>
<div class="container without-padding">
    <div class="breadcrumbs_update table">
        <a href="/" class="breadcrumbs_el table-cell">Главная</a>
        <div class="breadcrumbs_el">
            <?$APPLICATION->IncludeComponent(
                "bitrix:catalog.filter",
                "",
                Array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
                    "PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                ),
                $component
            );
            ?>
        </div>
        <div class="breadcrumbs_el table-cell">
            <?php if ($countryId > 0) {
                $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $countryId), false, array("UF_NEW_YEAR", "UF_BOOKING_LINK", "UF_SKIING", "UF_MEMO", "UF_COUNTRY"))->Fetch();
                $newYear = $arCountry['UF_NEW_YEAR'];
                $newBooking_link = $arCountry['UF_BOOKING_LINK'];
                $newSkiing = $arCountry['UF_SKIING'];
                $countryCode = $arCountry['CODE'];
                $newMemo = $arCountry['UF_MEMO'];
                $arFile = CFile::GetFileArray($newMemo);
                $arWeddings = getWeddingTours($countryId);
                ?>
                <ul class="left-sidebar-menu">
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 22, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/specialoffers/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Спецпредложения</a></li>
                    <? } ?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 46, 'ACTIVE' => 'Y', 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li><a href="/flights/<?=$arVisa["CODE"];?>/">Авиаперелет</a></li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/free_nights_italy/">Бесплатные ночи</a></li>
                    <?}?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 37, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li><a href="/visa/<?=$arVisa["CODE"];?>/">Визы</a></li>
                    <? } ?>
                    <?php if ($newSkiing) { ?>
                        <li><a href="<?= $newSkiing ?>">Горные лыжи</a></li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/mountain_resort_italy/">Горнолыжные курорты</a></li>
                        <li><a href="/countries/city_italy/">Города</a></li>
                    <?}?>
                    <?if($countryId=='97'){?>
                        <li><a href="/countries/mountain_resort_austria/">Горнолыжные курорты</a></li>
                    <?}?>
                    <?if($countryId!='94'){?>
                        <? if($countryCode) {?>
                            <li><a href="/countries/<?=$countryCode?>/#country-city-list">Города и курорты</a></li>
                            <? if($arCountry1[DEPTH_LEVEL]==2 || $arCountry1[DEPTH_LEVEL]==1) { ?>
                                <?$APPLICATION->IncludeComponent("bitrix:news.list","list_items",Array(
                                        "DISPLAY_DATE" => "Y",
                                        "DISPLAY_NAME" => "Y",
                                        "DISPLAY_PICTURE" => "Y",
                                        "DISPLAY_PREVIEW_TEXT" => "Y",
                                        "AJAX_MODE" => "N",
                                        "IBLOCK_TYPE" => "traveluxe_content",
                                        "IBLOCK_ID" => "27",
                                        "NEWS_COUNT" => "20",
                                        "SORT_BY1" => "NAME",
                                        "SORT_ORDER1" => "ASC",
                                        "SORT_BY2" => "ID",
                                        "SORT_ORDER2" => "DESC",
                                        "FILTER_NAME" => "arFilterSight",
                                        "FIELD_CODE" => Array("ID"),
                                        "PROPERTY_CODE" => Array("DESCRIPTION"),
                                        "CHECK_DATES" => "Y",
                                        "DETAIL_URL" => "",
                                        "PREVIEW_TRUNCATE_LEN" => "",
                                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                        "SET_TITLE" => "N",
                                        "SET_BROWSER_TITLE" => "N",
                                        "SET_META_KEYWORDS" => "N",
                                        "SET_META_DESCRIPTION" => "N",
                                        "SET_LAST_MODIFIED" => "N",
                                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                        "ADD_SECTIONS_CHAIN" => "N",
                                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                        "PARENT_SECTION" => $arCountry1['ID'],
                                        "PARENT_SECTION_CODE" => "",
                                        "INCLUDE_SUBSECTIONS" => "N",
                                        "CACHE_TYPE" => "A",
                                        "CACHE_TIME" => "3600",
                                        "CACHE_FILTER" => "Y",
                                        "CACHE_GROUPS" => "N",
                                        "DISPLAY_TOP_PAGER" => "N",
                                        "DISPLAY_BOTTOM_PAGER" => "N",
                                        "PAGER_TITLE" => "Новости",
                                        "PAGER_SHOW_ALWAYS" => "N",
                                        "PAGER_TEMPLATE" => "",
                                        "PAGER_DESC_NUMBERING" => "N",
                                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                        "PAGER_SHOW_ALL" => "B",
                                        "PAGER_BASE_LINK_ENABLE" => "B",
                                        "SET_STATUS_404" => "B",
                                        "SHOW_404" => "B",
                                        "MESSAGE_404" => "",
                                        "PAGER_BASE_LINK" => "",
                                        "PAGER_PARAMS_NAME" => "arrPager",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "Y",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "TITLE" => $arResult['TITLE'],
                                    )
                                );?>
                            <? } ?>
                        <? } ?>
                    <?}?>
                    <?php $jdRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 36, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arJd = $jdRes->Fetch()) {?>
                        <li><a href="/tickets/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">ЖД билеты</a></li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/castles_romance_italy/">Замки и романтика</a></li>
                    <?}?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 45, 'PROPERTY_COUNTRY' => $countryId, "ACTIVE" => "Y"), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li>
                            <a href="/medicine/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Лечение</a>
                        </li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/sea_tour_italy/">Морские курорты</a></li>
                    <?}?>
                    <?if($countryId!='94'){?>
                        <? if($countryCode) {?>
                            <li><a href="/countries/<?=$countryCode?>/">О стране</a></li>
                        <?}?>
                    <?}?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/lakes_italy/">Озера</a></li>
                    <?}?>
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 32, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/hotels/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Отели</a></li>
                    <? } ?>
                    <?php if ($newMemo) { ?>
                        <li><a title="<?=$arFile['FILE_NAME'];?>" target="_blank" href="<?=$arFile['SRC'];?>">Памятка</a></li>
                    <? } ?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 64, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li>
                            <a href="/parks/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Парки развлечений</a>
                        </li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/early_booking_italy/">Раннее бронирование</a></li>
                    <?}?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 54, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li>
                            <a href="/weddings/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Свадебные туры</a>
                        </li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/spa_treatments_relaxation_italy/">Термы и СПА</a></li>
                    <?}?>
                    <?php $transRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 47, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arTrans = $transRes->Fetch()) {?>
                        <li>
                            <a href="/transfers/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Трансферы</a>
                        </li>
                    <? } ?>
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 23, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/tours/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Туры</a></li>
                    <? } ?>
                    <!-- Туры до/после круиза -->
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 75, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/tours-before-after-cruise/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Туры до/после круиза</a></li>
                    <? } ?>
                    <!-- Туры до/после круиза -->
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 29, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/excursions/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Экскурсии</a></li>
                    <? } ?>
                    <?php if ($newBooking_link) { ?>
                        <li><a href="<?= $newBooking_link ?>">Online-бронирование</a></li>
                    <? } ?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 48, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li>
                            <a href="/vip_countries/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">VIP-услуги</a>
                        </li>
                    <? } ?>
                </ul>
            <? } ?>
        </div>
    </div>
</div>
<div class="container without-padding">
    <div class="left-sidebar spo-left-sidebar">
        <div class="main-filter">
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
                            }?>
                        </select>
                    </div>
                    <div class="input_wrapper">
                        <input type="text" name="dateFrom" placeholder="Дата заезда" class="main-filter-datapicker datapicker"/>
                    </div>

                    <div class="input_wrapper">
                        <input type="text" name="dateTo" placeholder="Дата выезда" class="main-filter-datapicker datapicker"/>
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
        <div class="clear"></div>
    </div>
    <div class="page-100 page-content spo_detail" style="float: left;">
        <?$ElementID = $APPLICATION->IncludeComponent(
            "bitrix:news.detail",
            "",
            Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
                "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
                "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
                "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                "META_KEYWORDS" => $arParams["META_KEYWORDS"],
                "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
                "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
                "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
                "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                "SET_TITLE" => "",
                "MESSAGE_404" => $arParams["MESSAGE_404"],
                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                "SHOW_404" => $arParams["SHOW_404"],
                "FILE_404" => $arParams["FILE_404"],
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
                "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
                "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
                "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
                "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
                "CHECK_DATES" => "N",
                "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
                "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
                "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                "USE_SHARE" => $arParams["USE_SHARE"],
                "SHARE_HIDE" => $arParams["SHARE_HIDE"],
                "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
                "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
                "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
                "SEF_URL_TEMPLATES" => array(
                    "news" => "",
                    "section" => "",
                    "detail" => "#ELEMENT_CODE#/",
                )
            ),
            $component
        );?>
        <div class="">
            <?
            $el = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>22, "ID"=>$ElementID), false, array(), Array("PROPERTY_COUNTRY"))->GetNext();
            $Country = $el["PROPERTY_COUNTRY_VALUE"];
            global $arrFilter_detail;
            $arrFilter_detail['PROPERTY_COUNTRY'] = $Country;
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "hotel_spo_detail",
                Array(
                    "USE_FILTER" => "Y",
                    "COMPONENT_TEMPLATE" => "hotel",
                    "IBLOCK_TYPE" => "traveluxe_content",
                    "IBLOCK_ID" => 22,
                    "NEWS_COUNT" => 3,
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => $arParams["SORT_BY2"],
                    "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                    "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                    "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                    "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                    "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                    "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                    "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                    "SET_TITLE" => $arParams["SET_TITLE"],
                    "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                    "MESSAGE_404" => $arParams["MESSAGE_404"],
                    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                    "SHOW_404" => $arParams["SHOW_404"],
                    "FILE_404" => $arParams["FILE_404"],
                    "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                    "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                    "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                    "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                    "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                    "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                    "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                    "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                    "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                    "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                    "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                    "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                    "FILTER_NAME" => "arrFilter_detail",
                    "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                    "CHECK_DATES" => $arParams["CHECK_DATES"],
                    "TITLE" => ""
                ),
                $component
            );
            ?>
        </div>
        <a class="spo_all" href="/specialoffers/?arrFilter_pf%5BCOUNTRY%5D=<?=$Country?>&set_filter=Фильтр&set_filter=Y">ВСЕ спецпредложения&nbsp;&nbsp;&nbsp;&nbsp;<img src="/specialoffers/img/right_all.png"/></a>
    </div>
    <div class="clear"></div>
</div>