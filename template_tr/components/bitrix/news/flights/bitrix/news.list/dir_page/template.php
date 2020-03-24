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
    .excursion-list li.excursion-item + li {
        margin-top: 0px !important;
    }
    .excursion-list li.excursion-item {
        padding:15px !important;
    }
</style>
<div class="page-content" style="background: #ffffff;">
    <blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;">
        <h1 style="text-align: left;"><b>ИНФОРМАЦИЯ ДЛЯ АВИАПАССАЖИРОВ</b></h1>
    </blockquote>
    <ul class="excursion-list list_for_style">
        <?foreach($arResult["ITEMS"] as $arItem){?>
            <?if($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']==''){?>
                <li class="excursion-item">
                    <div class="excursion-item-title">
                        <a href="<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem["NAME"]?></a>
                    </div>
                    <div class="text">
                        <?=$arItem['PREVIEW_TEXT'];?>
                    </div>
                </li>
            <?}?>
        <?}?>
    </ul>
</div>
