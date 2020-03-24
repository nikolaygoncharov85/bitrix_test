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
    .left-sidebar {
        display: none !important;
    }
    .page-content {
        width: 100% !important;
    }
</style>
<div class="page-content">
    <ul class="excursion-list">
        <?foreach($arResult["ITEMS"] as $arItem) { ?>

            <li class="excursion-item">
                <div class="excursion-item-title">
                    <div class="excursion-order">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-red btn-small">подробнее</a>
                    </div>
                    <h2><?=$arItem['NAME']?></h2>
                </div>
                <div class="row-1 row-2-sm row-inner">
                    <div class="col without-padding">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                    </div>
                    <div class="col">
                        <div class="text">
                            <p>
                                <?=$arItem['PREVIEW_TEXT']?>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        <? } ?>
    </ul>
    <?=$arResult["NAV_STRING"]?>
</div>