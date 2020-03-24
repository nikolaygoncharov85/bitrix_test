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
    <?if($arResult["PROPERTIES"]["COUNTRY"]["VALUE"]!=''){?>
        <div class="row-1 row-inner white-bg mb-col-dist">
            <div class="col without-padding">
                <div class="main-img-block">
                    <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
                    <div class="excursion-order" style="margin-right: 5%;">
                        <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" style="float: right;clear: both;" data-name="<?=$arResult["NAME"]?>">запрос</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="text text-block-padding">
                    <p>
                        <?=$arResult['PREVIEW_TEXT']?>
                    </p>
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

    <? if (!empty($arResult['PROPERTIES']['hotel']['LIST'])) { ?>
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <h2 class="mt-col-dist">Отели поблизости</h2>
            <div class="row-1 row-3-sm">
                <? foreach($arResult['PROPERTIES']['hotel']['LIST'] as $arHotel) { ?>
                <div class="col">
                    <div class="special-item-inner">
                        <img src="<?=$arHotel['PICTURE']?>" alt="">
                        <p class="hotel-name">
                            <?=$arHotel['NAME']?>
                            <?=$arHotel['STAR_TYPE']?>
                            <?=$arHotel['STAR']?>
                            <span class="icon icon-star"></span>
                        </p>
                        <div class="hotel-description">
                            <?=$arHotel['LIST']?>
                        </div>
                        <a href="<?=$arHotel['BOOKING']?>" class="btn btn-red btn-100">забронировать</a>
                        <a class="absolute-link" href="#"></a>
                    </div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
    <? } ?>
</div>
<div class="popup-bg popup-order">
    <div class="container">
        <div class="popup">
            <div class="popup-close"></div>
            <?
            $R = $_SERVER['REQUEST_URI'];
            $APPLICATION->IncludeComponent(
                "bitrix:form.result.new",
                "request_price_tickets",
                array(
                    "WEB_FORM_ID" => "16",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "Y",
                    "SEF_MODE" => "Y",
                    "SEF_FOLDER" => "/",
                    "CACHE_TYPE" => "N",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "",
                    "EDIT_URL" => "",
                    "SUCCESS_URL" => 'http://www.tailortour.ru'.$R,
                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => "",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_SHADOW" => "Y",
                    "AJAX_OPTION_JUMP" => "Y",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "Y",
                    "TITLE" => "Запрос авиа билета",
                    "COMPONENT_TEMPLATE" => "request_price_tickets",
                    "VARIABLE_ALIASES" => array(
                        "WEB_FORM_ID" => "WEB_FORM_ID",
                        "RESULT_ID" => "RESULT_ID",
                    )
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
            $('#request_type input').val('Запрос авиа билета');
            var url = "http://www.tailortour.ru" + "<?=$APPLICATION->GetCurPage()?>";
            $('#page_url input').val(url);
            //$('#request_title_name').html(name);
            //$('#mailto-order').attr('href', 'mailto:fit@inflottravel.com?subject=' + name);
        });
    });
</script>