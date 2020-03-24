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
    <div class="container without-padding white-bg">
        <div class="row-1 row-recommend">

            <div class="col">
                <div class="recommend-img-main">
                    <img src="<?=$arResult['PICTURE_SRC']?>" alt=""/>
                    <h2>Рекомендуем посетить</h2>
                </div>
            </div>

            <div class="col">
                <div class="find-hotels">
                    <form class="find-hotels-form" method="get" action="/hotels/">
                        <input class="find-hotels-input" type="text" name="q" placeholder="Поиск отеля"/>
                        <input class="find-hotels-btn" type="submit" value=""/>
                    </form>
                </div>
                <ul class="recommended-hotels-list">
                    <?foreach($arResult["ITEMS"] as $arItem) { ?>
                    <li>
                        <p class="hotel-name"><?=$arItem['NAME']?>

                        <? if (!empty($arItem['PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE']) && !empty($arItem['PROPERTIES']['STAR_CATEGORY']['VALUE'])) { ?>
                            <?=implode('', $arItem['PROPERTIES']['STAR_CATEGORY']['VALUE'])?>*
                        <? } elseif(empty($arItem['PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE']) && !empty($arItem['PROPERTIES']['STAR_CATEGORY']['VALUE'])) { ?>
                            <?=implode(', ', $arItem['PROPERTIES']['STAR_CATEGORY']['VALUE'])?>*
                        <? } ?>

                        <p><?=strip_tags($arItem["DISPLAY_PROPERTIES"]['COUNTRY']["DISPLAY_VALUE"])?> / <?=strip_tags($arItem["DISPLAY_PROPERTIES"]['CITY']["DISPLAY_VALUE"])?></p>
                        <a class="btn btn-red" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
                    </li>
                    <? } ?>
                </ul>
            </div>

        </div>
    </div>
<? } ?>