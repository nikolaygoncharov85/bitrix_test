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
<style type="text/css">
    .excursion-item-title .tours-list-item-title {
        color: #013f56;
        font-weight: bold;
    }
    .excursion-list li {
        margin-bottom: 30px;
    }
    span.show_map {
        cursor: pointer;
        /*color: #1191ed;*/
        color: blue;
        text-decoration: underline;
    }
    span.show_map:hover {
        text-decoration: underline;
    }
    .show_map_wrapper {
        display: none;
        position: fixed;
        background: rgba(0,0,0,0.7);
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
    }
    div.show_map {
        position: relative;
        width: 95%;
        margin: 0 auto;
        overflow-x: scroll;
    }
    div.show_map .close_map {
        position: absolute;
        top: 20px;
        right: 20px;
        color: #fff;
        transform: rotate(45deg);
        font-size: 70px;
        cursor: pointer;
        line-height: 30px;
    }
    div.show_map img {
        height: 95vh;
        width: auto;
        margin: 0 auto;
        display: block;
    }
</style>
<div class="page-content">
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col without-padding">
            <div class="main-img-block">
                <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
            </div>
        </div>
        <?/* if (strlen($arResult['PREVIEW_TEXT']) > 0) { */?><!--
        <div class="col">
            <div class="text text-block-padding">
                <p>
                    <?/*=$arResult['PREVIEW_TEXT']*/?>
                </p>
            </div>
        </div>
        --><?/*}*/?>
    </div>
    <? if (strlen($arResult['DETAIL_TEXT']) > 0) { ?>
    <div class="row-1 row-inner white-bg inner-page-text">
        <div class="col">
            <?=$arResult['~DETAIL_TEXT']?>
        </div>
    </div>
    <? } ?>
    <?if($arResult['PROPERTIES']['show_gallery']["VALUE"]=='Y'){?>
        <div class="row-1 row-inner mb-col-dist">
            <div class="col without-padding">
                <div class="main-img-block">
                    <div class="swiper-container swiper-gallery">
                        <div class="swiper-wrapper">
                            <? foreach($arResult['PROPERTIES']['gallery']['VALUE'] as $arPhoto) { ?>
                                <div class="swiper-slide">
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="gallery1" title="<?=$arPhoto['description']?>">
                                        <img src="<?=$arPhoto['preview']?>" alt="">
                                    </a>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-1 row-inner white-bg mb-col-dist">
            <div class="col without-padding">
                <div class="main-img-block main-img-block-thumbs">
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <? foreach($arResult['PROPERTIES']['gallery']['VALUE'] as $arPhoto) { ?>
                                <div class="swiper-slide">
                                    <img src="<?=$arPhoto['small']?>" alt="">
                                </div>
                            <? } ?>
                        </div>
                    </div>
                    <div class="gallery-thumbs-prev"></div>
                    <div class="gallery-thumbs-next"></div>
                </div>
            </div>
        </div>
    <?}?>
    <style type="text/css">
        .ne {
            position: absolute;
            top: 67%;
            margin-top: -20px;
            opacity: 1;
            background: url(<?=SITE_TEMPLATE_PATH?>/img/icons/bottom_carousel_next.png) no-repeat;
            width: 23px;
            height: 41px;
            right: 2px;
        }
        .pr {
            position: absolute;
            top: 67%;
            margin-top: -20px;
            background: url(<?=SITE_TEMPLATE_PATH?>/img/icons/bottom_carousel_prev.png) no-repeat;
            width: 23px;
            height: 41px;
            opacity: 1;
            left: 2px;
        }
    </style>
    <?if($arResult["PROPERTIES"]["hotel"]["VALUE"][0]>0){?>
        <div class="row-1 row-inner white-bg inner-page-text">
            <div class="col">
                <h2 class="mt-col-dist">Отели</h2>
                <ul class="hotel_list">
                    <?foreach($arResult["PROPERTIES"]["hotel"]["VALUE"] as $arID) {?>
                        <li>
                            <?
                            $arSelect = CIBlockElement::GetProperty(32, $arID, Array(), Array("CODE"=>"STAR_CATEGORY"));
                            $hotel_star = $arSelect->Fetch();
                            $star = $hotel_star["VALUE_ENUM"];
                            $arSelect2 = Array("NAME", "DETAIL_PAGE_URL");
                            $arFilter = Array("IBLOCK_ID"=>32, "ID"=>$arID);
                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect2);
                            $ob = $res->GetNextElement();
                            $arFields = $ob->GetFields();
                            ?>
                            <a href="<?=$arFields["DETAIL_PAGE_URL"]?>"><?=$arFields["NAME"]?><?if(!empty($star)){?> <?=$star?>*<?}?></a>
                        </li>
                    <?}?>
                </ul>
            </div>
        </div>
    <?}?>
    <?if($arResult["PROPERTIES"]["transfers"]["VALUE"][0]>0){?>
        <div class="row-1 row-inner white-bg mb-col-dist transfers_js" style="display: block;">
            <div class="col bottom-carousel-block">
                <h2 class="mt-col-dist" style="margin-top: 30px;">Трансферы</h2>
                <div class="row-1 row-3-sm bottom-carousel transfers_near">
                    <ul class="bottom-carousel-list" style="width: 20000px !important;">
                        <?$i = 0;?>
                        <?foreach($arResult["PROPERTIES"]["transfers"]["VALUE"] as $key) {
                            $arSelect = Array("NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE");
                            $arFilter = Array("IBLOCK_ID"=>47, "ID"=>$key);
                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                            $ob = $res->GetNextElement();
                            $arFields = $ob->GetFields();
                            $i++;
                            $filePreview = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>200, 'height'=>164), BX_RESIZE_IMAGE_EXACT, false);
                            ?>
                            <li class="col">
                                <div class="special-item-inner">
                                    <img src="<?=$filePreview['src']?>" alt="">
                                    <p class="hotel-name">
                                        <?=$arFields['NAME']?>
                                    </p>
                                    <a class="absolute-link" href="<?=$arFields['DETAIL_PAGE_URL']?>"></a>
                                </div>
                            </li>
                        <?}?>
                    </ul>
                </div>
                <?if($i>3){?>
                    <a href="#" class="pr" style="display: block;" data-jcarouselcontrol="true"></a>
                    <a href="#" class="ne" style="display: block;" data-jcarouselcontrol="true"></a>
                <?}?>
            </div>
        </div>
    <?}?>
    <?if($arResult["PROPERTIES"]["excurs"]["VALUE"][0]>0){?>
        <div class="row-1 row-inner white-bg mb-col-dist excurse_js" style="display: block;">
            <div class="col bottom-carousel-block">
                <h2 class="mt-col-dist" style="margin-top: 30px;">Экскурсии</h2>
                <div class="row-1 row-3-sm bottom-carousel excurse_near">
                    <ul class="bottom-carousel-list" style="width: 20000px !important;">
                        <?$a = 0;?>
                        <?foreach($arResult["PROPERTIES"]["excurs"]["VALUE"] as $key) {
                            $arSelect = Array("NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE");
                            $arFilter = Array("IBLOCK_ID"=>29, "ID"=>$key);
                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                            $ob = $res->GetNextElement();
                            $arFields = $ob->GetFields();
                            $a++;
                            $filePreview = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array('width'=>200, 'height'=>164), BX_RESIZE_IMAGE_EXACT, false);
                            ?>
                            <li class="col">
                                <div class="special-item-inner">
                                    <img src="<?=$filePreview['src']?>" alt="">
                                    <p class="hotel-name">
                                        <?=$arFields['NAME']?>
                                    </p>
                                    <a class="absolute-link" href="<?=$arFields['DETAIL_PAGE_URL']?>"></a>
                                </div>
                            </li>
                        <?}?>
                    </ul>
                </div>
                <?if($a>3){?>
                    <a href="#" class="pr" style="display: block;" data-jcarouselcontrol="true"></a>
                    <a href="#" class="ne" style="display: block;" data-jcarouselcontrol="true"></a>
                <?}?>
            </div>
        </div>
    <?}?>
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
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".breadcrumb li").each(function(){
            if($(this).find('a').text()=='Страны'){
                $(this).find('a').text('Австрия');
                $(this).find('a').attr('href','/countries/avstriya/')
            }
        });
        $("body").append('<div class="show_map_wrapper"><div class="show_map"><img src=""/><div class="close_map">+</div></div></div>');
        $("span.show_map").click(function(){
            var src = $(this).data('img');
            $(".show_map_wrapper").find('img').attr('src',src);
            $(".show_map_wrapper").show();
        });
        $("div.show_map .close_map").click(function(){
            $(".show_map_wrapper").hide();
            $("body").find(".show_map_wrapper").find('img').attr('src','');
        });
    });
</script>