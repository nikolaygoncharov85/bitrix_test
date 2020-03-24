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
$countryCode = $arResult[VARIABLES][SECTION_CODE];
$iblockId = $arParams["IBLOCK_ID"];
$obRes = CIblockSection::GetList(array(),array("IBLOCK_ID"=>$iblockId,"CODE"=>$countryCode));
$arCountry1 = $obRes->Fetch();
print_pre($_REQUEST[CODE],1);
print_pre($arCountry1,1);
$obRes = CIblockElement::GetList(array(),array("IBLOCK_ID"=>$iblockId,"SECTION_ID"=>$arCountry1[ID],"ACTIVE"=>"Y"));
/*echo $childCount = $obRes->SelectedRowsCount();*/
if($arCountry1[DEPTH_LEVEL]==2){
    $countryId = $arCountry1[IBLOCK_SECTION_ID];
    $arParent = CIblockSection::getById($countryId)->Fetch();
    $APPLICATION->AddChainItem(
        $arParent[NAME],
        '/countries/'.$arParent[CODE].'/'
    );
}
else {
    $countryId = $arCountry1[ID];
}
?>
<?
$res = CIBlockSection::GetList(array(), array('CODE' => $arResult['VARIABLES']['SECTION_CODE'], 'IBLOCK_ID' => $arParams['IBLOCK_ID']), false, array('UF_*'));
if ($arRow = $res->Fetch()) {
    $arResult['VARIABLES']['SECTION_ID'] = $arRow['ID'];
    $arResult['UF_ABOUT'] = $arRow['UF_ABOUT'];
    $arResult['TITLE'] = $arRow['NAME'];
    $arResult['DESCRIPTION'] = $arRow['DESCRIPTION'];
        if ($arRow['PICTURE'] > 0) {
            $filePreview = CFile::ResizeImageGet($arRow['PICTURE'], array('width' => 724, 'height' => 357), BX_RESIZE_IMAGE_EXACT, false);
        } else {
            $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
        }
        $arResult['IMAGE'] = $filePreview['src'];
        if ($arRow['UF_POPULAR_PHOTO'] > 0) {
            $filePopular = CFile::ResizeImageGet($arRow['UF_POPULAR_PHOTO'], array('width'=>300, 'height'=>320), BX_RESIZE_IMAGE_EXACT, false);
            $arParams['UF_POPULAR_PHOTO'] = $filePopular['src'];
        } else {
            $arParams['UF_POPULAR_PHOTO'] = SITE_TEMPLATE_PATH . '/assets/img/content/country-one/popular.jpg';
        }
        if (!empty($arRow['UF_PHOTO'])) {
            foreach($arRow['UF_PHOTO'] as $fileId) {
                $filePreview = CFile::ResizeImageGet($fileId, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
                $fileSmall = CFile::ResizeImageGet($fileId, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
                $fileDetail = CFile::GetFileArray($fileId);
                $arResult['PROPERTIES']['PHOTO']['VALUE'][] = array(
                    'preview' => $filePreview['src'],
                    'detail' => $fileDetail['SRC'],
                    'small' => $fileSmall['src'],
                    'description' => $arRow['NAME']
                );
            }
        }
    $APPLICATION->AddChainItem($arRow['NAME']);
    $APPLICATION->SetTitle($arRow['NAME']);
}
?>
<?if($countryId=='94'){?>
    <link href="../styles.css" type="text/css" rel="stylesheet"/>
<?}?>
<div class="container without-padding" id="<?if($countryId=='94'){?>for_italy<?}?>">
    <div class="page">
        <div class="left-sidebar">
            <div class="left-sidebar-icon-menu for-mobile">
                <span class="icon icon-menu"></span>
            </div>
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
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 46, 'ACTIVE' => 'Y', 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li><a href="/flights/<?=$arVisa["CODE"];?>/">Авиаперелет</a></li>
                    <? } ?>
                    <?php $obRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 22, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arRes = $obRes->Fetch()) {?>
                        <li><a href="/specialoffers/?arrFilter_pf[COUNTRY]=<?= $countryId ?>&set_filter=Y">Акции и спецпредложения</a></li>
                    <? } ?>
                    <?if($countryId=='94'){?>
                        <li><a href="/countries/free_nights_italy/">Бесплатные ночи</a></li>
                    <?}?>
                    <?php $visaRes = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 37, 'PROPERTY_COUNTRY' => $countryId), false, false);
                    if ($arVisa = $visaRes->Fetch()) {?>
                        <li><a href="/visa/<?=$arVisa["CODE"];?>/">Визы</a></li>
                    <? } ?>
                    <?php if ($newSkiing) { ?>
                        <li><a href="<?=$newSkiing?>">Горные лыжи</a></li>
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
        <div class="page-content">
            <? if (!empty($arResult['PROPERTIES']['PHOTO']['VALUE'])) { ?>
                <div class="row-1 row-inner mb-col-dist">
                    <div class="col without-padding" style="<?if($countryId!='94'){?>width: 100%;<?}else{?>width: 76%;<?}?>float: right;">
                        <div class="main-img-block">
                            <div class="swiper-container swiper-gallery">
                                <div class="swiper-wrapper">
                                    <? foreach($arResult['PROPERTIES']['PHOTO']['VALUE'] as $arPhoto) { ?>
                                        <div class="swiper-slide">
                                            <a href="<?=$arPhoto['detail']?>" class="fancybox gallery_slide" rel="gallery1" title="<?=$arPhoto['description']?>" style="background-image: url('<?=$arPhoto['preview']?>');">
                                                <img src="<?=$arPhoto['preview']?>" alt="">
                                            </a>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                            <div class="gallery-thumbs-prev" style="left: -3px !important;"></div>
                            <div class="gallery-thumbs-next" style="right: -2px !important;"></div>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    .fancybox.gallery_slide {
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        width: 100%;
                        height: 400px;
                    }
                </style>
            <? } ?>
            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col without-padding">
                    <?if($arResult['UF_ABOUT']){?>
                        <div class="title-before-main-img">
                            <h3><?=$arResult['UF_ABOUT']?></h3>
                        </div>
                    <?}?>
                    <?if($countryId=='94'){?>
                        <div class="text main-img-block for_italy text-block-padding" style="text-align: left;">
                            <?=$arResult['DESCRIPTION']?>
                        </div>
                    <?}else{?>
                        <?if($arResult['IMAGE']){?>
                            <div class="main-img-block" style="background: url('<?=$arResult['IMAGE']?>')"></div>
                        <?}?>
                    <?}?>
                    <div class="clear"></div>
                </div>
                <?if($countryId!='94'){?>
                    <div class="col">
                        <div class="text text-block-padding">
                            <?=$arResult['DESCRIPTION']?>
                        </div>
                    </div>
                <?}?>
            </div>
            <div class="row-1 row-inner white-bg mb-col-dist feedback_url_form">
                <div class="col">
                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "feedback_url_form", array(
                        "SEF_MODE" => "Y",
                        "WEB_FORM_ID" => "29",
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
                        "COMPONENT_TEMPLATE" => "feedback_url_form"
                    ),
                        false,
                        array(
                            "ACTIVE_COMPONENT" => "Y"
                        )
                    );?>
                </div>
            </div>
    <?
    global $arFilterSight;
    $arFilterSight['PROPERTY_COUNTRY'] = $arResult['VARIABLES']['SECTION_ID'];
    ?>
    <?$APPLICATION->IncludeComponent("bitrix:news.list","countries_sight",Array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_MODE" => "N",
            "IBLOCK_TYPE" => "traveluxe_content",
            "IBLOCK_ID" => "30",
            "NEWS_COUNT" => "6",
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
            "SECTION_ID" => $arResult['VARIABLES']['SECTION_ID']
        )
    );?>
        <?
        global $arFilterOffers;
        $arFilterOffers['PROPERTY_COUNTRY'] = $arResult['VARIABLES']['SECTION_ID'];
        ?>
        <?$APPLICATION->IncludeComponent("bitrix:news.list","countries_offers",Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "traveluxe_content",
                "IBLOCK_ID" => "22",
                "NEWS_COUNT" => "6",
                "SORT_BY1" => "ID",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "ID",
                "SORT_ORDER2" => "DESC",
                "FILTER_NAME" => "arFilterOffers",
                "FIELD_CODE" => Array("ID"),
                "PROPERTY_CODE" => Array("booking"),
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
                "TITLE" => $arResult['TITLE']
            )
        );?>
        <?
        global $arFilterTour;
        $arFilterTour['PROPERTY_COUNTRY'] = $arResult['VARIABLES']['SECTION_ID'];
        $arFilterTour['!PROPERTY_show_archive'] = "Y";
        /*global ${$arFilterTour};
        ${$arFilterTour}["!PROPERTY_show_archive"] = "Y";*/
        ?>
        <?if($countryId!='94'){?>
            <?$APPLICATION->IncludeComponent("bitrix:news.list","countries_tour",Array(
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "traveluxe_content",
                    "IBLOCK_ID" => "23",
                    "NEWS_COUNT" => "3",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "FILTER_NAME" => "arFilterTour",
                    "FIELD_CODE" => Array("ID"),
                    "PROPERTY_CODE" => Array("booking"),
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
                    "TITLE" => $arResult['TITLE']
                )
            );?>
        <?}else{?>
            <?$APPLICATION->IncludeComponent("bitrix:news.list","countries_tour_italy",Array(
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "traveluxe_content",
                    "IBLOCK_ID" => "23",
                    "NEWS_COUNT" => "6",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                    "FILTER_NAME" => "arFilterTour",
                    "FIELD_CODE" => Array("ID"),
                    "PROPERTY_CODE" => Array("booking"),
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
                    "TITLE" => $arResult['TITLE']
                )
            );?>
        <?}?>
        <?if($countryId!='94'){?>
        <?
        global $arFilterHotel;
        $arFilterHotel['PROPERTY_COUNTRY'] = $arResult['VARIABLES']['SECTION_ID'];
        $arFilterHotel['PROPERTY_TOP_HOTEL'] = 'Y';
        ?>
        <?$APPLICATION->IncludeComponent("bitrix:news.list","countries_hotel",Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "traveluxe_content",
                "IBLOCK_ID" => "32",
                "NEWS_COUNT" => "4",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "NAME",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "arFilterHotel",
                "FIELD_CODE" => Array("ID"),
                "PROPERTY_CODE" => Array("COUNTRY", "CITY", "STAR_CATEGORY", "STAR_CATEGORY_TYPE"),
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
                "UF_POPULAR_PHOTO" => $arParams['UF_POPULAR_PHOTO']
            )
        );?>
        <div class="text text-block-padding" id="country-city-list">
            <?if($arCountry1[DEPTH_LEVEL]==2){?>
                <?if($childCount>0){?>
                    <h2>ГОРОДА</h2>
                <?}?>
            <?} else {?>
                <h2>ГОРОДА И КУРОРТЫ</h2>
            <?}?>
        </div>
        <?$APPLICATION->IncludeComponent("bitrix:news.list","country_city",Array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "traveluxe_content",
                "IBLOCK_ID" => "27",
                "NEWS_COUNT" => "200",
                "SORT_BY1" => "SORT ",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "arFilterCity",
                "FIELD_CODE" => Array("ID", "PREVIEW_TEXT"),
                "PROPERTY_CODE" => Array("COUNTRY", "CITY", "STAR_CATEGORY", "STAR_CATEGORY_TYPE"),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "/countries/#SECTION_CODE#/#ELEMENT_CODE#/",
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
                "PARENT_SECTION" => $arResult['VARIABLES']['SECTION_ID'],
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
                "TITLE" => $arResult['TITLE']
            )
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "inflot",
            Array(
                "ADD_SECTIONS_CHAIN" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000002",
                "CACHE_TYPE" => "A",
                "COMPONENT_TEMPLATE" => "tree",
                "COUNT_ELEMENTS" => "Y",
                "IBLOCK_ID" => "27",
                "IBLOCK_TYPE" => "traveluxe_content",
                "SECTION_CODE" => $arCountry1["CODE"],
                "SECTION_FIELDS" => array("",""),
                "SECTION_ID" => "",
                "SECTION_URL" => "",
                "SECTION_USER_FIELDS" => array("",""),
                "SHOW_PARENT_NAME" => "Y",
                "TOP_DEPTH" => "1",
                "VIEW_MODE" => "LINE"
            )
        );?>
        <?}?>
        </div>
    </div>
