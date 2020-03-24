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
<div class="row-1 row-inner">
    <div class="hotels-list-filter-block">
        <div class="hotels-list-filter">
            <span>Сортировать:</span>
            <a href="<?=$APPLICATION->GetCurPageParam("",array("by"))?>"<?if (empty($_REQUEST['by'])) {?> class="active"<? } ?>>По умолчанию</a>
            <a href="<?=$APPLICATION->GetCurPageParam("by=PROPERTY_STAR",array("by"))?>" <?if ($_REQUEST['by'] == 'PROPERTY_STAR') {?> class="active"<? } ?>>По звездам</a>
            <a href="<?=$APPLICATION->GetCurPageParam("by=NAME",array("by"))?>"<?if ($_REQUEST['by'] == 'NAME') {?> class="active"<? } ?>>По алфавиту</a>
            <div class="hotels-list-filter-type">
                <a href="<?=$APPLICATION->GetCurPage()?>" class="active">Списком</a>
                <a href="<?=$APPLICATION->GetCurPage()?>?view=maps">На карте</a>
            </div>
        </div>
    </div>
    <ul class="hotels-list">
        <?foreach($arResult["ITEMS"] as $arItem) { ?>
            <li class="hotel-item">
                <a class="excursion-item-a" href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?echo $arItem["NAME"]?>">
                    <div class="excursion-item-title">
                        <h2>
                            <?echo $arItem["NAME"]?>
                            <? if (!empty($arItem['DISPLAY_PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE']) && !empty($arItem['DISPLAY_PROPERTIES']['STAR_CATEGORY']['VALUE'])) { ?>
                                <?=implode('', $arItem['DISPLAY_PROPERTIES']['STAR_CATEGORY']['VALUE'])?><span class="icon icon-star"></span>
                            <? } elseif(empty($arItem['DISPLAY_PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE']) && !empty($arItem['DISPLAY_PROPERTIES']['STAR_CATEGORY']['VALUE'])) { ?>
                                <?=implode(', ', $arItem['DISPLAY_PROPERTIES']['STAR_CATEGORY']['VALUE'])?>*
                            <? } ?>
                        </h2>
                        <p class="hotel-item-position">
                            <?=strip_tags($arItem["DISPLAY_PROPERTIES"]['COUNTRY']["DISPLAY_VALUE"])?>
                            <? if (strlen(strip_tags($arItem["DISPLAY_PROPERTIES"]['CITY']["DISPLAY_VALUE"])) > 0) { ?>
                                / <?=strip_tags($arItem["DISPLAY_PROPERTIES"]['CITY']["DISPLAY_VALUE"])?>
                            <? } ?>
                        </p>
                    </div>
                    <div class="row-1 row-hotel row-inner">
                        <div class="col without-padding">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                        </div>
                        <div class="col text-col">
                            <div class="text">
                                <p>
                                    <?=$arItem['PREVIEW_TEXT']?>
                                </p>
                            </div>
                            <div class="line_gradient"></div>
                        </div>
                    </div>
                </a>
                <div class="excursion-order">
                    <? if (strlen($arItem['PROPERTIES']['PRICE']['VALUE']) > 0) { ?>
                        от <?=$arItem['PROPERTIES']['PRICE']['VALUE']?>
                    <? } ?>
                    <? if (strlen($arItem['PROPERTIES']['booking']['VALUE']) > 0) { ?>
                        <?
                        if ($_SESSION['typeOfUser'] == 'b2b') {
                            $link = $arItem['PROPERTIES']['booking']['VALUE'];
                        } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                            $re = '/\/[a-zA-Z]\w+\//';
                            $privateLink = preg_replace($re,'',$arItem['PROPERTIES']['booking']['VALUE']);
                            $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
                        }
                        ?>
                        <a href="<?=($link)? $link : 'javascript:void(0)';?>" class="btn-link-order btn btn-red" data-id="<?=$arItem['ID']?>">заказать</a>
                        <div class="find_tour_b find_tour_b_btn find_tour_b_btn-excursion" id="find_tour_b_excursion-<?=$arItem['ID']?>">
                            <div class="find_tour_title">
                                Кто я?
                            </div>
                            <div class="find_tour_list">
                                <?
                                $re = '/\/[a-zA-Z]\w+\//';
                                $privateLink = preg_replace($re,'',$arItem['PROPERTIES']['booking']['VALUE']);
                                ?>
                                <div class="find_tour_item">
                                    <span class="typeOfUser" style="display:none;" data-value="b2c"></span>
                                    <a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx<?=$privateLink?>">Я частное лицо</a>
                                </div>
                                <div class="find_tour_item">
                                    <span class="typeOfUser" style="display:none;" data-value="b2b"></span>
                                    <a href="http://www.tailortour.ru<?=$arItem['PROPERTIES']['booking']['VALUE']?>">Я агент</a>
                                </div>

                            </div>
                        </div>
                    <? } else { ?>
                        <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?=$arItem['NAME']?>">заказать</a>
                    <? } ?>
                </div>
                <div class="clearfix"></div>
            </li>
        <? } ?>
    </ul>
    <div class="hotels-list-pagination">
        <?=$arResult["NAV_STRING"]?>
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
    $(document).ready(function(){
        var Ht = 0;
        $("body").find(".hotel-item").each(function(){
            Ht = $(this).find(".without-padding").height();
           // $(this).find(".excursion-item-a .text-col").css('height', Ht);
        });
        $('.excursion-order .popup-order').click(function(){
            var name = $(this).attr('data-name');
            $('#title input').val(name);
            $('#request_type input').val('Отель');
            var url = "http://www.tailortour.ru" + "<?=$APPLICATION->GetCurPage()?>";
            $('#page_url input').val(url);
            //$('#request_title_name').html(name);
            //$('#mailto-order').attr('href', 'mailto:fit@inflottravel.com?subject=' + name);
        });
    });
</script>
