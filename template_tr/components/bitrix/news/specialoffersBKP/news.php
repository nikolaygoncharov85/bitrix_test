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
?>

<div class="container without-padding">
    <div class="left-sidebar" style="float: left;">
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
        <?php $countryId = $_REQUEST['arrFilter_pf']['COUNTRY'];
        if ($countryId > 0) {
            $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $countryId), false, array("UF_NEW_YEAR", "UF_BOOKING_LINK", "UF_SKIING", "CODE", "UF_MEMO"))->Fetch();
            print_pre($arCountry, 1);
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
                <?php /*if ($newYear) { */?><!--
                    <li><a href="<?/*= $newYear */?>">Новый год</a></li>
                --><?/* } */?>
                <?php if ($newSkiing) { ?>
                    <li><a href="<?= $newSkiing ?>">Горные лыжи</a></li>
                <? } ?>
                <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 22, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arRes = $obRes->Fetch()) {?>
                    <li><a href="/specialoffers/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Акции и спецпредложения</a></li>
                <? } ?>
                <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 23, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arRes = $obRes->Fetch()) {?>
                    <li><a href="/tours/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Туры</a></li>
                <? } ?>
                <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 29, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arRes = $obRes->Fetch()) {?>
                    <li><a href="/excursions/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Экскурсии</a></li>
                <? } ?>
                <!--<li><a href="/sight/?arrFilter_pf[COUNTRY]=<?=$_REQUEST['arrFilter_pf']['COUNTRY']?>&set_filter=Y">Достопримечательности</a></li>-->
                <?php $jdRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 36, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arJd = $jdRes->Fetch()) {?>
                    <li><a href="/tickets/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">ЖД билеты</a></li>
                <? } ?>
                <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 37, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arVisa = $visaRes->Fetch()) {?>
                    <li><a href="/visa/<?=$arVisa["CODE"];?>/">Визы</a></li>
                <? } ?>
                <?php if ($newMemo) { ?>
                    <li><a title="<?=$arFile['FILE_NAME'];?>" target="_blank" href="<?=$arFile['SRC'];?>">Памятка</a></li>
                <? } ?>
                <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 46, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arVisa = $visaRes->Fetch()) {?>
                    <li><a href="/flights/<?=$arVisa["CODE"];?>/">Авиаперелет</a></li>
                <? } ?>
                <!--VIP услуги--->
                <!--свадебные туры--->
                <?php $transRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 47, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arTrans = $transRes->Fetch()) {?>
                    <li>
                        <a href="/transfers/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Трансферы</a>
                    </li>
                <? } ?>
                <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 45, 'PROPERTY_COUNTRY' => $countryId, "ACTIVE" => "Y"), false, false);
                if ($arVisa = $visaRes->Fetch()) {?>
                    <li>
                        <a href="/medicine/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">Лечение</a>
                    </li>
                <? } ?>
                <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 48, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arVisa = $visaRes->Fetch()) {?>
                    <li>
                        <a href="/vip_countries/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Фильтр&set_filter=Y">VIP-услуги</a>
                    </li>
                <? } ?>
                <?php /*$visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 52, 'PROPERTY_COUNTRY' => $countryId), false, false);
                if ($arVisa = $visaRes->Fetch()) {*/?><!--
                    <li><a href="/weddings/<?/*=$arVisa["CODE"];*/?>/">Свадебные туры</a></li>
                --><?/* } */?>
                <?/* if($arWeddings) {*/?><!--
                        <li><a href="javascript:void(0);">Свадебные туры:</a></li>
                        <ul>
                            <?/* foreach ($arWeddings as $arWedding){*/?>
                                <li class="lvl2"><a href="<?/*=$arWedding['LINK']*/?>"><?/*=$arWedding['NAME']*/?></a></li>
                            <?/* } */?>
                        </ul>
                    --><?/* } */?>
                <? if($countryCode) {?>
                    <li><a href="/countries/<?=$countryCode?>/">О стране</a></li>
                    <li><a href="/countries/<?=$countryCode?>/#country-city-list">Города и курорты</a></li>
                    <? if($arCountry1[DEPTH_LEVEL]==2){ ?>
                        <?$APPLICATION->IncludeComponent("bitrix:news.list","list_items",Array(
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                "AJAX_MODE" => "N",
                                "IBLOCK_TYPE" => "traveluxe_content",
                                "IBLOCK_ID" => "27",
                                "NEWS_COUNT" => "20",
                                "SORT_BY1" => "ID",
                                "SORT_ORDER1" => "DESC",
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
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => $_REQUEST[CODE],
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
            </ul>
        <? } ?>
    </div>
    <div class="page-100 page-content" style="float: left;">
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "",
        Array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "NEWS_COUNT" => $arParams["NEWS_COUNT"],
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
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_FILTER" => $arParams["CACHE_FILTER"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
            "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
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
            "FILTER_NAME" => "arrFilterHotel",
            "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "TITLE" => 'отелям'
        ),
        $component
    );?>


    </div>
    <div style="clear: both;"></div>
    <style type="text/css">
        .hotel-description b {
            display: block;
        }
    </style>
</div>
