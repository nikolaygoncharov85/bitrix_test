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
    .excursion-item-title .tours-list-item-title {
        color: #013f56;
        font-weight: bold;
    }
    .excursion-list li {
        margin-bottom: 30px;
    }
</style>
<div class="page-content">
    <ul class="excursion-list">
        <?foreach($arResult["ITEMS"] as $arItem) { ?>
            <li class="excursion-item">
                <div class="excursion-item-title">
                    <h2>
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem['NAME']?>" class="tours-list-item-title"><?=$arItem['NAME']?></a>
                        <? if ($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE']) { ?>
                        <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE'])?></div>
                        <? } ?>

                        <? if ($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']) { ?>
                            <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE'])?></div>
                        <? } ?>
                    </h2>
                </div>
                <div class="row-1 row-2-sm row-inner">
                    <div class="col without-padding">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem['NAME']?>">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="<?=$arItem['NAME']?>">
                        </a>
                    </div>
                    <div class="col">
                        <div class="text">
                            <?=$arItem['PREVIEW_TEXT']?>
                        </div>
                    </div>
                </div>
            </li>
        <? } ?>
    </ul>
    <?=$arResult["NAV_STRING"]?>
</div>
<script type="text/javascript">
    $(".breadcrumb li").each(function(){
        if($(this).find('a').text()=='Страны'){
            $(this).find('a').text('Италия');
            $(this).find('a').attr('href','/countries/italiya/')
        }
    });
</script>