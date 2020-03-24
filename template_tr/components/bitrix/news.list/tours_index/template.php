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
<? if (count($arResult["ITEMS"]) > 0) { ?>
    <div class="container white-bg news_new" style="display: block;">
        <div class="news_new_top relative">
            <span class="news_block_header">Туры</span>
        </div>
        <!--<div class="filter_links">
            <span class="country_select active" data-country="94">Италия</span>
            <span class="country_select" data-country="112">Мальдивы</span>
            <a href="/tours/">Все</a>
            <div class="clear"></div>
        </div>-->
        <div class="tours_list">
            <?
            $k = 0;
            $r = 1;
            $B1 = 1;
            $B2 = 1;
            $B3 = 1;
            $B4 = 1;
            ?>
            <!--<div class="tours_row" data-row="1">
                <?/*foreach($arResult["ITEMS"] as $key => $arItem ){$k++;*/?>
                <?/*$C_ID = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];*/?>
                    <?/*if($C_ID == 94){*/?>
                        <?/*if($B1<7){*/?>
                            <div class="tour_element" data-country="<?/*=$C_ID*/?>">
                                <?/*
                                $img_id = $arItem["PREVIEW_PICTURE"]["ID"];
                                $renderImage = CFile::ResizeImageGet($img_id, Array("width" => 279, "height" => 200));
                                */?>
                                <div class="img_bg" style="background-image: url('<?/*=$renderImage["src"]*/?>')"></div>
                                <div class="name_price">
                                    <span class="tour_name"><?/*=$arItem["NAME"]*/?></span>
                                    <?/*if($arItem["PROPERTIES"]["PRICE"]["VALUE"]){*/?>
                                        <span class="tour_price">от <?/*=$arItem["PROPERTIES"]["PRICE"]["VALUE"]*/?></span>
                                    <?/*}*/?>
                                </div>
                                <a href="<?/*=$arItem["DETAIL_PAGE_URL"]*/?>" title="<?/*=$arItem["NAME"]*/?>">Подробнее</a>
                            </div>
                        <?/*}$B1++;*/?>
                    <?/*}*/?>
                    <?/*if($C_ID == 112){*/?>
                        <?/*if($B4<7){*/?>
                            <div class="tour_element" data-country="<?/*=$C_ID*/?>">
                                <?/*
                                $img_id = $arItem["PREVIEW_PICTURE"]["ID"];
                                $renderImage = CFile::ResizeImageGet($img_id, Array("width" => 279, "height" => 200));
                                */?>
                                <div class="img_bg" style="background-image: url('<?/*=$renderImage["src"]*/?>')"></div>
                                <div class="name_price">
                                    <span class="tour_name"><?/*=$arItem["NAME"]*/?></span>
                                    <?/*if($arItem["PROPERTIES"]["PRICE"]["VALUE"]){*/?>
                                        <span class="tour_price">от <?/*=$arItem["PROPERTIES"]["PRICE"]["VALUE"]*/?></span>
                                    <?/*}*/?>
                                </div>
                                <a href="<?/*=$arItem["DETAIL_PAGE_URL"]*/?>" title="<?/*=$arItem["NAME"]*/?>">Подробнее</a>
                            </div>
                        <?/*}$B4++;*/?>
                    <?/*}*/?>
                <?/*}*/?>
                <div class="clear"></div>
            </div>-->
            <div class="tours_row" style="display: block">
                <?foreach($arResult["ITEMS"] as $key => $arItem ){?>
                    <div class="tour_element">
                        <?
                        $img_id = $arItem["PREVIEW_PICTURE"]["ID"];
                        $renderImage = CFile::ResizeImageGet($img_id, Array("width" => 279, "height" => 200));
                        ?>
                        <div class="img_bg" style="background-image: url('<?=$renderImage["src"]?>')"></div>
                        <div class="name_price">
                            <span class="tour_name"><?=$arItem["NAME"]?></span>
                            <?if($arItem["PROPERTIES"]["PRICE"]["VALUE"]){?>
                                <span class="tour_price">от <?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?></span>
                            <?}?>
                        </div>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">Подробнее</a>
                    </div>
                <?}?>
                <div class="clear"></div>
            </div>
            <?/*?>
            <div class="tours_row" data-row="1">
                <?foreach($arResult["ITEMS"] as $key => $arItem ){$k++;?>
                <?$C_ID = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];?>
                    <?if($C_ID == 94 || 109 || 112){?>
                        <div class="tour_element" data-country="<?=$C_ID?>">
                            <div class="img_bg" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]['SRC']?>')"></div>
                            <div class="link_block">
                                <div class="name_price">
                                    <span class="tour_name"><?=$arItem["NAME"]?></span>
                                    <span class="tour_price">от 999$</span>
                                </div>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">Подробнее</a>
                            </div>
                        </div>
                        <?if($k % 3 == 0) { $r++;?>
                            <div class="clear"></div>
                            </div>
                            <div class="tours_row" data-row="<?=$r?>">
                        <?}?>
                    <?}?>
                <?}?>
            </div>
            <?*/?>
        </div>
    </div>
<? } ?>