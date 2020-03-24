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
$arFilter[IBLOCK_ID] = $arParams[[IBLOCK_ID]];
$item = CIblockElement::GetList(array(),$arFilter)->Fetch();
$country = CIBlockElement::GetProperty($arParams[IBLOCK_ID], $item[ID], "sort", "asc", Array("CODE"=>"COUNTRY"))->Fetch();
$countryId = $country[VALUE];
if ($countryId > 0) {
    $arCountry = CIblockSection::GetList(array(),array('IBLOCK_ID' => 27, 'ID' => $countryId))->Fetch();
    $countryCode = $arCountry['CODE'];
}
?>
<div class="container without-padding">
    <div class="page">

        <div class="left-sidebar">
            <div class="left-sidebar-icon-menu for-mobile">
                <span class="icon icon-menu"></span>
            </div>
            <p class="left-sidebar-menu-title">Подобрать парк</p>
            <div class="left-sidebar-section">
                <div class="find-hotels">
                    <form class="find-hotels-form" method="get">
                        <input class="find-hotels-input" type="text" placeholder="Поиск по названию" name="q">
                        <input class="find-hotels-btn" type="submit" value="">
                    </form>
                </div>
            </div>
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
                <br>
                <p class="left-sidebar-menu-title">Гид по стране</p>
                <ul class="left-sidebar-menu">
                    <?php if ($newBooking_link) { ?>
                        <li><a href="<?= $newBooking_link ?>">Online-бронирование</a></li>
                    <? } ?>
                    <?php if ($newSkiing) { ?>
                        <li><a href="<?= $newSkiing ?>">Горные лыжи</a></li>
                    <? } ?>    
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 22, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/specialoffers/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Акции и спецпредложения</a></li>
                    <? } ?>
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 32, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/hotels/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Отели</a></li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/sea_tour_italy/">Морские курорты</a></li>
                        <li><a href="/countries/early_booking_italy/">Раннее бронирование</a></li>
                        <li><a href="/countries/spa_treatments_relaxation_italy/">SPA, лечение и релакс</a></li>
                        <li><a href="/countries/city_italy/">Города</a></li>
                        <li><a href="/countries/free_nights_italy/">Бесплатные ночи</a></li>
                    <?}?>
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 23, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/tours/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Туры</a></li>
                    <? } ?>
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 29, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/excursions/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Экскурсии</a></li>
                    <? } ?>
                    <?php $jdRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 36, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arJd = $jdRes->Fetch()) {?>
                        <li><a href="/tickets/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">ЖД билеты</a></li>
                    <? } ?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 37, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li><a href="/visa/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Визы</a></li>
                    <? } ?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 54, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li>
                            <a href="/weddings/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Свадебные туры</a>
                        </li>
                    <? } ?>
                    <? $countryCode = $arCountry['CODE'];
                    if($countryCode) {?>
                        <li><a href="/countries/<?=$countryCode?>/">О стране</a></li>
                        <li><a href="/countries/<?=$countryCode?>/#country-city-list">Города и курорты</a></li>
                    <? } ?>
                </ul>
            <? } ?>
        </div>

    <?$ElementID = $APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "",
        Array(
            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
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
            "SET_TITLE" => $arParams["SET_TITLE"],
            "MESSAGE_404" => $arParams["MESSAGE_404"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "SHOW_404" => $arParams["SHOW_404"],
            "FILE_404" => $arParams["FILE_404"],
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
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
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
            "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
            "USE_SHARE" => $arParams["USE_SHARE"],
            "SHARE_HIDE" => $arParams["SHARE_HIDE"],
            "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
            "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
            "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
            "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
            "ADD_ELEMENT_CHAIN" => "N"
        ),
        $component
    ); echo $ElementID;?>
    </div>
</div>