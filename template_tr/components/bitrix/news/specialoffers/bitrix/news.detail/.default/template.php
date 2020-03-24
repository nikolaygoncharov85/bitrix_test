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
    <div class="page-100 page-content" style="float: left;">
        <div class="row-1 row-inner white-bg mb-col-dist">
            <div class="col without-padding">
                <div class="main-img-block">
                    <img src="<?=$arResult['PREVIEW_PICTURE']["SRC"];?>" title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"];?>" alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"];?>"/>
                </div>
            </div>
            <div class="col">
                <div class="text text-block-padding test">
                    <?if($arResult['DETAIL_TEXT']){?>
                    <?=$arResult['DETAIL_TEXT']?>
                    <?}else{?>
                    <?=$arResult['PREVIEW_TEXT']?>
                    <?}?>
                </div>
            </div>
        </div>
        <?if($arResult["PROPERTIES"]["show_archive"]["VALUE"]!="Y"){?>
            <?if (!empty($arResult["PROPERTIES"]['action_date']["VALUE"])){?>
                <div class="row-1 row-inner white-bg mb-col-dist" style="display: block;">
                    <div class="col">
                        <div class="text-block-padding">
                            <div class="row-1 timer-row">
                                <div class="col">
                                    <p class="bog-timer-title">
                                        Успейте забронировать
                                        до завершения акции
                                    </p>
                                </div>
                                <div class="col">
                                        <div class="timer-bg">
                                            <div class="count-down-timer" data-time-end="<?=date('Y/m/d', strtotime($arResult["PROPERTIES"]['action_date']["VALUE"]))?>" data-time-format="%d:%H:%M"></div>
                                            <?
                                            $pos = strpos($arResult["PROPERTIES"]['link']["VALUE"], '/booking/');
                                            if ($pos !== false) {
                                                //var_dump($pos);
                                                if ($_SESSION['typeOfUser'] == 'b2b') {
                                                    $link = $arResult['PROPERTIES']['link']['VALUE'];
                                                } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                                                    $re = '/\/[a-zA-Z]\w+\//';
                                                    $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['link']['VALUE']);
                                                    $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
                                                }
                                            }
                                            ?>
                                            <a href="<?if ($pos !== false) {
                                                if ($link) {
                                                    echo $link;
                                                } else {
                                                    echo 'javascript:void(0)';

                                                }

                                            } else {
                                                echo $arResult['PROPERTIES']['link']['VALUE'];

                                            }?>" class="btn-link-order btn btn-red btn-padding" data-id="<?=$arResult['ID']?>">забронировать  сейчас</a>
                                            <div class="find_tour_b find_tour_b_btn find_tour_b_btn-excursion" id="find_tour_b_excursion-<?=$arResult['ID']?>">
                                                <div class="find_tour_title">
                                                    Кто я?
                                                </div>
                                                <div class="find_tour_list">
                                                    <?
                                                    $re = '/\/[a-zA-Z]\w+\//';
                                                    $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['link']['VALUE']);
                                                    ?>
                                                    <div class="find_tour_item">
                                                        <span class="typeOfUser" style="display:none;" data-value="b2c"></span>
                                                        <a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx<?=$privateLink?>">Я частное лицо</a>
                                                    </div>
                                                    <div class="find_tour_item">
                                                        <span class="typeOfUser" style="display:none;" data-value="b2b"></span>
                                                        <a href="http://www.tailortour.ru<?=$arResult['PROPERTIES']['link']['VALUE']?>">Я агент</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
        <?}?>
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
    <div style="clear: both;"></div>
<?/*if($arResult[SECTION][ARCHIVE] == "Y"){*/?><!--
    <div style="text-align: center;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a href="/specialoffersarchive/" style="color: red;text-decoration:underline;font-size: 16px;">Архив акций</a>
        <br>
        <br>
    </div>
--><?/*}*/?>
</div>
