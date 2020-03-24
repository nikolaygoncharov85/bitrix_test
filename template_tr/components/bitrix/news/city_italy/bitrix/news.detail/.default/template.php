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
    <div class="row-1 row-inner white-bg low_margin">
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
        .low_margin {
            margin-bottom: 30px !important;
            padding-bottom: 10px;
        }
        .low_margin h2.mt-col-dist {
            margin: 15px 0 5px 0 !important;
        }
    </style>
    <?if($arResult["PROPERTIES"]["excurs"]["VALUE"][0]>0){?>
        <div class="row-1 row-inner white-bg mb-col-dist excurse_js low_margin" style="display: block;">
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
    <?if($arResult["PROPERTIES"]["transfers"]["VALUE"][0]>0){?>
        <div class="row-1 row-inner white-bg mb-col-dist transfers_js low_margin" style="display: block;">
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
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".breadcrumb li").each(function(){
            if($(this).find('a').text()=='Страны'){
                $(this).find('a').text('Италия');
                $(this).find('a').attr('href','/countries/italiya/')
            }
        });
    });
</script>