</div>
<?if($countryId=='94'){?>
<div class="clear"></div>
<div class="container without-padding" id="country-city-list">
    <div class="element_div" data-element="1" id="1">
        <div class="table">
            <div class="img_content" style="background: url('<?=$this->GetFolder();?>/img/Landing_City.jpg');">
                <div class="header_text">Города Италии</div>
            </div>
            <div class="text_content">
                <div class="element_row">
                    <div class="city_name">Рим</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/grand_hotel_via_veneto/">Grand hotel Via Veneto 5*</a></li>
                            <li><a href="/hotels/gran_melia_rome/">Gran Melia Roma 5*</a></li>
                            <li><a href="/hotels/regina_baglioni/">Regina Baglioni 5 *</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Флоренция</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/savoy1/">Savoy 5*</a></li>
                            <li><a href="/hotels/golden_tower_spa/">Golden Tower  5*</a></li>
                            <li><a href="/hotels/brunelleschi_flo/">Brunelleschi 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Венеция</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/luna_baglioni/">Luna Baglioni 5*</a></li>
                            <li><a href="/hotels/danieli/">Danieli 5*</a></li>
                            <li><a href="/hotels/santa_chiara/">Santa Chiara 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Милан</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/palazzo_parigi/">Palazzo Parigi 5*</a></li>
                            <li><a href="/hotels/four_seasons2/">Four Seasons 5*</a></li>
                            <li><a href="/hotels/carlton_hotel_baglioni/">Carlton Baglioni 5*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Неаполь</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/grand_hotel_parker_s_/">Grand hotel Parker’s 5*</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="for_request_button">
            <span>Отели от 5* до апартаментов, авиаперелет, трансферы, экскурсии</span>
            <input type="button" class="request_submit" data-element="1" value="ОТПРАВИТЬ ЗАПРОС"/>
        </div>
    </div>
    <div class="element_div" data-element="2" id="2">
        <div class="table">
            <div class="img_content" style="background: url('<?=$this->GetFolder();?>/img/Landing_SPA.jpg');">
                <div class="header_text">Термы и СПА</div>
            </div>
            <div class="text_content">
                <div class="element_row">
                    <div class="city_name">Тоскана</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/bagni_di_pisa_palace_spa/">Bagni di Pisa 5*</a></li>
                            <li><a href="/hotels/fonteverde_tuscan_resort_spa/">Fonteverde 5*</a></li>
                            <li><a href="/hotels/grotta_giusti_resort_golf_spa/">Grotta Giusti Resort Golf & SPA 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Монтекатини  Терме</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/grand_hotel_la_pace/">Grand hotel & La Pace 5*</a></li>
                            <li><a href="/hotels/montecatini_palace/">Montecatini Palace 5*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Абано Терме</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/abano_grand/">Abano Grand Hotel 5*L</a></li>
                            <li><a href="/hotels/trieste_victoria/">Grand Hotel Trieste & Victoria 5*</a></li>
                            <li><a href="/hotels/panoramic_plaza/">Panoramic Plaza 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Монтегротто Терме</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/augustus_terme/">Augustus Terme 4*</a></li>
                            <li><a href="/hotels/sollievo_terme/">Sollievo Terme 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Фьюджи</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/palazzo_della_fonte/">Grand Hotel Palazzo della Fonte 5*L</a></li>
                            <li><a href="/hotels/ambasciatori/">Ambasciatori Place 4*</a></li>
                            <li><a href="/hotels/silva_splendid/">Silva Hotel Splendid 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="for_request_button">
            <span>Отели от 5* до апартаментов, авиаперелет, трансферы, экскурсии</span>
            <input type="button" class="request_submit" data-element="2" value="ОТПРАВИТЬ ЗАПРОС"/>
        </div>
    </div>
    <div class="element_div" data-element="3" id="3">
        <div class="table">
            <div class="img_content" style="background: url('<?=$this->GetFolder();?>/img/Landing_beach.jpg');">
                <div class="header_text">Отдых на море</div>
            </div>
            <div class="text_content">
                <div class="element_row">
                    <div class="city_name">О. Искья</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/albergo_della_regina_isabella/">Albergo della Regina Isabella 5*</a></li>
                            <li><a href="/hotels/miramare_e_castello/">Miramare e Castello 5*</a></li>
                            <li><a href="/hotels/san_giorgio_terme/">San Giorgio Terme 4*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Неаполитанская Ривьера</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/grand_hotel_cocumella/">Grand hotel Cocumella 5*</a></li>
                            <li><a href="/hotels/santa_caterina1/">Santa Caterina 5*</a></li>
                            <li><a href="/hotels/il_saraceno/">Grand hotel Il Saraceno 5*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Венецианская Ривьера</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/falkensteiner_hotel_spa/">Falkensteiner Hotel & SPA Jesolo 5*</a></li>
                            <li><a href="/hotels/almar_jesolo_resort_spa/">Almar Resort & SPA 5*</a></li>
                            <li><a href="/hotels/adriatic_palace/">Adriatic Palace 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Лигурия</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/royal2/">Royal 5*</a></li>
                            <li><a href="/hotels/excelsior_palace/">Excelsior Palace 5*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Побережье Одиссея</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/punta_rossa/">Punta Rossa 4*S</a></li>
                            <li><a href="/hotels/grand_hotel_virgilio/">Grand Hotel Virgilio 4*</a></li>
                            <li><a href="/hotels/le_dune/">Le Dune 4*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name" style="width: 100%;display: block;text-align: center;">
                        <br>
                        А также отели на курортах:
                        <br>
                        Тоскана
                        <br>
                        Апулия
                        <br>
                        Калабрия
                        <br>
                        <a href="http://www.sardinia3d.ru/">О.Сардиния</a>
                        <br>
                        О. Сицилия
                        <br>
                        О. Эльба
                        <br>
                        <a href="/hotels/albarella/">О. АЛЬБАРЕЛЛА</a>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="for_request_button">
            <span>Отели от 5* до апартаментов, авиаперелет, трансферы, экскурсии</span>
            <input type="button" class="request_submit" data-element="3" value="ОТПРАВИТЬ ЗАПРОС"/>
        </div>
    </div>
    <div class="element_div" data-element="4">
        <div class="table">
            <div class="img_content" style="background: url('<?=$this->GetFolder();?>/img/Landing_Lakes.jpg');">
                <div class="header_text">Отдых на озерах</div>
            </div>
            <div class="text_content">
                <div class="element_row">
                    <div class="city_name">Гарда</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/grand_hotel_terme-sirmione/">Grand Hotel Terme 5*</li>
                            <li><a href="/hotels/park_hotel_desenzano/">Park Hotel Desenzano 4*</a></li>
                            <li><a href="/hotels/grand_hotel_fasano/">Grand Hotel Fasano & Villa Principe 5*</a></li>
                            <li><a href="/hotels/gardaland_adventure/">Gardaland Adventure 4*</a> и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Комо</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/castadiva_resort_spa/">Casta Diva Resort & SPA 5*</a></li>
                            <li><a href="/hotels/villa_d_este/">Villa D`Este 5*</a></li>
                            <li>Villa Flori 4* и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Маджоре</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Grand Hotel des Iles Borromees & SPA 5*L</li>
                            <li><a href="/hotels/villa_e_palazzo_aminta/">Villa e Palazzo Aminta 5*</a></li>
                            <li>Grand Hotel Bristol 4* и другие</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="for_request_button">
            <span>Отели от 5* до апартаментов, авиаперелет, трансферы, экскурсии</span>
            <input type="button" class="request_submit" data-element="4" value="ОТПРАВИТЬ ЗАПРОС"/>
        </div>
    </div>
    <div class="element_div" data-element="5">
        <div class="table">
            <div class="img_content" style="background: url('<?=$this->GetFolder();?>/img/Landing_Ski.jpg');">
                <div class="header_text">Горные лыжи</div>
            </div>
            <div class="text_content">
                <div class="element_row">
                    <div class="city_name">Валь ди Фасса</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Garni Aritz 4*</li>
                            <li>La Perla 4*</li>
                            <li>Schloss Hotel & Club Dolomiti 4* и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Альта Вальтеллина (Бормио)</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/grand_hotel_bagni_nuovi/">Grand Hotel Bagni Nuovi 5*</a></li>
                            <li>Baita Clementi 4*</li>
                            <li>Palace Wellness & Beauty 4* и другие</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Доломити ди Брента(Мадонна ди Кампильо)</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Alpen Suite 5*</li>
                            <li><a href="/hotels/cristal_palace1/">Cristal Palace 4*</a></li>
                            <li><a href="/hotels/relais_des_alpes/">IGV Relais des Alpes 4*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Валь д’ Аоста</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Grand Hotel Mont Blanc 5*</li>
                            <li>Grand Baita Hotel & Wellness 4*</li>
                            <li>Sertorelli Sport Hotel 4* и другие</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="for_request_button">
            <span>Отели от 5* до апартаментов, авиаперелет, трансферы, экскурсии</span>
            <input type="button" class="request_submit" data-element="5" value="ОТПРАВИТЬ ЗАПРОС"/>
        </div>
    </div>
    <div class="element_div" data-element="6" id="6">
        <div class="table">
            <div class="img_content" style="background: url('<?=$this->GetFolder();?>/img/Landing_castles_2.jpg');">
                <div class="header_text">Замки и романтика</div>
            </div>
            <div class="text_content">
                <div class="element_row">
                    <div class="city_name">Венето</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/byblos_villa_amista/">Byblos Villa Amista 5*</a></li>
                            <li>Il Sogno di Giulieta 5*</li>
                            <li>Villa del Quar 5*</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Тоскана</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Castel Monastero 5*</li>
                            <li>Castel del Nero 5*</li>
                            <li>Castello di Velona 5*</li>
                            <li>Borgo San Felice 5*</li>
                            <li>San Bonifacio 5*</li>
                            <li>Relais Villa L’Olmo 4*S</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Ломбардия</div>
                    <div class="hotels_list">
                        <ul>
                            <li><a href="/hotels/l_albereta/">L’Albereta 5*</a></li>
                            <li><a href="/hotels/villa_d_este/">Villa D’Este 5*</a></li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Пьемонте</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Il Boscaretto 5*</li>
                            <li>Relais San Maurizio 5*</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Лацио</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Castel Orsini 5*</li>
                            <li>La Posta Vecchia 5*</li>
                        </ul>
                    </div>
                </div>
                <div class="element_row">
                    <div class="city_name">Кампания</div>
                    <div class="hotels_list">
                        <ul>
                            <li>Belmond Caruso 5*</li>
                            <li>Palazzo Avino 5*</li>
                            <li>Monastero Santa Rosa 5*</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="for_request_button">
            <span>Отели от 5* до апартаментов, авиаперелет, трансферы, экскурсии</span>
            <input type="button" class="request_submit" data-element="6" value="ОТПРАВИТЬ ЗАПРОС"/>
        </div>
    </div>
</div>
<script type="text/javascript" src="../script.js"></script>
<?}?>
