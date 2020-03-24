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
    <div class="container white-bg news_new" style="display: block;">
        <div class="news_new_top relative">
            <span class="news_block_header">Новости</span>
            <a href="/news/">Все новости</a>
        </div>
        <div class="new_list">
            <?foreach($arResult["ITEMS"] as $key => $arItem ){?>
                <div class="news_element">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]['SRC']?>" alt="<?=$arItem["NAME"]?>"/>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>"><?=$arItem["NAME"]?></a>
                </div>
            <?}?>
            <div class="clear"></div>
        </div>
    </div>
<? } ?>
<?if($i){?>
    <? if (count($arResult["ITEMS"]) > 0) { ?>
        <div class="container white-bg specialoffers_block news_new" style="display: block;">
            <div class="row-1 row-manager white-active-block">
                <div class="col-1 col_w">
                    <div class="title-text center-text">Новости</div>
                    <div class="row-1 row-3-sm table_ bottom-carousel-block" style="margin: 0 auto;">
                        <div class="bottom-carousel">
                            <ul class="bottom-carousel-list">
                                <?
                                $count = count($arResult["ITEMS"]);
                                if ($count > 6)
                                    $count = 0;
                                for($b=0; $b<$count; $b++) {
                                    $a =$arResult["ITEMS"][$b]["DETAIL_PAGE_URL"];
                                    ?>
                                    <li class="col1" style="float: left;box-sizing: border-box;padding: 0 15px;position: relative;">
                                        <a class="block_a" href="<?=$a;?>" style="width: 100% !important;display: block;height: 100%;">
                                            <div class="news-item-main">
                                                <img src="<?=$arResult["ITEMS"][$b]["PREVIEW_PICTURE"]['SRC']?>" alt=""/>
                                                <div class="news_item_title"><?=$arResult["ITEMS"][$b]["NAME"]?></div>
                                                <div class="news_item_text"><?=$arResult["ITEMS"][$b]["PREVIEW_TEXT"];?></div>
                                            </div>
                                        </a>
                                    </li>
                                <? } ?>
                            </ul>
                        </div>
                        <a href="#" class="pr jcarousel-control-prev"></a>
                        <a href="#" class="ne jcarousel-control-next"></a>
                    </div>
                </div>
                <br>
                <div class="title-text center-text" style="margin-top: 10px;"><a href="/news/">Все новости</a></div>
            </div>
        </div>
    <? } ?>
<?}?>