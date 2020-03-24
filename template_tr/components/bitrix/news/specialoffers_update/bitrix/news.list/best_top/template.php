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
$obMaster = new CMainMaster();
$rateRubUsd=$obMaster->getCource();
$rateRubEur=$obMaster->getCource("EUR");
?>
<? if (!empty($arResult["ITEMS"])){?>
    <div class="container without-padding">
        <div class="best_spo_slider relative">
            <div class="best_spo table">
                <?foreach($arResult["ITEMS"] as $key => $arItem){?>
                    <?
                    $filePreview = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width' => 480, 'height' => 440), BX_RESIZE_IMAGE_EXACT, false);
                    $action_date = strtotime($arItem["PROPERTIES"]['action_date']["VALUE"]);
                    $now = time();
                    $time_to_action_date = $action_date - $now;
                    $days = floor($time_to_action_date/3600/24);
                    $day = 0;
                    $spo_end = '';
                    if($days > 0){$day = $days;}else{$spo_end = 'Акция закончилась';}
                    $mess = strip_tags($arItem["PREVIEW_TEXT"]);
                    $mess2 = mb_substr($mess, 0, 150, 'UTF-8') . '...';
                    ?>
                    <div class="best_spo_li table">
                        <div class="img_slider_spo table-cell relative" style="background-image: url('<?=$filePreview["src"]?>')"></div>
                        <div class="best_spo_content relative table-cell">
                            <h3 class="block float_left"><?=$arItem["NAME"]?></h3>
                            <?if($arItem["PROPERTIES"]["PRICE"]["VALUE"]){?>
                                <span class="best_spo_price block absolute"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?></span>
                            <?}?>
                            <div class="clear"></div>
                            <?if($arItem["PREVIEW_TEXT"]){?>
                                <div class="best_spo_text">
                                    <?=$mess2?>
                                </div>
                            <?}?>
                            <?if($arItem["PROPERTIES"]["booking_conditions"]["VALUE"]["TEXT"]){?>
                                <div>
                                    <span class="best_spo_conditions relative">
                                        условия бронирования
                                        <div class="absolute best_spo_conditions_text"><?=$arItem["PROPERTIES"]["booking_conditions"]["~VALUE"]["TEXT"]?></div>
                                    </span>
                                </div>
                            <?}?>
                            <div class="best_spo_booking table">
                                <img src="/specialoffers/img/best_spo_timer.svg"/>
                                <span class="best_spo_timer_span table-cell">
                                    <?if($day>0){?>
                                        <b class="block">Внимание!</b>
                                        До завершения акции осталось всего
                                        <b class="best_spo_timer"><?=$day?> дней!</b>
                                    <?}else{?>
                                        <b><?=$spo_end?></b>
                                    <?}?>
                                </span>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>" target="_blank" class="best_spo_booking">Подробнее</a>
                            </div>
                        </div>
                    </div>
                <?}?>
            </div>
            <div class="absolute img_slider_spo_pager"></div>
        </div>
    </div>
<? } ?>