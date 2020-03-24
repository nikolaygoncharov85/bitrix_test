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
            <div class="row-1 row-recommend">
                <div class="col without-padding">
                    <div class="recommend-img-main">
                        <img src="<?=$arParams['UF_POPULAR_PHOTO']?>" alt="">
                        <h2>Популярные отели</h2>
                    </div>
                </div>
                <div class="col">
                    <ul class="recommended-hotels-list">
                        <?foreach($arResult["ITEMS"] as $key => $arItem) {?>
                        <li>
                            <p class="hotel-name"><?=$arItem['NAME']?>&nbsp;


                                <? foreach($arItem['PROPERTIES']['STAR_CATEGORY']['VALUE'] as $star) { ?>
                                    <?=$star?>*
                                <? } ?>


                                <? foreach($arItem['PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE'] as $star) { ?>
                                    <?=$star?>
                                <? } ?>

                            </p>
                            <p><?=strip_tags($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE'])?> / <?=strip_tags($arItem['DISPLAY_PROPERTIES']['CITY']['DISPLAY_VALUE'])?></p>
                            <a class="btn btn-red" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
                        </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<? } ?>