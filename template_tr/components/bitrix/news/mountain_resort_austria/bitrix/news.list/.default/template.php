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
    span.show_map {
        cursor: pointer;
        /*color: #1191ed;*/
        color: blue;
        text-decoration: underline;
    }
    span.show_map:hover {
        text-decoration: underline;
    }
    .show_map_wrapper {
        display: none;
        position: fixed;
        background: rgba(0,0,0,0.7);
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
    }
    div.show_map {
        position: relative;
        width: 95%;
        margin: 0 auto;
        overflow-x: scroll;
    }
    div.show_map .close_map {
        position: absolute;
        top: 20px;
        right: 20px;
        color: #fff;
        transform: rotate(45deg);
        font-size: 70px;
        cursor: pointer;
        line-height: 30px;
    }
    div.show_map img {
        height: 95vh;
        width: auto;
        margin: 0 auto;
        display: block;
    }
</style>
<div class="page-content">
    <ul class="excursion-list">
        <?foreach($arResult["ITEMS"] as $arItem) { ?>
            <li class="excursion-item">
                <div class="excursion-item-title">
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
                        <a class="link_data" href="<?=$arItem['DETAIL_PAGE_URL']?>" data-link="<?=$arItem["CODE"]?>">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
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
    $("body").append('<div class="show_map_wrapper"><div class="show_map"><img src=""/><div class="close_map">+</div></div></div>');
    $("span.show_map").click(function(){
        var src = $(this).data('img');
        $(".show_map_wrapper").find('img').attr('src',src);
        $(".show_map_wrapper").show();
    });
    $("div.show_map .close_map").click(function(){
        $(".show_map_wrapper").hide();
        $("body").find(".show_map_wrapper").find('img').attr('src','');
    });
</script>