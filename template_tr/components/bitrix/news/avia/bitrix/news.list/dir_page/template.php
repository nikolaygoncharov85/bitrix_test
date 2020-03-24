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
<?if($_SERVER['REQUEST_URI']=='/avia/'){?>
<!--03.06.2016---------->
    <?
    $filePreview = CFile::ResizeImageGet($arResult["PICTURE"], array('width' => 725, 'height' => 355), BX_RESIZE_IMAGE_EXACT, false);
    ?>
    <div class="page-content">
        <?if($filePreview){?>
            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col without-padding">
                    <div class="main-img-block">
                        <img src="<?=$filePreview['src'];?>" alt=""/>
                    </div>
                </div>
            </div>
        <?}else{?>

        <?}?>
        <div class="row-1 row-inner white-bg inner-page-text">
            <div class="col">
                <?/*foreach($arResult["ITEMS"] as $arItem) {*/?><!--
                    <?/*if($arItem["ID"]=='5453'){*/?>
                        <div class="text">
                            <?/*=$arItem['DETAIL_TEXT']*/?>
                        </div>
                    <?/*}*/?>
                --><?/*}*/?>
                <?=$arResult['DESCRIPTION']?>
            </div>
        </div>
    </div>
<!--03.06.2016---------->

<!--<pre style="font-size: 12px;display: none;"><?/*var_dump($arResult);*/?></pre>-->

<?}else{?>
    <div class="page-content">
        <ul class="excursion-list">
            <?foreach($arResult["ITEMS"] as $arItem) { ?>
                <li class="excursion-item">
                    <div class="excursion-item-title">
                        <div class="excursion-order">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-red">подробнее</a>
                        </div>
                        <h2>
                            <div class="tours-list-item-title"><?=$arItem['NAME']?></div>
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
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
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
<?};?>
