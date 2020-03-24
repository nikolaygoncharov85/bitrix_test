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
$obMaster = new CMainMaster();
$rateRubUsd=$obMaster->getCource();
$rateRubEur=$obMaster->getCource("EUR");
?>
<? if (!empty($arResult["ITEMS"])){?>
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col relative">
            <?
            global $arrFilter_hotel;
            ?>
            <h2 class="mt-col-dist hotels_spo_h2">Другие спецпредложения</h2>
            <div class="row-1 row-3-sm hotels_spo">
                <div class="img_slider_hotels relative">
                    <div class="hotels_spo_7_list">
                        <ul class="img_slider_hotels_ul spo_hotel_slider">
                            <?foreach($arResult["ITEMS"] as $key => $arItem){?>
                                <?if($key<=7){?>
                                    <li class="img_slide_hotel">
                                        <div class="special-item-inner">
                                            <div class="relative">
                                                <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                                                <?
                                                $arHotel = $arResult['HOTELS'][$arItem['PROPERTIES']['hotel']['VALUE']];
                                                $star = $arHotel["PROPERTY_STAR_CATEGORY_VALUE"];
                                                if(!empty($star)){?>
                                                    <div class="spo_hotel_stars">
                                                        <?
                                                        $a = [1,2,3,4,5];
                                                        foreach($a as $i){
                                                            if($i<=$star){?>
                                                                <span class="star_bold"></span>
                                                            <?}else{?>
                                                                <span class="star_light"></span>
                                                            <?}
                                                            $a++;
                                                        }
                                                        ?>
                                                        <div class="clear"></div>
                                                    </div>
                                                <?}?>
                                                <?
                                                $Country_ID = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];
                                                if(!empty($Country_ID)) {
                                                    $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $Country_ID), false, array("NAME"))->Fetch();
                                                    $City_ID = $arItem["PROPERTIES"]["CITY"]["VALUE"];
                                                    $arCity = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>27,"ID"=>$City_ID), false, array("NAME"))->Fetch();
                                                    ?>
                                                    <p class="spo_hotel_country"><?=$arCountry['NAME']?><?if(!empty($arCity['NAME'])){?><span class="spo_hotel_city"><?=$arCity['NAME']?></span><?}?></p>
                                                <?}?>
                                                <?if($arHotel['CODE']){?>
                                                    <div class="hotel-description">
                                                        <a class="spo_list_link" href="/hotels/<?=$arHotel['CODE']?>/" title="Отель"><?=$arHotel["NAME"]?></a>
                                                    </div>
                                                <?}?>
                                                <p class="spo_element_description"><?=mb_strimwidth($arItem["NAME"], 0, 30, "...");?></p>
                                                <a class="absolute-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                                            </div>
                                            <?$Tour_ID = $arItem["PROPERTIES"]["tour"]["VALUE"];
                                            if(!empty($Tour_ID)){
                                                $arTour = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 23, 'ID' => $Tour_ID), false, array("NAME", "CODE"))->Fetch();
                                                ?>
                                                <div class="hotel-description">
                                                    <a href="/tours/<?=$arTour['CODE']?>/" title="Тур"><?echo $arTour["NAME"]?></a>
                                                </div>
                                            <?}if(!empty($arItem["PROPERTIES"]["PRICE"]["VALUE"])){
                                                if(!empty($arItem["PROPERTIES"]["start_vote"]["VALUE"])){
                                                    $arVal = $arItem["PROPERTIES"]["PRICE"]["VALUE"];
                                                    $arConvert_vote = $arItem["PROPERTIES"]["convert_vote"]["VALUE"];
                                                    $arStart_vote = $arItem["PROPERTIES"]["start_vote"]["VALUE"];
                                                    if($arStart_vote == 'usd'){
                                                        if($arConvert_vote == 'Y'){
                                                            $arRound = $arVal*$rateRubUsd;
                                                            $arPrice = round($arRound,0);
                                                            $arClass = 'price_rub';
                                                        } else {
                                                            $arPrice = $arVal;
                                                            $arClass = 'price_usd';
                                                        }
                                                    }
                                                    if($arStart_vote == 'euro'){
                                                        if($arConvert_vote == 'Y'){
                                                            $arRound = $arVal*$rateRubEur;
                                                            $arPrice = round($arRound,0);
                                                            $arClass = 'price_rub';
                                                        } else {
                                                            $arPrice = $arVal;
                                                            $arClass = 'price_euro';
                                                        }
                                                    }?>
                                                    <div class="hotel-name text-center bold">Цена от
                                                        <span class="price_spec <?=$arClass?>"><?=$arPrice?></span>
                                                    </div>
                                                <?}
                                            }?>
                                            <?if($arItem["DISPLAY_PROPERTIES"]['link']["VALUE"]){?>
                                                <a href="<?=$arItem["DISPLAY_PROPERTIES"]['link']["VALUE"]?>" class="btn btn-red btn-100">забронировать</a>
                                            <?}?>
                                        </div>
                                    </li>
                                <?}?>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? } ?>