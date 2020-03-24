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
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col without-padding">
            <div class="main-img-block">
                <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
            </div>
        </div>
        <div class="col">
            <div class="text text-block-padding">
                <p>
                    <?=$arResult['PREVIEW_TEXT']?>
                </p>
            </div>
        </div>
    </div>

    <? if (strlen($arResult['DETAIL_TEXT']) > 0) { ?>
    <div class="row-1 row-inner white-bg inner-page-text">
        <div class="col">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    </div>
    <? } ?>

    <? if (!empty($arResult['PROPERTIES']['hotel']['LIST'])) { ?>
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <h2 class="mt-col-dist">Отели поблизости</h2>
            <div class="row-1 row-3-sm">
                <? foreach($arResult['PROPERTIES']['hotel']['LIST'] as $arHotel) { ?>
                <div class="col">
                    <div class="special-item-inner">
                        <img src="<?=$arHotel['PICTURE']?>" alt="">
                        <p class="hotel-name">
                            <?=$arHotel['NAME']?>
                            <?=$arHotel['STAR_TYPE']?>
                            <?=$arHotel['STAR']?>
                            <span class="icon icon-star"></span>
                        </p>
                        <div class="hotel-description">
                            <?=$arHotel['LIST']?>
                        </div>
                        <a href="<?=$arHotel['BOOKING']?>" class="btn btn-red btn-100">забронировать</a>
                        <a class="absolute-link" href="#"></a>
                    </div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
    <? } ?>
</div>