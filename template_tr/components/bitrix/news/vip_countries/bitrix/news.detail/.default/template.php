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
    <? if (strlen($arItem['PROPERTIES']['PRICE']['VALUE']) > 0) { ?>
        от <?=$arItem['PROPERTIES']['PRICE']['VALUE']?>
    <? } ?>

    <? if (strlen($arItem['PROPERTIES']['booking']['VALUE']) > 0) { ?>
        <a href="<?=$arItem['PROPERTIES']['booking']['VALUE']?>" class="btn btn-red">заказать</a>
    <? } else { ?>
        <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?=$arItem['NAME']?>">заказать</a>
    <? } ?>
</div>
<?$this->EndViewTarget();?>
<div class="page-content">

    <div class="row-1 row-inner white-bg mb-col-dist">

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

        <div class="col">
            <div class="text text-block-padding">
                <? if (!empty($arResult['PROPERTIES']['ROUTE']['VALUE'])) { ?>
                <p><?=$arResult['PROPERTIES']['ROUTE']['VALUE']?></p>
                <? } ?>

                <? if (!empty($arResult['PROPERTIES']['DURATION']['VALUE'])) { ?>
                <p><?=$arResult['PROPERTIES']['DURATION']['VALUE']?></p>
                <? } ?>

                <? if (!empty($arResult['PROPERTIES']['SDATE']['VALUE'])) { ?>
                <p>
                    <b>Даты заездов:</b> <?=implode('/', $arResult['PROPERTIES']['SDATE']['VALUE'])?>
                </p>
                <? } ?>

                <? if (!empty($arResult['PROPERTIES']['CHECK_PERIOD_START']['VALUE']) && !empty($arResult['PROPERTIES']['CHECK_PERIOD_END']['VALUE'])) { ?>
                <p>
                    <b>Период заезда:</b>



                    <? foreach ($arResult['PROPERTIES']['CHECK_PERIOD_START']['VALUE'] as $key => $CHECK_PERIOD_START) { ?>
                        <div>с <?=date("d.m.Y", strtotime($CHECK_PERIOD_START))?>
                        по <?=date('d.m.Y', strtotime($arResult['PROPERTIES']['CHECK_PERIOD_END']['VALUE'][$key]))?></div>
                    <? } ?>

                    <?=implode('/', $arResult['PROPERTIES']['SDATE']['VALUE'])?>
                </p>
                <? } ?>

                <hr>
                <? if (!empty($arResult['PROPERTIES']['TOUR_TYPE']['VALUE'])) { ?>
                <ul class="advantages">
                    <?= "<li>".implode('</li><li>', $arResult['PROPERTIES']['TOUR_TYPE']['VALUE'])."</li>";?>
                </ul>
                <? } ?>

                <? if (!empty($arResult['PROPERTIES']['MAX_COLS']['VALUE'])) { ?>
                    <p><b>Максимальное количество участников:</b> <?=$arResult['PROPERTIES']['MAX_COLS']['VALUE']?></p>
                    <br>
                <? } ?>

                <? if (!empty($arResult['PROPERTIES']['LEVEL']['VALUE'])) { ?>
                    <p><b>Уровень физической сложности:</b> <?=$arResult['PROPERTIES']['LEVEL']['VALUE']?></p><br>
                <? } ?>

                <?=$arResult['DETAIL_TEXT']?>
            </div>
        </div>
    </div>



    <? if (!empty($arResult['PROPERTIES']['EVENTS']['VALUE']) > 0 && is_array($arResult['PROPERTIES']['EVENTS']['VALUE'])) { ?>

    <h3>Программа мероприятий</h3>

    <div class="row-1 row-inner white-bg mb-col-dist">
        <ul class="hotel-tabs tour-tabs tabs">
            <? foreach($arResult['PROPERTIES']['EVENTS']['VALUE'] as $key => $arEvent) { ?>
            <li class="tabs-item<?if($key==0){?> active<?}?>">
                <span class="tab-name"><?=++$key?>-й день</span>
            </li>
            <? } ?>
        </ul>
        <ul class="hotel-tab-content tabs-content">
            <? foreach($arResult['PROPERTIES']['EVENTS']['VALUE'] as $key => $arEvent) { ?>
            <li class="tabs-content-item<?if($key==0){?> active<?}?>">
                <div class="col">
                    <div class="text-block-padding">
                        <?=$arEvent['TEXT']?>
                    </div>
                </div>
            </li>
            <? } ?>
        </ul>
    </div>
    <? } ?>

    <? if (count($arResult['PROPERTIES']['INCLUDE_SERVICE']['DATA']) > 0) { ?>
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <div class="text-block-padding">
                <h2>
                    В стоимость услуги включены
                </h2>
                <div class="row-1 row-3-sm">
                    <? foreach($arResult['PROPERTIES']['INCLUDE_SERVICE']['DATA'] as $arService) { ?>
                    <div class="col mb-col-dist">
                        <a href="#">
                            <img src="<?=$arService['PICTURE']?>" alt=""/>
                        </a>
                        <p class="small-block-title">
                            <?=$arService['NAME']?>
                        </p>
                        <p>
                            <?=$arService['DESCRIPTION']?>
                        </p>
                    </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <? } ?>
</div>
<div class="popup-bg popup-order">
    <div class="container">
        <div class="popup">
            <div class="popup-close"></div>
            <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "request_price_vip", array(
                "WEB_FORM_ID" => 10,
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "USE_EXTENDED_ERRORS" => "Y",
                "SEF_MODE" => "N",
                "SEF_FOLDER" => "/",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "3600",
                "LIST_URL" => "",
                "EDIT_URL" => "",
                "SUCCESS_URL" => "",
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
                "TITLE" => "Данная услуга рассчитывается по запросу"
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
