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
                    <div class="gallery-thumbs-prev"></div>
                    <div class="gallery-thumbs-next"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-1 row-inner white-bg inner-page-text">
        <div class="col">
            <div class="excursion-item-title">
                <div class="excursion-order">
                    <?if (strlen($arResult['PROPERTIES']['booking']['VALUE']) > 0){?>
                        <?
                            if ($_SESSION['typeOfUser'] == 'b2b') {
                                $link = $arResult['PROPERTIES']['booking']['VALUE'];
                            } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                                $re = '/\/[a-zA-Z]\w+\//';
                                $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['booking']['VALUE']);
                                $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
                            }
                        ?>
                        <a href="<?=($link)? $link : 'javascript:void(0)';?>" class="btn-link-order btn btn-red" data-id="<?=$arResult['ID']?>">Забронировать</a>
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
                        <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?=$arResult['NAME']?>" style="">заказать</a>
                    <?}?>
                </div>
                <h2>
                    <?=$arResult['NAME']?>
                    <? if (!empty($arResult['PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE']) && !empty($arResult['PROPERTIES']['STAR_CATEGORY']['VALUE'])) { ?>
                        <?=implode('', $arResult['PROPERTIES']['STAR_CATEGORY']['VALUE'])?><span class="icon icon-star"></span>
                    <? } elseif(empty($arResult['PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE']) && !empty($arResult['PROPERTIES']['STAR_CATEGORY']['VALUE'])) { ?>
                        <?=implode(',', $arResult['PROPERTIES']['STAR_CATEGORY']['VALUE'])?>*
                    <? } ?>
                </h2>
                <p class="hotel-item-position">
                    <?=$arResult['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']?>
                    <? if (strlen($arResult['DISPLAY_PROPERTIES']['CITY']['DISPLAY_VALUE']) > 0) { ?>
                    / <?=$arResult['DISPLAY_PROPERTIES']['CITY']['DISPLAY_VALUE']?>
                    <? } ?>
                </p>
            </div>
            <div class="text">
                <p>
                <?=$arResult['DETAIL_TEXT']?>
                </p>
            </div>
        </div>
        <?
        $master_coutry = $arResult['PROPERTIES']['master_country']['VALUE'];
        $master_city = $arResult['PROPERTIES']['master_city']['VALUE'];
        $master_hotel = $arResult['PROPERTIES']['master_hotel']['VALUE'];
        ?>
        <?if($master_coutry>0||$master_city>0||$master_hotel>0){?>
            <div class="booking_block_basket">
                <!--<link href="http://online.sardinia3d.ru:8084/Content/bootstrap/bootstrap.min.css" rel="stylesheet"/>-->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                <link href="http://online.sardinia3d.ru:8084/Content/css/select2.css" rel="stylesheet"/>
                <link href="http://online.sardinia3d.ru:8084/Content/select2-bootstrap.css" rel="stylesheet"/>
                <link href="http://online.sardinia3d.ru:8084/Content/bootstrap-datepicker3.min.css" rel="stylesheet"/>
                <script src="http://online.sardinia3d.ru:8084/Scripts/bootstrap.min.js"></script>
                <script src="http://online.sardinia3d.ru:8084/Scripts/select2.min.js"></script>
                <script src="http://online.sardinia3d.ru:8084/Scripts/bootstrap-datepicker.min.js"></script>
                <script src="http://online.sardinia3d.ru:8084/Scripts/locales/bootstrap-datepicker.ru.min.js"></script>
                <!--<link href="http://online.sardinia3d.ru:8084/css/st.css" rel="stylesheet"/>-->
                <div style="background:#FFF; margin-bottom:0.5em; padding:1em;">
                    <div class="row inputs">
                        <div class="form-inline col-md-12">
                            <div id="prg2">Загружается...</div>
                            <div class="form-group col-md-2">
                                <div class="div_label">Вылет из:</div>
                                <div template-search-from-y class="input_select"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="div_label">Дата поездки с:</div>
                                <div template-dtFrom-y class="input_select"></div>
                                <div class="div_label">до:</div>
                                <div template-dtTo-y class="input_select"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="div_label">Ночей с:</div>
                                <div template-nightsFrom-y class="input_select"></div>
                                <div class="div_label">до:</div>
                                <div template-nightsTo-y class="input_select"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-group col-md-1">
                                <div class="div_label">Взрослых:</div>
                                <div template-adults-y class="input_select"></div>
                                <div class="div_label">Детей:</div>
                                <div template-childs-y class="input_select"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-group col-md-1">
                                <div class="div_label"> </div>
                                <div template-search-btn-y class="input_select"></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="http://online.sardinia3d.ru:8084/scripts/templatedsearchmodule?name=y&progress=prg2&from=0<?if($master_coutry>0){?>&country=<?=$master_coutry?><?}?><?if($master_city>0){?>&city=<?=$master_city?><?}?><?if($master_hotel>0){?>&hotel=<?=$master_hotel?><?}?>" type="text/javascript"></script>
            </div>
        <?}?>
    </div>
    <div class="row-1 row-inner white-bg">
        <ul class="hotel-tabs tabs">
            <li class="tabs-item active">
                <span class="icon icon-tab-about"></span>
                <span class="tab-name">Описание</span>
            </li>
            <li class="tabs-item">
                <span class="icon icon-tab-room"></span>
                <span class="tab-name">Номера</span>
            </li>
            <li class="tabs-item">
                <span class="icon icon-tab-spec"></span>
                <span class="tab-name">Спецпредложения</span>
            </li>
            <?if($arResult["PROPERTIES"]["termo_programm"]["~VALUE"]["TEXT"]){?>
                <li class="tabs-item">
                    <span class="tab-name">
                        Термальные программы
                    </span>
                </li>
            <?}?>
        </ul>
        <ul class="hotel-tab-content tabs-content">
            <li class="tabs-content-item active">
                <div class="col">
                    <? if (count($arResult['PROPERTIES']["descr"]["VALUE"]) > 0) { ?>
                    <ul class="advantages">
                        <? foreach($arResult['PROPERTIES']["descr"]["VALUE"] as $value) { ?>
                        <li><?=$value?></li>
                        <? } ?>
                    </ul>
                    <? } ?>
                    <div class="text">
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['service_in_hotel']['DISPLAY_VALUE']) > 0) {?>
                        <div class="hidden_block 1">
                            <div class="hidden_block_title">
                                услуги в отеле <span class="icon hidden-block-arrow"></span>
                            </div>
                            <div class="hidden_block_content">
                                <?=$arResult['DISPLAY_PROPERTIES']['service_in_hotel']['DISPLAY_VALUE']?>
                            </div>
                        </div>
                        <? } ?>
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['hotel_restorans']['DISPLAY_VALUE']) > 0) {?>
                            <div class="hidden_block 2">
                                <div class="hidden_block_title">
                                    рестораны <span class="icon hidden-block-arrow"></span>
                                </div>
                                <div class="hidden_block_content">
                                    <?=$arResult['DISPLAY_PROPERTIES']['hotel_restorans']['DISPLAY_VALUE']?>
                                </div>
                            </div>
                        <? } ?>
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['for_kids']['DISPLAY_VALUE']) > 0) {?>
                        <div class="hidden_block 3">
                            <div class="hidden_block_title">
                                Для детей <span class="icon hidden-block-arrow"></span>
                            </div>
                            <div class="hidden_block_content">
                                <ul>
                                    <?=$arResult['DISPLAY_PROPERTIES']['for_kids']['DISPLAY_VALUE']?>
                                </ul>
                            </div>
                        </div>
                        <? } ?>
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['spa_wellness']['DISPLAY_VALUE']) > 0) {?>
                        <div class="hidden_block 4">
                            <div class="hidden_block_title">
                                Spa & wellness <span class="icon hidden-block-arrow"></span>
                            </div>
                            <div class="hidden_block_content">
                                <?=$arResult['DISPLAY_PROPERTIES']['spa_wellness']['DISPLAY_VALUE']?>
                            </div>
                        </div>
                        <? } ?>
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['hotel_sport']['DISPLAY_VALUE']) > 0) {?>
                        <div class="hidden_block 5">
                            <div class="hidden_block_title">
                                спорт <span class="icon hidden-block-arrow"></span>
                            </div>
                            <div class="hidden_block_content">
                                <?=$arResult['DISPLAY_PROPERTIES']['hotel_sport']['DISPLAY_VALUE']?>
                            </div>
                        </div>
                        <? } ?>
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['hotel_info']['DISPLAY_VALUE']) > 0) {?>
                        <div class="hidden_block 6">
                            <div class="hidden_block_title">
                                дополнительная информация <span class="icon hidden-block-arrow"></span>
                            </div>
                            <div class="hidden_block_content">
                                <?=$arResult['DISPLAY_PROPERTIES']['hotel_info']['DISPLAY_VALUE']?>
                            </div>
                        </div>
                        <? } ?>
                        <h3>Расположение </h3>
                        <p><?=$arResult['DISPLAY_PROPERTIES']['geo_descr']['DISPLAY_VALUE']?></p>
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['ADDRESS']['DISPLAY_VALUE']) > 0) {?>
                            <h3>Адрес</h3>
                            <p><?=$arResult['DISPLAY_PROPERTIES']['ADDRESS']['DISPLAY_VALUE']?></p>
                        <? } ?>
                        <? if (strlen($arResult['DISPLAY_PROPERTIES']['PHONE_1']['DISPLAY_VALUE']) > 0 || strlen($arResult['DISPLAY_PROPERTIES']['PHONE_2']['DISPLAY_VALUE']) > 0) {?>
                            <h3>Телефон</h3>
                            <p><?=$arResult['DISPLAY_PROPERTIES']['PHONE_1']['DISPLAY_VALUE']?></p>
                            <p><?=$arResult['DISPLAY_PROPERTIES']['PHONE_2']['DISPLAY_VALUE']?></p>
                        <? } ?>
                        <div class="hotel-map">
                            <?//=$arResult['DISPLAY_PROPERTIES']['geo']['DISPLAY_VALUE']?>
                            <?
                            $arGeo = explode(',', $arResult["DISPLAY_PROPERTIES"]["geo"]["VALUE"]);
                            $MAP_DATA = array(
                                'google_lat' => (double)$arGeo[0],
                                'google_lon' => (double)$arGeo[1],
                                'PLACEMARKS' => array(
                                    array(
                                        'TEXT' => '<div>' . $arResult['NAME'] . '</div><img src="' . $arResult['PREVIEW_PICTURE']['IMG'] . '" class="map_preview"><div>' . $arResult['PROPERTY_COUNTRY'] . "/" . $arResult['PROPERTY_CITY'] . '</div>',
                                        'LON' => (double)$arGeo[1],
                                        'LAT' => (double)$arGeo[0]
                                    )
                                )
                            );
                            ?>

                            <?$APPLICATION->IncludeComponent(
                                "bitrix:map.google.view",
                                "local",
                                array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "CONTROLS" => array(
                                        0 => "SMALL_ZOOM_CONTROL",
                                        1 => "SCALELINE",
                                    ),
                                    "INIT_MAP_TYPE" => "ROADMAP",
                                    "MAP_DATA" => serialize($MAP_DATA),
                                    "MAP_HEIGHT" => "500",
                                    "MAP_ID" => "travel",
                                    "MAP_WIDTH" => "70%",
                                    "OPTIONS" => array(
                                        0 => "ENABLE_DRAGGING",
                                        1 => "ENABLE_KEYBOARD",
                                    ),
                                ),
                                false
                            );?>
                        </div>

                    </div>
                </div>
            </li>
            <li class="tabs-content-item">
                <div class="col">
                    <div class="text">
                        <?=$arResult['DISPLAY_PROPERTIES']['hotel_apartment']['DISPLAY_VALUE']?>
                    </div>
                </div>
            </li>
            <li class="tabs-content-item">
                <div class="col">
                    <div class="row-1 row-3-sm">
                        <?if($arResult["PROPERTIES"]["hotel_actions"]["~VALUE"]["TEXT"]){?>
                            <div class="text" style="font-size: 14px;padding: 10px 20px;"><?=$arResult["PROPERTIES"]["hotel_actions"]["~VALUE"]["TEXT"]?></div>
                        <?}else{?>
                            <? foreach($arResult['PROPERTIES']['HOTEL_OFFERS'] as $arOffers) { ?>
                                <div class="col offers-col">
                                    <img src="<?=$arOffers['SRC']?>" alt="">
                                    <p class="offers-block-title">
                                        <?=$arOffers['NAME']?>
                                    </p>
                                    <p class="offers-block-des">
                                        <?=$arOffers['TEXT']?>
                                    </p>
                                    <p>
                                        <a href="<?=$arOffers['DETAIL_PAGE_URL']?>">Подробнее</a>
                                    </p>
                                </div>
                            <? } ?>
                        <?}?>
                    </div>
                </div>
            </li>
            <?if($arResult["PROPERTIES"]["termo_programm"]["~VALUE"]["TEXT"]){?>
                <li class="tabs-content-item">
                    <div class="col">
                        <div class="row-1 row-3-sm">
                            <div class="text" style="font-size: 14px;padding: 10px 20px;">
                                <?=$arResult["PROPERTIES"]["termo_programm"]["~VALUE"]["TEXT"]?>
                            </div>
                        </div>
                    </div>
                </li>
            <?}?>
        </ul>
    </div>
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
                "TITLE" => "Данный отель рассчитывается по запросу"
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
            $('#request_type input').val('Отель');
            var url = "http://www.tailortour.ru" + "<?=$APPLICATION->GetCurPage()?>";
            $('#page_url input').val(url);
        });
    });
</script>