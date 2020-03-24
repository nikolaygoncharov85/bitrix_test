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
        <div class="col">
            <div class="text text-block-padding">
                <p>
                    <?=$arResult['PREVIEW_TEXT']?>
                </p>
            </div>
        </div>
    </div>
    <?if(!empty($arResult['DETAIL_TEXT'])){?>
    <div class="row-1 row-inner white-bg inner-page-text">
        <div class="col">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    </div>
    <?}?>
    <?if(!empty($arResult['PROPERTIES']['PHOTO']['VALUE']) > 0){?>
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
    <?}?>
    <?
    $i = 0;
    $cityId = $arResult['PROPERTIES']['CITY']['VALUE'];
    $resortId = $arResult['PROPERTIES']['RESORT']['VALUE'];
    ?>
    <?if($resortId>0 || $cityId>0){?>
        <!--HOTELS BEGIN-->
        <div style="display: block;">
            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col bottom-carousel-block">
                    <h2 class="mt-col-dist">Отели рядом</h2>
                    <div class="row-1 row-3-sm bottom-carousel hotel_near">
                        <ul class="bottom-carousel-list" style="width: 20000px !important;">
                            <?
                            $rescity = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 32,'PROPERTY_CITY' => $cityId, "ACTIVE"=>"Y"), false, false);
                            $res_resort = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 32,'PROPERTY_RESORT' => $resortId, "ACTIVE"=>"Y"), false, false);
                            ?>
                            <?if($cityId>0){?>
                                <?while($aRescity = $rescity->GetNextElement())
                                {
                                    $arHotel = $aRescity->GetFields();
                                    $Hotelname = $arHotel["NAME"];
                                    $Hotelurl = $arHotel["DETAIL_PAGE_URL"];
                                    $Hotelimg = CFile::GetPath($arHotel["PREVIEW_PICTURE"]);
                                    $i++;
                                    ?>
                                    <li class="col1">
                                        <div class="special-item-inner">
                                            <div class="img" style="background: url('<?=$Hotelimg?>')"></div>
                                            <p class="hotel-name"><?=$Hotelname?></p>
                                            <a href="#" class="btn btn-red btn-100">забронировать</a>
                                            <a class="absolute-link" href="<?=$Hotelurl?>"></a>
                                        </div>
                                    </li>
                                <?}?>
                            <?}?>
                            <?if($resortId>0){?>
                                <?while($a_resort = $res_resort->GetNextElement())
                                {
                                    $ar_resort = $a_resort->GetFields();
                                    $Hotelname_r = $ar_resort["NAME"];
                                    $Hotelurl_r = $ar_resort["DETAIL_PAGE_URL"];
                                    $Hotelimg_r = CFile::GetPath($ar_resort["PREVIEW_PICTURE"]);
                                    $i++;
                                    ?>
                                    <li class="col1">
                                        <div class="special-item-inner">
                                            <div class="img" style="background: url('<?=$Hotelimg_r?>')"></div>
                                            <p class="hotel-name"><?=$Hotelname_r?></p>
                                            <a href="#" class="btn btn-red btn-100">забронировать</a>
                                            <a class="absolute-link" href="<?=$Hotelurl_r?>"></a>
                                        </div>
                                    </li>
                                <?}?>
                            <?}?>
                        </ul>
                    </div>
                    <?if($i>3){?>
                        <a href="#" class="pr jcarousel-control-prev" style="display: block;" data-jcarouselcontrol="true"></a>
                        <a href="#" class="ne jcarousel-control-next" style="display: block;" data-jcarouselcontrol="true"></a>
                    <?}?>
                </div>
            </div>
        </div>
        <!--HOTELS END-->
        <!--TRANSFERS BEGIN-->
        <div style="display: block;">
            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col bottom-carousel-block">
                    <h2 class="mt-col-dist">Трансферы</h2>
                    <div class="row-1 row-3-sm bottom-carousel hotel_near">
                        <ul class="bottom-carousel-list" style="width: 20000px !important;">
                            <?
                            $i2 = 0;
                            $rescity2 = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 47,'PROPERTY_CITY' => $cityId, "ACTIVE"=>"Y"), false, false);
                            $res_resort2 = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 47,'PROPERTY_RESORT' => $resortId, "ACTIVE"=>"Y"), false, false);
                            ?>
                            <?if($cityId>0){?>
                                <?while($aRescity2 = $rescity2->GetNextElement())
                                {
                                    $arHotel2 = $aRescity2->GetFields();
                                    $Hotelname2 = $arHotel2["NAME"];
                                    $Hotelurl2 = $arHotel2["CODE"];
                                    $Hotelimg2 = CFile::GetPath($arHotel2["PREVIEW_PICTURE"]);
                                    $i2++;
                                    ?>
                                    <li class="col1">
                                        <div class="special-item-inner">
                                            <div class="img" style="background: url('<?=$Hotelimg2?>')"></div>
                                            <p class="hotel-name"><?=$Hotelname2?></p>
                                            <a href="#" class="btn btn-red btn-100">забронировать</a>
                                            <a class="absolute-link" href="/transfers/<?=$Hotelurl2?>/"></a>
                                        </div>
                                    </li>
                                <?}?>
                            <?}?>
                            <?if($resortId>0){?>
                                <?while($a_resort2 = $res_resort2->GetNextElement())
                                {
                                    $ar_resort2 = $a_resort2->GetFields();
                                    $Hotelname_r2 = $ar_resort2["NAME"];
                                    $Hotelurl_r2 = $ar_resort2["CODE"];
                                    $Hotelimg_r2 = CFile::GetPath($ar_resort2["PREVIEW_PICTURE"]);
                                    $i2++;
                                    ?>
                                    <li class="col1">
                                        <div class="special-item-inner">
                                            <div class="img" style="background: url('<?=$Hotelimg_r2?>')"></div>
                                            <p class="hotel-name"><?=$Hotelname_r2?></p>
                                            <a href="#" class="btn btn-red btn-100">забронировать</a>
                                            <a class="absolute-link" href="/transfers/<?=$Hotelurl_r2?>/"></a>
                                        </div>
                                    </li>
                                <?}?>
                            <?}?>
                        </ul>
                    </div>
                    <?if($i2>3){?>
                        <a href="#" class="pr jcarousel-control-prev" style="display: block;" data-jcarouselcontrol="true"></a>
                        <a href="#" class="ne jcarousel-control-next" style="display: block;" data-jcarouselcontrol="true"></a>
                    <?}?>
                </div>
            </div>
        </div>
        <!--TRANSFERS END-->
    <?}?>
