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
<?$this->EndViewTarget();?>
<div class="page-content">
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col without-padding">
            <div class="main-img-block">
                <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
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
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col without-padding">
            <div class="text text-block-padding">
                <?=$arResult['DETAIL_TEXT']?>
            </div>
        </div>
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
            <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "request_price_VIP_aero", array(
                "WEB_FORM_ID" => 19,
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
</div>

<script>
    $(document).ready(function() {
        $('.excursion-order .popup-order').click(function(){
            var name = $(this).attr('data-name');
            $('#title input').val(name);
            $('#request_type input').val('VIP сервис');
            var url = "http://www.tailortour.ru" + "<?=$APPLICATION->GetCurPage()?>";
            $('#page_url input').val(url);
        });
    });
</script>
