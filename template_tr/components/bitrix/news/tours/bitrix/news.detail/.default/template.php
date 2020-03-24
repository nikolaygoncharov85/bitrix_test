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
<?/*$this->SetViewTarget("excursion-order");*/?><!--
<div class="excursion-order">
    <?/*if($arResult['PROPERTIES']['PRICE']['VALUE']!=' '||$arResult['PROPERTIES']['PRICE']['VALUE']!=''){}else{*/?>
        от <?/*=$arResult['PROPERTIES']['PRICE']['VALUE']*/?>
    <?/*}*/?>
    <?/* if (strlen($arResult['PROPERTIES']['booking']['VALUE']) > 0) { */?>
        <?/*
            if ($_SESSION['typeOfUser'] == 'b2b') {
                $link = $arResult['PROPERTIES']['booking']['VALUE'];
            } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                $re = '/\/[a-zA-Z]\w+\//';
                $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['booking']['VALUE']);
                $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
            }
        */?>
        <a href="<?/*=($link)? $link : 'javascript:void(0)';*/?>" class="btn-link-order btn btn-red" data-id="<?/*=$arResult['ID']*/?>">заказать</a>
        <div class="find_tour_b find_tour_b_btn find_tour_b_btn-excursion" id="find_tour_b_excursion-<?/*=$arResult['ID']*/?>">
            <div class="find_tour_title">
                Кто я?
            </div>
            <div class="find_tour_list">
                <?/*
                $re = '/\/[a-zA-Z]\w+\//';
                $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['booking']['VALUE']);
                */?>
                <div class="find_tour_item">
                    <span class="typeOfUser" style="display:none;" data-value="b2c"></span>
                    <a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx<?/*=$privateLink*/?>">Я частное лицо</a>
                </div>
                <div class="find_tour_item">
                    <span class="typeOfUser" style="display:none;" data-value="b2b"></span>
                    <a href="<?/*=$arResult['PROPERTIES']['booking']['VALUE']*/?>">Я агент</a>
                </div>

            </div>
        </div>
    <?/*}else{*/?>
        <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?/*=$arResult['NAME']*/?>">заказать</a>
    <?/*}*/?>
