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
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <h2 class="mt-col-dist">Ближайшие туры</h2>
            <div class="row-1 row-3-sm">
                <?foreach($arResult["ITEMS"] as $key => $arItem) {?>
                <div class="col">
                    <div class="special-item-inner">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt="">
                        <p class="hotel-name">
                            <?=$arItem['NAME']?>
                        </p>
                        <a href="<?=$arItem['PROPERTIES']['link']['VALUE']?>" class="btn btn-red btn-100">забронировать</a>
                        <a class="absolute-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
                    </div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
<? } ?>