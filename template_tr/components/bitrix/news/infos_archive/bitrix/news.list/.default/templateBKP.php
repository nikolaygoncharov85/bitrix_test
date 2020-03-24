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


<div class="col-lg-9 col-md-9 col-sm-12">
    <div class="row">
<div class="col-lg-12 col-md-12 col-sm-12"><?=$GLOBALS["TEXT_UP"]?></div>
        <?foreach($arResult["ITEMS"] as $arItem) { ?>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="recommended_item hotels_list_item" style="height: 492px;">
                <img src="<?= $arItem['PREVIEW_PICTURE']['IMG'] ?>" alt="">
                <div class="recommended_item_content">
                    <!--p class="recommended_item_type">Отель</p-->
                    <p class="recommended_item_name"><?= $arItem['NAME'] ?></p>
                    <!--p class="recommended_item_position">Юго-Запад Сардинии</p-->
                    <p class="recommended_item_des"><?= $arItem['PREVIEW_TEXT'] ?></p>
                    <!--p class="recommended_item_price">от 596 €</p-->
                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn btn-default btn-sm">Подробнее <span class="icon icon-btn-arrow"></span></a>
                </div>
            </div>
        </div>
        <? } ?>
<div class="col-lg-12 col-md-12 col-sm-12"><?=$GLOBALS["TEXT_DOWN"]?></div>
    </div>
</div>