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

<div class="container">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="row">
            <!--<div class="col-lg-12 col-md-12 col-sm-12"><?/*=$GLOBALS["TEXT_UP"]*/?></div>-->
            <?foreach($arResult["ITEMS"] as $arItem) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="recommended_item hotels_list_item" style="height: 492px;">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['IMG'] ?>" alt="">
                    <div class="recommended_item_content">
                        <p style="min-height: 40px; margin-bottom: 10px;" class="recommended_item_name"><?= $arItem['NAME'] ?></p>
                        <p class="recommended_item_des"><?= $arItem['PREVIEW_TEXT'] ?></p>
                        <a style="position: absolute; bottom: 30px; right: 26%;" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn btn-default btn-sm news_item_link">Подробнее </a>
                    </div>
                </div>
            </div>
            <? } ?>
            <div class="clear"></div>
        <!--<div class="col-lg-12 col-md-12 col-sm-12"><?/*=$GLOBALS["TEXT_DOWN"]*/?></div>-->
        </div>
    </div>
    <?if($arResult[SECTION][ARCHIVE] == "Y"){?>
        <div style="text-align: center;" class="col-lg-9 col-md-9 col-sm-12">
            <a href="/newsarchive/" style="color: red;text-decoration:underline;font-size: 16px;">Архив новостей</a>
        </div>
    <?}?>
</div>
