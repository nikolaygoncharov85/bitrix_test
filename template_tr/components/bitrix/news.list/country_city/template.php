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
<ul class="excursion-list">
    <?foreach($arResult["ITEMS"] as $arItem) { ?>
        <li class="excursion-item">
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="excursion-item-a">
                <div class="excursion-item-title">
                    <h2>
                        <div class="tours-list-item-title"><?=$arItem['NAME']?></div>
                        <? if ($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE']) { ?>
                            <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE'])?></div>
                        <? } ?>
                    </h2>
                </div>
                <div class="row-1 row-2-sm row-inner wrapper_hide">
                    <div class="col without-padding">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                    </div>
                    <div class="col wrapper_text_hide">
                        <div class="text"><?=$arItem['PREVIEW_TEXT']?></div>
                        <div class="wrapper_opacity_hide"></div>
                    </div>
                </div>
            </a>
            <div class="excursion-order">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-red">подробнее</a>
            </div>
            <div class="clearfix"></div>
        </li>
    <? } ?>
</ul>