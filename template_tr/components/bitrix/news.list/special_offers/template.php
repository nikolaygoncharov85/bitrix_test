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
<div class="container white-bg specialoffers_block specialoffers_block_n" style="display: block;">
    <div class="row-1 row-manager white-active-block">
        <div class="col-1">
            <div class="title-text center-text">Специальные предложения</div>
            <div class="row-1 row-3-sm table_ bottom-carousel-block" style="margin: 0 auto;">
                <div class="bottom-carousel">
                    <ul class="bottom-carousel-list">
                        <?foreach($arResult["ITEMS"] as $arItem) { ?>
                            <li style="float: left;box-sizing: border-box;padding: 0 15px;position: relative;">
                                <div class="col table-cell" style="width: 100% !important;">
                                    <div class="special-item-main li_height">
                                        <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt=""/>
                                        <p class="hotel-name">

                                        <p class="hotel-name"><?echo $arItem["NAME"] /*?>
                                            &nbsp;

                                            <?
                                            $arHotel = $arResult['HOTELS'][$arItem['PROPERTIES']['hotel']['VALUE']];
                                            ?>

                                            <? foreach($arHotel['PROPERTY_STAR_CATEGORY_VALUE'] as $star) { ?>
                                                <?=$star?>*
                                            <? } ?>

                                            <? foreach($arHotel['PROPERTY_STAR_CATEGORY_TYPE_VALUE'] as $star) { ?>
                                                <?=$star?>
                                            <? } */?>
                                        </p>

                                        </p>
                                        <div class="hotel-description">
                                            <?=$arItem['PREVIEW_TEXT']?>
                                        </div>
                                        <a class="absolute-link" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
                                        <div class="special-item-main special-item-main-preview-text">
                                            <?=$arItem['PREVIEW_TEXT']?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
                <a href="#" class="pr jcarousel-control-prev"></a>
                <a href="#" class="ne jcarousel-control-next"></a>
                <style type="text/css">
                    .specialoffers_block .bottom-carousel ul.bottom-carousel-list {
                        width: 20000px;
                    }
                    .specialoffers_block .pr.jcarousel-control-prev,
                    .specialoffers_block .ne.jcarousel-control-next {
                        display: block;
                    }
                    .specialoffers_block .pr.jcarousel-control-prev {
                        left: -1.5%;
                    }
                    .specialoffers_block .ne.jcarousel-control-next {
                        right: -1.5%;
                    }
                    .specialoffers_block .special-item-main:hover {
                        background: #013f56;
                        margin-top: 5.5%;
                        padding-top: 0;
                    }
                    .specialoffers_block    .special-item-main {
                        padding-bottom: 30% !important;
                        position: relative;
                        z-index: 1;
                    }
                    .specialoffers_block .special-item-main:hover .hotel-description {
                        display: none;
                    }
                    .specialoffers_block .hotel-description {
                        display: none;
                    }
                    .specialoffers_block .special-item-main .hotel-name {
                        bottom: inherit;
                    }
                    .specialoffers_block .bottom-carousel li {
                        padding: 0 !important;
                    }
                    .specialoffers_block .special-item-main-preview-text a {
                        color: #ffffff !important;
                    }
                </style>
                <script type="text/javascript">
                    $(document).ready(function(){
                        var h = 10;
                        setTimeout(function(){
                            $(".specialoffers_block_n ul").find('li').each(function(){
                                var li_h = $(this).height();
                                if(li_h>h){h=li_h;}
                            });
                            $(".specialoffers_block_n ul li").css('height', h);
                            var w = $(".specialoffers_block_n .white-active-block").width();
                            $(".specialoffers_block_n .white-active-block .col-1, .specialoffers_block_n .bottom-carousel").css('width', w);
                        }, 200);
                        $(window).resize(function(){
                            setTimeout(function(){
                                var w = $(".specialoffers_block_n .white-active-block").width();
                                $(".specialoffers_block_n .white-active-block .col-1, .specialoffers_block_n .bottom-carousel").css('width', w);
                            }, 200);
                        });
                    });
                </script>
            </div>
        </div>
        <div class="title-text center-text" style="margin-top: 10px;"><a href="/specialoffers/">Все предложения</a></div>
    </div>
</div>

<? } ?>