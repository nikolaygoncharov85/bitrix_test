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


    <div class="bottom-slider">
        <h2>vip-услуги</h2>
        <div class="bottom-carousel-block">
            <div class="bottom-carousel">
                <ul class="bottom-carousel-list">
                    <? foreach($arResult["ITEMS"] as $arItem) { ?>
                    <li>
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                            <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt=""/>
                            <p class="bottom-carousel-photo-name"><?=$arItem['NAME']?></p>
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-red">подробнее</a>
                        </a>
                    </li>
                    <? } ?>

                </ul>
            </div>
            <a href="#" class="jcarousel-control-prev"></a>
            <a href="#" class="jcarousel-control-next"></a>
        </div>

    </div>

<? } ?>