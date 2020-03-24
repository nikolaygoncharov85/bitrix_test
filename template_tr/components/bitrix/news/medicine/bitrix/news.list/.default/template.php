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
<style type="text/css">
    .excursion-list li {
        margin-bottom: 30px;
    }
</style>
<div class="page-content">
    <?if($_REQUEST["arrFilter_pf"]["COUNTRY"]=='109'){?>
        <div class="row-1 row-inner white-bg">
            <div class="col">
                <div class="tabs tabs-county tabs-tour">
                    <ul class="tabs-list">
                        <li class="tabs-county-item<? if (empty($_REQUEST['TYPE_SEA']) && empty($_REQUEST['TYPE_ISRAEL']) && empty($_REQUEST['TYPE_RESORTS'])) { ?> active<? } ?>">
                            <a href="<?=$APPLICATION->GetCurPageParam('', array('TYPE_SEA', 'TYPE_ISRAEL', 'TYPE_RESORTS'))?>">Все</a>
                        </li>
                        <li class="tabs-county-item<? if ($_REQUEST['TYPE_SEA'] > 0) { ?> active<? } ?>">
                            <a href="<?=$APPLICATION->GetCurPageParam('TYPE_SEA=172', array('TYPE_SEA', 'TYPE_ISRAEL', 'TYPE_RESORTS'))?>">Лечение на Мертвом море</a>
                        </li>
                        <li class="tabs-county-item<? if ($_REQUEST['TYPE_ISRAEL'] > 0) { ?> active<? } ?>">
                            <a href="<?=$APPLICATION->GetCurPageParam('TYPE_ISRAEL=173', array('TYPE_SEA', 'TYPE_ISRAEL', 'TYPE_RESORTS'))?>">Лечение в клиниках Израиля</a>
                        </li>
                        <li class="tabs-county-item<? if ($_REQUEST['TYPE_RESORTS'] > 0) { ?> active<? } ?>">
                            <a href="<?=$APPLICATION->GetCurPageParam('TYPE_RESORTS=174', array('TYPE_SEA', 'TYPE_ISRAEL', 'TYPE_RESORTS'))?>">Лечение на курортах</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?}?>
    <?if(!$arResult["ITEMS"][0]){?>
        <span class="no_result">По заданным данным результатов не найдено!</span>
    <?}else{?>
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
    <?}?>
</div>
<div class="popup-bg popup-order">
    <div class="container">
        <div class="popup">
            <div class="popup-close"></div>
            <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "request_price_medicine", array(
                    "WEB_FORM_ID" => 20,
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
                    "TITLE" => "Данная услуга рассчитывается по запросу"
                ),
                false
            ); ?>
        </div>
    </div>
    <pre>
        <?
        var_dump($_REQUEST);
        ?>
    </pre>
</div>
<script>
    $(document).ready(function() {
        $('.excursion-order .popup-order').click(function(){
            var name = $(this).attr('data-name');
            $('#title input').val(name);
            $('#request_type input').val('Медицина');
            <?$page = $APPLICATION->GetCurPageParam("arrFilter_pf","COUNTRY", "RESORT", "CITY", "set_filter"); ?>
            var url = "http://www.tailortour.ru" + "<?=$page?>";
            $('#page_url input').val(url);
        });
    });
</script>