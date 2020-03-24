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
<?if($arResult['PROPERTIES']['PHOTO']['VALUE']>0){?>
    <div class="row-1 row-inner mb-col-dist">
        <div class="col without-padding">
            <div class="main-img-block">
                <div class="swiper-container swiper-gallery">
                    <div class="swiper-wrapper">
                        <? foreach($arResult['PROPERTIES']['PHOTO']['VALUE'] as $arPhoto) { ?>
                            <div class="swiper-slide">
                                <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="gallery1" title="<?=$arPhoto['description']?>">
                                    <img src="<?=$arPhoto['preview']?>" alt="">
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <div class="gallery-thumbs-prev"></div>
                    <div class="gallery-thumbs-next"></div>
                </div>
            </div>
        </div>
    </div>
<?}else{?>
    <div class="row-1 row-inner white-bg mb-col-dist page_title_img">
        <div class="col without-padding">
            <div class="main-img-block">
                <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
            </div>
        </div>
    </div>
<?}?>
<? if (strlen($arResult['DETAIL_TEXT']) > 0) { ?>
    <div class="row-1 row-inner white-bg inner-page-text">
        <div class="col">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    </div>
<? } ?>