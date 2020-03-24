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
<h2><?=$arResult["NAME"]?></h2>
<div class="row-1 row-inner white-bg mb-col-dist">
    <?if($arResult["PROPERTIES"]["img_slider"]["VALUE"]){?>
        <div class="without-padding relative">
            <ul class="spo_detail_slider">
                <?foreach($arResult["PROPERTIES"]["img_slider"]["VALUE"] as $key_img => $img_item){?>
                    <?$filePreview = CFile::ResizeImageGet($img_item, array('width' => 724, 'height' => 500), BX_RESIZE_IMAGE_EXACT, false);?>
                    <li style="background-image: url('<?=$filePreview["src"]?>')"></li>
                <?}?>
            </ul>
            <div class="img_slider_spo_pager"></div>
            <div class="spo_detail_price">ОТ <?=$arResult["PROPERTIES"]["PRICE"]["VALUE"]?></div>
        </div>
    <?}?>
    <div class="col">
        <div class="spo_detail_place_date">
            <div class="width50 float_left">
                <?
                    $arHotelId = $arResult['PROPERTIES']['hotel']['VALUE'];
                    $arHotel = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>32,"ID"=>$arHotelId), false, array())->GetNext();
                    $arCityId = $arResult['PROPERTIES']['CITY']['VALUE'];
                    $arCity = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>27,"ID"=>$arCityId), false, array())->GetNext();
                ?>
                <a target="_blank" href="<?=$arCity["DETAIL_PAGE_URL"]?>" class="spo_city" title="<?=$arCity["NAME"]?>"><?=$arCity["NAME"]?></a>
                <a target="_blank" href="<?=$arHotel["DETAIL_PAGE_URL"]?>" class="spo_hotel" title="<?=$arHotel["NAME"]?>"><?=$arHotel["NAME"]?></a>
            </div>
            <?if(!empty($arResult["ACTIVE_FROM"])||!empty($arResult["DATE_ACTIVE_TO"])){?>
                <div class="width50 float_right text-right">
                    <span class="spo_date_time">
                        <?=ConvertDateTime($arResult["ACTIVE_FROM"], "DD-MM-YYYY")?> – <?=ConvertDateTime($arResult["DATE_ACTIVE_TO"], "DD-MM-YYYY")?>
                    </span>
                </div>
            <?}?>
            <div class="clear"></div>
        </div>
        <br>
        <button class="feedback_url_button float_left" href="#feedback_url_form">Получить консультацию</button>
        <?if (strlen($arResult['PROPERTIES']['link']["VALUE"]) > 0){?>
            <?
            if ($_SESSION['typeOfUser'] == 'b2b') {
                $link = $arResult['PROPERTIES']['link']["VALUE"];
            } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                $re = '/\/[a-zA-Z]\w+\//';
                $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['link']["VALUE"]);
                $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
            }
            ?>
            <a href="<?=($link)? $link : 'javascript:void(0)';?>" class="btn-link-order spo_booking_button" data-id="<?=$arResult['ID']?>">ЗАБРОНИРОВАТЬ</a>
            <div class="find_tour_b find_tour_b_btn find_tour_b_btn-excursion" id="find_tour_b_excursion-<?=$arResult['ID']?>">
                <div class="find_tour_title">
                    Кто я?
                </div>
                <div class="find_tour_list">
                    <?
                    $re = '/\/[a-zA-Z]\w+\//';
                    $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['link']["VALUE"]);
                    ?>
                    <div class="find_tour_item">
                        <span class="typeOfUser" style="display:none;" data-value="b2c"></span>
                        <a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx<?=$privateLink?>">Я частное лицо</a>
                    </div>
                    <div class="find_tour_item">
                        <span class="typeOfUser" style="display:none;" data-value="b2b"></span>
                        <a href="<?=$arResult['PROPERTIES']['link']["VALUE"]?>">Я агент</a>
                    </div>
                </div>
            </div>
        <?}?>
        <div class="clear"></div>
        <?if($arResult['PROPERTIES']['hotel']['VALUE']=="Y"){?>
            <span class="early_booking_title">Раннее бронирование!</span>
        <?}?>
        <div class="early_booking_description">
            <div class="early_booking_short" style="display: none">
                <?
                    $text = strip_tags($arResult["DETAIL_TEXT"]);
                    $text = mb_strcut($text,0,280, 'UTF-8'); //140 это кол. знаков
                ?>
                <?=$text?>
                <span class="read_more" style="display: none">Читать далее...</span>
            </div>
            <div class="early_booking_full">
                <?=$arResult["DETAIL_TEXT"]?>
                <span class="read_more_hide"> Свернуть</span>
            </div>
        </div>
        <?if($arResult['PROPERTIES']['early_booking']['VALUE']=="Y"){?>
            <div class="early_booking_block">
                <div class="spo_bonus">
                    <div>
                        <img src="/specialoffers/img/spo_bonus_icon.png"/>
                    </div>
                    <div>
                        <span class="bonus_title">Early booking</span>
                        <span class="bonus_description"><?=$arResult['PROPERTIES']['early_booking_text']['~VALUE']["TEXT"]?></span>
                    </div>
                </div>
            </div>
        <?}?>
    </div>
</div>
<div class="row-1 row-inner white-bg mb-col-dist feedback_url_form" id="feedback_url_form" style="display: none">
    <div class="col">
        <?$APPLICATION->IncludeComponent(
            "bitrix:form.result.new",
            "feedback_url_form",
            array(
                "SEF_MODE" => "Y",
                "WEB_FORM_ID" => "29",
                "LIST_URL" => "",
                "EDIT_URL" => "",
                "SUCCESS_URL" => "",
                "CHAIN_ITEM_TEXT" => "",
                "CHAIN_ITEM_LINK" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "Y",
                "USE_EXTENDED_ERRORS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "SEF_FOLDER" => "/",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "COMPONENT_TEMPLATE" => "feedback_url_form"
            ),
            false,
            array(
                "ACTIVE_COMPONENT" => "Y"
            )
        );?>
    </div>
</div>