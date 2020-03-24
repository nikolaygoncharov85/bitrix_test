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

<div class="row-1 row-inner white-bg mb-col-dist inner-page-text">
    <div class="col">

        <a href="/sight/?arrFilter_pf[COUNTRY]=<?=$arParams['SECTION_ID']?>&set_filter=Фильтр&set_filter=Y">
        <h3>Развлечения и достопримечательности <?=$arParams['TITLE']?></h3>
        </a>

        <?foreach($arResult["ITEMS"] as $key => $arItem) {
            if ($key > 0) {
                continue;
            }
            ?>

        <div class="row-1 row-recommend ">
            <div class="col">
                <div class="recommend-img-main">
                    <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt="">
                </div>
            </div>
            <div class="col">
                <div class="text">
                    <a href="/sight/?arrFilter_pf[COUNTRY]=<?=$arParams['SECTION_ID']?>&set_filter=Фильтр&set_filter=Y">
                    <h2><?=$arItem['NAME']?></h2>
                    </a>
                    <p><?=$arItem['PREVIEW_TEXT']?></p>
                </div>
            </div>
        </div>
        <hr>
        <? }?>
        <? if (count($arResult["ITEMS"]) > 1) { ?>
        <p class="others-sight-title">Другие достопримечательности:</p>
        <ul class="others-sight-list">
            <?foreach($arResult["ITEMS"] as $key => $arItem) {
                if ($key == 0) {
                    continue;
                }
                ?>
            <li><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></li>
            <? } ?>
        </ul>
        <? } ?>
    </div>
</div>
<? } ?>