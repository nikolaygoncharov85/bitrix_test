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
    .excursion-list li,
    .excursion-list li + li {
        margin-bottom: 0 !important;
        border-bottom: 1px solid #e0e0e0;
    }
    ul.excursion-list {
        background: #ffffff;
        padding: 0 30px;
    }
    .pagination.white-bg {
        padding: 30px 0 !important;
    }
</style>
    <ul class="excursion-list">
        <?foreach($arResult["ITEMS"] as $arItem) { ?>
        <li class="excursion-item">
            <div class="excursion-item-title">
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
                <h2>
                    <div class="tours-list-item-title">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                    </div>
                    <? if ($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE']) { ?>
                    <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['HOTEL']['DISPLAY_VALUE'])?></div>
                    <? } ?>

                    <? if ($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']) { ?>
                    <div class="tours-list-item-hotel"><?=strip_tags($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE'])?></div>
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
