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
<?

?>
<div class="page-content">
    <div class="row-1 row-inner white-bg mb-col-dist">
        <?if($arResult['PROPERTIES']["show_gallery"]["VALUE"]!="Y"){?>
            <div class="main-img-block">
                <img src="<?=$arResult['DETAIL_PICTURE']['SRC'];?>" alt=""/>
            </div>
        <?}?>
        <?if($arResult['PROPERTIES']["show_gallery"]["VALUE"]=="Y"){?>
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
            <div class="text text-block-padding">
                <?=$arResult['DETAIL_TEXT']?>
            </div>
        </div>
        <!-- BEGIN добавление пользовательских полей заголок-описание-галерея -->
        <div class="row-1 row-inner white-bg mb-col-dist accordion_wrapper">
            <h3 class="accordion_h3">
                Предлагаем варианты свадебных церемоний
                <div class="excursion-order" style="margin: 0 !important;">
                    <? if (strlen($arResult['PROPERTIES']['PRICE']['VALUE']) > 0) { ?>
                        от <?=$arResult['PROPERTIES']['PRICE']['VALUE']?>
                    <? } ?>

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
                                    <a href="http://www.tailortour.ru<?=$arResult['PROPERTIES']['booking']['VALUE']?>">Я агент</a>
                                </div>

                            </div>
                        </div>

                    <? } else { ?>
                        <a href="#" class="btn btn-red open-popup popup-order" data-popup="popup-order" data-name="<?=$arResult['NAME']?>">заказать</a>
                    <? } ?>
                </div>
            </h3>
            <hr>
            <?if($arResult["PROPERTIES"]["accordion1_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion1_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion1_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion1_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion1_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion1_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion2_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion2_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion2_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion2_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion2_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion2_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion3_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion3_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion3_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion3_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion3_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion3_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion4_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion4_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion4_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion4_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion4_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion4_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion5_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion5_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion5_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion5_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion5_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion5_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion6_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion6_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion6_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion6_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion6_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion6_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion7_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion7_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion7_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion7_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion7_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion7_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion8_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion8_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion8_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion8_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion8_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion8_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion9_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion9_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion9_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion9_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion9_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion9_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult["PROPERTIES"]["accordion10_header"]["VALUE"]){?>
                <div class="col accordion">
                    <span class="slider_h"><?=$arResult["PROPERTIES"]["accordion10_header"]["VALUE"];?></span>
                    <?if($arResult["PROPERTIES"]["accordion10_description"]["~VALUE"]["TEXT"]){?>
                        <div class="slider_div"><?=$arResult["PROPERTIES"]["accordion10_description"]["~VALUE"]["TEXT"]?></div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['accordion10_gallery']['VALUE']){?>
                        <div class="row-1 row-inner mb-col-dist img_list">
                            <div class="col without-padding">
                                <? foreach($arResult['PROPERTIES']['accordion10_gallery']['VALUE'] as $arPhoto) { ?>
                                    <a href="<?=$arPhoto['detail']?>" class="fancybox" rel="group" title="<?=$arPhoto['description']?>">
                                        <img width="100%" src="<?=$arPhoto['small']?>" alt="">
                                    </a>
                                <? } ?>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?}?>
                </div>
            <?}?>
        </div>
        <!-- END добавление пользовательских полей заголок-описание-галерея -->
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
            $('#request_type input').val('Сваедбный тур');
            var url = "http://www.tailortour.ru" + "<?=$APPLICATION->GetCurPage()?>";
            $('#page_url input').val(url);
            //$('#request_title_name').html(name);
            //$('#mailto-order').attr('href', 'mailto:fit@inflottravel.com?subject=' + name);
        });
    });
</script>