</div>
<div class="popup-bg popup-order">
    <div class="container">
        <div class="popup">
            <div class="popup-close"></div>
            <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "request_price_park", array(
                "WEB_FORM_ID" => 26,
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
            $('#request_type input').val('Парк');
            <?$page = $APPLICATION->GetCurPageParam("arrFilter_pf","COUNTRY", "RESORT", "CITY", "set_filter"); ?>
            var url = "http://www.tailortour.ru" + "<?=$page?>";
            $('#page_url input').val(url);
        });
        $(function() {
            var jcarousel = $('.hotel_near');
            var min_item_width = 240;
            jcarousel
                .on('jcarousel:reload jcarousel:create', function () {
                    var carousel = $(this),
                    width = carousel.innerWidth();
                    var container = $('.row-1');
                    var item_width = container.innerWidth()/3;
                    if (item_width < min_item_width) item_width = min_item_width;
                    var max_count_item = parseInt($(window).width() / item_width);
                    if (max_count_item % 2 == 0 && item_width != min_item_width) max_count_item--;
                    if (carousel.jcarousel('items').length <= max_count_item) {
                        max_count_item = carousel.jcarousel('items').length;
                        $('.jcarousel-control-prev, .jcarousel-control-next').hide();
                    } else {
                        $('.jcarousel-control-prev, .jcarousel-control-next').show();
                    }
                    carousel.jcarousel('items').css('width', item_width + 'px');
                    carousel.width(item_width*max_count_item);
                    var W = $(".hotel_near").width();
                    W = W * 0.3333;
                    $(".hotel_near .col1").css('width',W);
                })
                .jcarousel({
                    wrap: 'circular'
                })
                .jcarouselAutoscroll({
                    interval: 5000
                })

            $('.jcarousel-control-prev')
                .jcarouselControl({
                    target: '-=1'
                });

            $('.jcarousel-control-next')
                .jcarouselControl({
                    target: '+=1'
                });
        });
    });
</script>