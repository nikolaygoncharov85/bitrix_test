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
<?$page = $APPLICATION->GetCurPage();?>
<?if($page=='/'){?>
    <?/*<?
    $k = 0;
    $res = CIBlockElement::GetList(array(),array('IBLOCK_ID' => 25, 'ACTIVE'=>'Y'));
    while($ob = $res->GetNext()) {
         $k++;
    }?>
    <? if ($k > 0) { ?>
        <ul class="rslides">
            <?
            $res2 = CIBlockElement::GetList(array(),array('IBLOCK_ID' => 25, 'ACTIVE'=>'Y', 'property_LINK'));
            while($arItem = $res2->GetNext()){
                $filePreview = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width' => 2048, 'height' => 1024), BX_RESIZE_IMAGE_EXACT, false);
                $img = $filePreview["src"];
                ?>
                <li style="background-image: url('<?=$img?>')">
                    <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
                        <div class="container">
                            <div class="text-main-slider">
                                <p><?=$arItem['NAME']?></p>
                                <div class="text-main-slider-sep"></div>
                                <p><?=$arItem['PREVIEW_TEXT']?></p>
                                <span class="btn btn-red" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">Подробнее</span>
                            </div>
                        </div>
                    </a>
                </li>
            <?}?>
        </ul>
        <a href="#" class="rslides_nav rslides1_nav prev" style="display: none"></a>
        <a href="#" class="rslides_nav rslides1_nav next" style="display: none"></a>
        <div id="pager" style="display: none"></div>
    <? } ?>*/?>
    <? if (count($arResult["ITEMS"]) > 0) { ?>
        <ul class="rslides">
            <? foreach($arResult["ITEMS"] as $arItem) { ?>
                <li style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')">
                    <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
                        <!--<img src="<?/*=$arItem['PREVIEW_PICTURE']['SRC']*/?>" alt="">-->
                        <div class="container">
                            <div class="text-main-slider">
                                <p><?=$arItem['NAME']?></p>
                                <div class="text-main-slider-sep"></div>
                                <p><?=$arItem['PREVIEW_TEXT']?></p>
                                <span class="btn btn-red" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">Подробнее</span>
                            </div>
                        </div>
                    </a>
                </li>
            <? } ?>
        </ul>
        <a href="#" class="rslides_nav rslides1_nav prev"></a>
        <a href="#" class="rslides_nav rslides1_nav next"></a>
        <div id="pager" style="display: none"></div>
    <? } ?>
<?}?>