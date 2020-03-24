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
<?$this->SetViewTarget("excursion-order");?>
<div class="excursion-order">
    <? if (strlen($arResult['PROPERTIES']['PRICE']['VALUE']) > 0) { ?>
        от <?=$arResult['PROPERTIES']['PRICE']['VALUE']?>
    <? } ?>
    <? if (strlen($arResult['PROPERTIES']['booking']['VALUE']) > 0) { ?>
        <a href="<?=$arResult['PROPERTIES']['booking']['VALUE']?>" class="btn btn-red">заказать</a>
    <? } else { ?>
        <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?=$arResult['NAME']?>">заказать</a>
    <? } ?>
</div>
<?$this->EndViewTarget();?>
<div class="page-content">
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col without-padding">
            <div class="main-img-block">
                <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
            </div>
        </div>
        <!--<div class="col">
            <div class="text text-block-padding">
                <p>
                    <?/*=$arResult['PREVIEW_TEXT']*/?>
                </p>
            </div>
        </div>-->
    </div>
    <? if (strlen($arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE']['SRC']) > 0) { ?>
        <div class="row-1 row-inner white-bg inner-page-text">
            <div class="col">
                <a href="<?=$arResult['DISPLAY_PROPERTIES']['FILE']['FILE_VALUE']['SRC']?>" target="_blank">Посмотреть расписание экскурсий</a>
            </div>
        </div>
    <? } ?>
    <? if (!empty($arResult['DETAIL_TEXT'])) { ?>
    <div class="row-1 row-inner white-bg inner-page-text">
        <div class="col">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    </div>
    <? } ?>
    <? if (!empty($arResult['PROPERTIES']['PHOTO']['VALUE']) > 0) { ?>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row-1 row-inner white-bg mb-col-dist">
            <div class="col without-padding">
                <div class="main-img-block main-img-block-thumbs">
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <? foreach($arResult['PROPERTIES']['PHOTO']['VALUE'] as $arPhoto) { ?>
                                <div class="swiper-slide">
                                    <img src="<?=$arPhoto['small']?>" alt="">
                                </div>
                            <? } ?>
                        </div>
                    </div>
                    <div class="gallery-thumbs-prev"></div>
                    <div class="gallery-thumbs-next"></div>
                </div>
            </div>
        </div>
    <? } ?>
    <div class="row-1 row-inner white-bg mb-col-dist feedback_url_form">
        <div class="col">
            <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "feedback_url_form", array(
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
        });
    });
</script>