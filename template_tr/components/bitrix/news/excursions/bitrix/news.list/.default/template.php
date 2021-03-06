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
<div class="page-content">

    <div class="row-1 row-inner white-bg">
        <div class="col">
            <div class="tabs tabs-county tabs-tour">
                <ul class="tabs-list">

                    <li class="tabs-county-item<? if (empty($_REQUEST['TYPE_GROUP']) && empty($_REQUEST['TYPE_INDIVIDUAL'])) { ?> active<? } ?>">
                        <a href="<?=$APPLICATION->GetCurPageParam('', array('TYPE_GROUP', 'TYPE_INDIVIDUAL'))?>">Все</a>
                    </li>

                    <li class="tabs-county-item<? if ($_REQUEST['TYPE_GROUP'] > 0) { ?> active<? } ?>">
                        <a href="<?=$APPLICATION->GetCurPageParam('TYPE_GROUP=168', array('TYPE_GROUP', 'TYPE_INDIVIDUAL'))?>">Групповые экскурсии</a>
                    </li>


                    <li class="tabs-county-item<? if ($_REQUEST['TYPE_INDIVIDUAL'] > 0) { ?> active<? } ?>">
                        <a href="<?=$APPLICATION->GetCurPageParam('TYPE_INDIVIDUAL=169', array('TYPE_GROUP', 'TYPE_INDIVIDUAL'))?>">Индивидуальные экскурсии</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <ul class="excursion-list">
        <?foreach($arResult["ITEMS"] as $arItem) { ?>
        <li class="excursion-item">
            <div class="excursion-item-title">

                <div class="excursion-order">

                <? if (strlen($arItem['PROPERTIES']['PRICE']['VALUE']) > 0) { ?>
                    от <?=$arItem['PROPERTIES']['PRICE']['VALUE']?>
                <? } ?>

                <? if (strlen($arItem['PROPERTIES']['booking']['VALUE']) > 0) { ?>
                    <a href="<?=$arItem['PROPERTIES']['booking']['VALUE']?>" class="btn btn-red">заказать</a>
                <? } else { ?>
                    <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?=$arItem['NAME']?>">заказать</a>
                <? } ?>

                </div>

                <h2>
                    <div class="tours-list-item-title"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
                    <? if ($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE']) { ?>
                    <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE'])?></div>
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

<div class="popup-bg popup-order">
    <div class="container">
        <div class="popup">
            <div class="popup-close"></div>
            <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "request_price", array(
                "WEB_FORM_ID" => 10,
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "USE_EXTENDED_ERRORS" => "Y",
                "SEF_MODE" => "N",
                "SEF_FOLDER" => "/",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "3600",
                "LIST_URL" => "",
                "EDIT_URL" => "",
                "SUCCESS_URL" => "http://www.tailortour.ru" . $APPLICATION->GetCurPage(),
                "CHAIN_ITEM_TEXT" => "",
                "CHAIN_ITEM_LINK" => "",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_SHADOW" => "Y",
                "AJAX_OPTION_JUMP" => "Y",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "Y",
                "VARIABLE_ALIASES" => array(
                    "WEB_FORM_ID" => "WEB_FORM_ID",
                    "RESULT_ID" => "RESULT_ID",
                ),
                "TITLE" => "Данный тур рассчитывается по запросу"
            ),
                false
            ); ?>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('.excursion-order .popup-order').click(function(){
            var name = $(this).attr('data-name');

            $('#title input').val(name);

            $('#request_type input').val('Экскурсия');

            //$('#request_title_name').html(name);

            //$('#mailto-order').attr('href', 'mailto:fit@inflottravel.com?subject=' + name);
        });
    });
</script>