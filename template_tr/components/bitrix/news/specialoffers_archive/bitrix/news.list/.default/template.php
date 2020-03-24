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
<? if (!empty($arResult["ITEMS"])) { ?>
<div class="row-1 row-inner white-bg mb-col-dist">
    <div class="col">
        <h2 class="mt-col-dist">Специальные предложения по <?=$arParams['TITLE']?></h2>
        <div class="row-1 row-3-sm">
            <?if(!empty($_REQUEST["arrFilter_pf"]["COUNTRY"])){?>
                <?$url = $_REQUEST["arrFilter_pf"]["COUNTRY"];?>
                <?foreach($arResult["ITEMS"] as $arItem) { ?>
                    <?$select = $arItem["PROPERTY_240"];?>
                    <? if($select==$url) { ?>
                        <div class="col">
                            <div class="special-item-inner">
                                <div style="position: relative;">
                                    <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                                    <p class="hotel-name"><?echo $arItem["NAME"] /*?>
                                    &nbsp;
                                    <?
                                    $arHotel = $arResult['HOTELS'][$arItem['PROPERTIES']['hotel']['VALUE']];
                                    ?>
                                    <? foreach($arHotel['PROPERTY_STAR_CATEGORY_VALUE'] as $star) { ?>
                                        <?=$star?>*
                                    <? } ?>
                                    <? foreach($arHotel['PROPERTY_STAR_CATEGORY_TYPE_VALUE'] as $star) { ?>
                                        <?=$star?>
                                    <? } */?>
                                    </p>
                                    <a class="absolute-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                                </div>
                                <div class="hotel-description"><?=$arItem['PREVIEW_TEXT']?></div>
                                <!--<a href="<?/*=$arItem["DISPLAY_PROPERTIES"]['link']["VALUE"]*/?>" class="btn btn-red btn-100">забронировать</a>-->
                            </div>
                        </div>
                    <? } ?>
                <? } ?>
            <? } else { ?>
                <?foreach($arResult["ITEMS"] as $arItem) { ?>
                    <div class="col">
                        <div class="special-item-inner">
                            <div style="position: relative;">
                                <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                                <p class="hotel-name"><?echo $arItem["NAME"] /*?>
                                &nbsp;
                                <?
                                $arHotel = $arResult['HOTELS'][$arItem['PROPERTIES']['hotel']['VALUE']];
                                ?>
                                <? foreach($arHotel['PROPERTY_STAR_CATEGORY_VALUE'] as $star) { ?>
                                    <?=$star?>*
                                <? } ?>
                                <? foreach($arHotel['PROPERTY_STAR_CATEGORY_TYPE_VALUE'] as $star) { ?>
                                    <?=$star?>
                                <? } */?>
                                </p>
                                <a class="absolute-link" href="/specialoffers/<?=$arItem["CODE"]?>/"></a>
                            </div>
                            <div class="hotel-description"><?=$arItem['PREVIEW_TEXT']?></div>
                            <?if($arItem["DISPLAY_PROPERTIES"]['link']["VALUE"]){?>
                                <!--<a href="<?/*=$arItem["DISPLAY_PROPERTIES"]['link']["VALUE"]*/?>" class="btn btn-red btn-100">забронировать</a>-->
                            <?}?>
                        </div>
                    </div>
                <? }?>
            <? }?>
        </div>
        <div class="hotels-list-pagination">
            <?=$arResult["NAV_STRING"]?>
        </div>
    </div>
</div>
<? } ?>