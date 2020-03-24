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
    <div class="row-1 row-inner">
        <div class="hotels-list-filter-block">
            <div class="hotels-list-filter">
                <span>Сортировать:</span>
                <a href="<?=$APPLICATION->GetCurPage()?>"<?if (empty($_REQUEST['by'])) {?> class="active"<? } ?>>По умолчанию</a>
                <a href="<?=$APPLICATION->GetCurPage()?>?by=PROPERTY_STAR" <?if ($_REQUEST['by'] == 'PROPERTY_STAR') {?> class="active"<? } ?>>По звездам</a>
                <a href="<?=$APPLICATION->GetCurPage()?>?by=NAME"<?if ($_REQUEST['by'] == 'NAME') {?> class="active"<? } ?>>По алфавиту</a>
                <div class="hotels-list-filter-type">
                    <a href="<?=$APPLICATION->GetCurPage()?>">Списком</a>
                    <a href="<?=$APPLICATION->GetCurPage()?>?view=maps" class="active">На карте</a>
                </div>
            </div>
        </div>
        <ul class="hotels-list">
            <?foreach($arResult["ITEMS"] as $arItem) { ?>
            <li class="hotel-item">
                <div class="excursion-item-title">
                    <div class="excursion-order">
                        от <?=$arItem["DISPLAY_PROPERTIES"]['PRICE']["VALUE"]?>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-red">Подробнее</a>
                    </div>
                    <h2><?echo $arItem["NAME"]?></h2>
                    <p class="hotel-item-position"><?=strip_tags($arItem["DISPLAY_PROPERTIES"]['COUNTRY']["DISPLAY_VALUE"])?> / <?=strip_tags($arItem["DISPLAY_PROPERTIES"]['CITY']["DISPLAY_VALUE"])?></p>
                </div>
                <div class="row-1 row-hotel row-inner">
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
        <div class="hotels-list-pagination">

            <?=$arResult["NAV_STRING"]?>

        </div>
    </div>
</div>