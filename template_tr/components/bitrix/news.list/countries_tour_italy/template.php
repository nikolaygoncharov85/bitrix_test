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
    .bottom-carousel.tours_near {
        width: 100% !important;
    }
    .bottom-carousel.tours_near li a.btn {
        position: relative;
        margin: 20px auto 20px auto;
        text-transform: uppercase;
        padding: 0 7px;
        display: block;
        width: auto;
        left: auto;
        right: auto;
    }
    .bottom-carousel-block a.jcarousel-control-prev {
        left: 2px;
    }
    .bottom-carousel-block a.jcarousel-control-next {
        right: 2px;
    }
</style>
<div style="display: block;">
    <? if (count($arResult["ITEMS"]) > 0) { ?>
        <?
        $i =0;
        foreach($arResult["ITEMS"] as $key => $arItem) {
            $i++;
        }?>
        <div class="row-1 row-inner white-bg mb-col-dist">
            <div class="col bottom-carousel-block">
                <h2 class="mt-col-dist">Ближайшие туры</h2>
                <div class="row-1 row-3-sm bottom-carousel tours_near">
                    <ul class="bottom-carousel-list" style="width: 20000px !important;">
                        <?foreach($arResult["ITEMS"] as $key => $arItem) {?>
                            <li class="col1">
                                <div class="special-item-inner">
                                    <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt="">
                                    <p class="hotel-name">
                                        <?=$arItem['NAME']?>
                                    </p>
                                    <a href="<?=$arItem['PROPERTIES']['link']['VALUE']?>" class="btn btn-red btn-100">забронировать</a>
                                    <a class="absolute-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
                                </div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
                <?if($i>3){?>
                    <a href="#" class="pr jcarousel-control-prev" style="display: block;" data-jcarouselcontrol="true"></a>
                    <a href="#" class="ne jcarousel-control-next" style="display: block;" data-jcarouselcontrol="true"></a>
                <?}?>
            </div>
        </div>
    <? } ?>
</div>