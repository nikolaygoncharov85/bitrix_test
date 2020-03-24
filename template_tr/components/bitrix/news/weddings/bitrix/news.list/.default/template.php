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
        <div class="excursion-item-title">
            <div class="excursion-order">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-red">подробнее...</a>
            </div>
            <h2>
                <div class="tours-list-item-title">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                </div>
                <? if ($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE']) { ?>
                <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE'])?></div>
                <? } ?>

                <? if ($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']) { ?>
                <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE'])?></div>
                <? } ?>
            </h2>
        </div>
        <div class="row-1 row-2-sm row-inner">
            <div class="col without-padding">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
            </div>
            <div class="col">
                <div class="text">
                    <?=$arItem['PREVIEW_TEXT']?>
                </div>
            </div>
        </div>
    </li>
    <? } ?>
</ul>
<?=$arResult["NAV_STRING"]?>