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
$this->setFrameMode(true);?>
<?
global $arrFilter_pf;
if(!empty($_REQUEST["arrFilter_pf"]["COUNTRY"])){
    $arrFilter_pf["arrFilter_pf"]["COUNTRY"] = $_REQUEST["arrFilter_pf"]["COUNTRY"];
}
?>
<link href="/specialoffers/style.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="/specialoffers/script.js"></script>
<?
global $arrFilter_best_top;
$arrFilter_best_top['PROPERTY_action']["ACTIVE"] = 'Y';
$arrFilter_best_top['PROPERTY_COUNTRY'] = $_REQUEST["arrFilter_pf"]["COUNTRY"];
global $arrFilter_type;
if(empty($arrFilter_type)){
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "best_top",
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
        "COMPONENT_TEMPLATE" => "best_top",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "active",
            1 => "hotel",
        ),
        "FILTER_NAME" => "arrFilter_best_top",
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
            0 => "active",
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
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "RAND",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "FILE_404" => ""
    ),
    $component
);?>
<?}else{?>
    <br>
<?}?>
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
        <?$countryId = $_REQUEST["arrFilter_pf"]["COUNTRY"];
        if($countryId){?>
            <div class="breadcrumbs_el table-cell">
                <?if ($countryId > 0) {
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
        <?}?>
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
        <!--<div class="spo_banner_padding">
            <div class="spo_banner1">
                <ul>
                    <li style="background-image: url('/upload/resize_cache/iblock/ee0/200_164_2/107823583.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/3f6/200_164_2/romdt_main01_r.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/ee0/200_164_2/107823583.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/3f6/200_164_2/romdt_main01_r.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/ee0/200_164_2/107823583.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/3f6/200_164_2/romdt_main01_r.jpg')"><a href="" title=""></a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="spo_banner2">
                <ul>
                    <li style="background-image: url('/upload/resize_cache/iblock/3f6/200_164_2/romdt_main01_r.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/ee0/200_164_2/107823583.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/3f6/200_164_2/romdt_main01_r.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/ee0/200_164_2/107823583.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/3f6/200_164_2/romdt_main01_r.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/ee0/200_164_2/107823583.jpg')"><a href="" title=""></a></li>
                    <li style="background-image: url('/upload/resize_cache/iblock/3f6/200_164_2/romdt_main01_r.jpg')"><a href="" title=""></a></li>
                </ul>
            </div>
        </div>-->
    </div>
    <div class="page-100 page-content">
        <?
        global $arrFilter_type;
        if(!empty($arrFilter_type)){
            $id_spo_block = $arrFilter_type[0];
            $Spo_blocks = CIblockSection::GetList(array(), array('IBLOCK_ID' => 77,'ACTIVE' => 'Y', 'ID' => $id_spo_block), false, array("ID", "NAME"));
            $app_template = 'hotel_block_type';
        }else{
            $Spo_blocks = CIblockSection::GetList(array(), array('IBLOCK_ID' => 77,'ACTIVE' => 'Y'), false, array("ID", "NAME"));
            $app_template = 'hotel';
        }
        while ($arSpo_block = $Spo_blocks->GetNext()){
            $arsposectionid = $arSpo_block["ID"];
            $arsposectionname = $arSpo_block["NAME"];
            global $arrFilter_hotel;
            $arrFilter_hotel['PROPERTY_SPO_BLOCK'] = array($arsposectionid);
            $arrFilter_hotel['PROPERTY_COUNTRY'] = $_REQUEST["arrFilter_pf"]["COUNTRY"];
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "$app_template",
                Array(
                    "USE_FILTER" => "Y",
                    "BLOCK_HEAD" => $arsposectionname,
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "NEWS_COUNT" => 1000,
                    "SORT_BY1" => $arParams["SORT_BY1"],
                    "SORT_ORDER1" => $arParams["SORT_ORDER1"],
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
                    "FILTER_NAME" => "arrFilter_hotel",
                    "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                    "CHECK_DATES" => "N",
                    "TITLE" => 'отелям'
                ),
                $component
            );
            ?>
        <?}?>
    </div>
    <div style="clear: both;"></div>
    <style type="text/css">
        .hotel-description b {
            display: block;
        }
    </style>
</div>
