<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["ITEMS"])) { ?>
<div class="row-1 row-inner white-bg mb-col-dist">
    <?foreach($arResult["ITEMS"] as $arItem) { ?>
    <div class="col">
        <div class="text-block-padding">
            <div class="excursion-item-title">
                <div class="special-main-price">
                    <? if (!empty($arItem["DISPLAY_PROPERTIES"]['PRICE']["VALUE"])) { ?>
                    от <?=$arItem["DISPLAY_PROPERTIES"]['PRICE']["VALUE"]?>
                    <? } ?>
                </div>
                <h2><?=$arItem["NAME"]?><span class="icon icon-star"></span></h2>
            </div>
            <div class="row-1 row-2-sm row-inner">
                <div class="col without-padding">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                </div>
                <div class="col">
                    <div class="text">
                        <p>
                            <?=$arItem["PREVIEW_TEXT"]?>
                        </p>
                    </div>
                    <div class="more-link">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Условия бронирования</a>
                    </div>

                    <? if (!empty($arItem["PROPERTIES"]['action_date']["VALUE"])) { ?>
                    <div class="timer-bg">
                        <p class="timer-title">Успейте до завершения акции!</p>
                        <div class="count-down-timer" data-time-end="<?=date('Y/m/d', strtotime($arItem["PROPERTIES"]['action_date']["VALUE"]))?>" data-time-format="%H:%M:%S"></div>
                        <a href="<?=$arItem["PROPERTIES"]['link']["VALUE"]?>" class="btn btn-red btn-padding">забронировать  сейчас</a>
                    </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <? } ?>
</div>
<? } ?>