</div>
--><?/*$this->EndViewTarget();*/?>
<div class="page-content">
    <div class="row-1 row-inner white-bg mb-col-dist">
        <?if($arResult['PROPERTIES']["gallery_show"]["VALUE"]!="Y"){?>
            <div class="col without-padding">
                <div class="main-img-block">
                    <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
                </div>
            </div>
        <?}else{?>
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
        <?}?>
        <div class="col">
            <div class="excursion-item-title">
                <span style="font-size: 18px;">
                    <div class="tours-list-item-title">
                        <span class="name"><?=$arResult['NAME']?></span>
                            <div class="excursion-order">
                                <?if($arResult['PROPERTIES']['PRICE']['VALUE']!=' '||$arResult['PROPERTIES']['PRICE']['VALUE']!=''){}else{?>
                                    от <?=$arResult['PROPERTIES']['PRICE']['VALUE']?>
                                <?}?>
                                <? if (strlen($arResult['PROPERTIES']['booking']['VALUE']) > 0) { ?>
                                    <?
                                    if ($_SESSION['typeOfUser'] == 'b2b') {
                                        $link = $arResult['PROPERTIES']['booking']['VALUE'];
                                    } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                                        $re = '/\/[a-zA-Z]\w+\//';
                                        $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['booking']['VALUE']);
                                        $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
                                    }
                                    ?>
                                    <a href="<?=($link)? $link : 'javascript:void(0)';?>" class="btn-link-order btn btn-red" data-id="<?=$arResult['ID']?>">заказать</a>
                                    <div class="find_tour_b find_tour_b_btn find_tour_b_btn-excursion" id="find_tour_b_excursion-<?=$arResult['ID']?>">
                                        <div class="find_tour_title">
                                            Кто я?
                                        </div>
                                        <div class="find_tour_list">
                                            <?
                                            $re = '/\/[a-zA-Z]\w+\//';
                                            $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['booking']['VALUE']);
                                            ?>
                                            <div class="find_tour_item">
                                                <span class="typeOfUser" style="display:none;" data-value="b2c"></span>
                                                <a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx<?=$privateLink?>">Я частное лицо</a>
                                            </div>
                                            <div class="find_tour_item">
                                                <span class="typeOfUser" style="display:none;" data-value="b2b"></span>
                                                <a href="<?=$arResult['PROPERTIES']['booking']['VALUE']?>">Я агент</a>
                                            </div>

                                        </div>
                                    </div>
                                <?}else{?>
                                    <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?=$arResult['NAME']?>">заказать</a>
                                <?}?>
                            </div>
                    </div>
                    <?/* if ($arResult['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']) { */?><!--
                        <div class="tours-list-item-hotel"><?/*=$arResult['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']*/?></div>
                    <?/* } */?>
                    <?/* if ($arResult['DISPLAY_PROPERTIES']['CITY']['DISPLAY_VALUE']) { */?>
                        <div class="tours-list-item-hotel"><?/*=$arResult['DISPLAY_PROPERTIES']['CITY']['DISPLAY_VALUE']*/?></div>
                    --><?/* } */?>
                </span>
            </div>
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
        <?/*if($arResult[SECTION][ARCHIVE] == "Y"){*/?><!--
            <div style="text-align: center;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="/toursarchive/" style="color: red;text-decoration:underline;font-size: 16px;">Архив туров</a>
            </div>
        --><?/*}*/?>
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

    <!--div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <div class="text text-block-padding">
                <h2>Варианты размещения</h2>
                <table class="table-hotel">
                    <thead>
                    <tr>
                        <td></td>
                        <td>Отель</td>
                        <td>Прериод</td>
                        <td>Ночей</td>
                        <td>Питание</td>
                        <td>Проживание</td>
                        <td>Стоимость</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="radio" id="h1" name="h">
                            <label for="h1"></label>
                        </td>
                        <td>
                            Hotel Belmond Monasterio 5*
                        </td>
                        <td>
                            26.03.2016/
                            30.03.2016
                        </td>
                        <td>
                            4 ночи
                        </td>
                        <td>
                            BB
                        </td>
                        <td>
                            2AD
                        </td>
                        <td>
                            <p class="font-price">1 420$</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="h2"  name="h">
                            <label for="h2"></label>
                        </td>
                        <td>
                            Hotel Belmond Monasterio 5*
                        </td>
                        <td>
                            26.03.2016/
                            30.03.2016
                        </td>
                        <td>
                            4 ночи
                        </td>
                        <td>
                            BB
                        </td>
                        <td>
                            2AD
                        </td>
                        <td>
                            <p class="font-price">1 420$</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" id="h3"  name="h">
                            <label for="h3"></label>
                        </td>
                        <td>
                            Hotel Belmond Monasterio 5*
                        </td>
                        <td>
                            26.03.2016/
                            30.03.2016
                        </td>
                        <td>
                            4 ночи
                        </td>
                        <td>
                            BB
                        </td>
                        <td>
                            2AD
                        </td>
                        <td>
                            <p class="font-price">1 420$</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p class="right-text red-text">* Стоимость тура, включая дополнительные услуги, на 1 человека</p>
                <div class="info-block">
                    <span class="icon icon-info"></span>
                    Пожалуйста, выберите один из предложенных вариантов тура в таблице выше
                </div>
            </div>
        </div>
    </div-->

    <!--div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <div class="text-block-padding">
                <div class="excursion-order">
                    <a href="#" class="btn btn-red">забронировать</a>
                </div>
                <h2>
                    Размещение в отеле
                    Belmond miraflores park 5*
                </h2>
                <div class="row-1 row-3-sm">
                    <div class="col">
                        <a href="/img/content/tour-one/h1.jpg" class="fancybox" rel="gallery2">
                            <img src="/img/content/tour-one/h1.jpg" alt=""/>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/img/content/tour-one/h2.jpg" class="fancybox" rel="gallery2">
                            <img src="/img/content/tour-one/h2.jpg" alt=""/>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/img/content/tour-one/h3.jpg" class="fancybox" rel="gallery2">
                            <img src="/img/content/tour-one/h3.jpg" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div-->



    <? if (/*count($arResult['PROPERTIES']['INCLUDE_SERVICE']['DATA'])*/$fish > 0) { ?>
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <div class="text-block-padding">
                <h2>
                    В стоимость тура включены
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
            $('#request_type input').val('Тур');
            var url = "http://www.tailortour.ru" + "<?=$APPLICATION->GetCurPage()?>";
            $('#page_url input').val(url);
            //$('#request_title_name').html(name);
            //$('#mailto-order').attr('href', 'mailto:fit@inflottravel.com?subject=' + name);
        });
    });
</script>
