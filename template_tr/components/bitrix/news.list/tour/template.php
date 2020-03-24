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


<div class="container white-bg">
    <h2>Туры</h2>
    <div class="tabs">
        <ul class="tabs-list">
            <?
            $key = 0;
            foreach($arResult['TABS'] as $arSection) { ?>
            <li class="tabs-item <?if ($key==0) { ?> active<? } ?>">
                <a href="#"><?=$arSection['NAME']?></a>
            </li>
            <?
            $key++;
            } ?>
            <li class="tabs-item">
                <a href="#">Все</a>
            </li>
        </ul>
    </div>
    <ul class="tabs-content">
        <? $key = 0; ?>
        <? foreach($arResult['TABS'] as $arSection) { ?>
        <li class="tabs-content-item <?if ($key==0) { ?> active<? } ?>">
            <div class="row-1 row-3-sm">
                <? foreach($arResult['ITEMS'] as $arItem) {

                    if ($arItem['DISPLAY_PROPERTIES']['COUNTRY']['VALUE'] == $arSection['ID']) {
                    ?>
                <div class="col">
                    <div class="tour-block">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt=""/>
                        <div class="tour-block-descr">
                            <p class="tour-block-descr-name"><?=$arItem['NAME']?></p>
                            <div class="tour-block-descr-price">от <?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div>
                            <a class="btn btn-red btn-100" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
                        </div>
                        <a class="absolute-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
                    </div>
                </div>
                <? }
                } ?>
            </div>
        </li>
        <?
            $key++;
        } ?>

        <li class="tabs-content-item">
            <div class="row-1 row-3-sm">
                <? foreach($arResult['ITEMS'] as $arItem) {?>
                    <div class="col">
                        <div class="tour-block">
                            <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt=""/>
                            <div class="tour-block-descr">
                                <p class="tour-block-descr-name"><?=$arItem['NAME']?></p>
                                <div class="tour-block-descr-price">от <?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div>
                                <a class="btn btn-red btn-100" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
                            </div>
                            <a class="absolute-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
                        </div>
                    </div>
                <? } ?>
            </div>

            <!--div class="hide-block">
                <div class="row-1 row-3-sm">
                    <div class="col">
                        <div class="tour-block">
                            <img src="/img/content/index/tour1.jpg" alt=""/>
                            <div class="tour-block-descr">
                                <p class="tour-block-descr-name">Le Méridien Bangkok</p>
                                <div class="tour-block-descr-price">от 900$</div>
                                <a class="btn btn-red btn-100" href="#">Подробнее</a>
                            </div>
                            <a class="absolute-link" href="#"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="tour-block">
                            <img src="/img/content/index/tour1.jpg" alt=""/>
                            <div class="tour-block-descr">
                                <p class="tour-block-descr-name">Le Méridien Bangkok</p>
                                <div class="tour-block-descr-price">от 900$</div>
                                <a class="btn btn-red btn-100" href="#">Подробнее</a>
                            </div>
                            <a class="absolute-link" href="#"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="tour-block">
                            <img src="/img/content/index/tour1.jpg" alt=""/>
                            <div class="tour-block-descr">
                                <p class="tour-block-descr-name">Le Méridien Bangkok Le Méridien Méridien Bangkok</p>
                                <div class="tour-block-descr-price">от 900$</div>
                                <a class="btn btn-red btn-100" href="#">Подробнее</a>
                            </div>
                            <a class="absolute-link" href="#"></a>
                        </div>
                    </div>
                </div>
            </div-->
            <!--a href="#" class="show-hide-block"></a-->

        </li>
    </ul>
</div>

<? } ?>