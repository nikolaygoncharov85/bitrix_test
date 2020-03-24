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
<? if (!empty($arResult["ITEMS"])) { ?>
            <a href="/hotels/?arrFilter_pf%5BCOUNTRY%5D=<?=$_REQUEST["arrFilter_pf"]["COUNTRY"]?>&arrFilter_pf%5BRESORT%5D=&arrFilter_pf%5BCITY%5D=&set_filter=Y" class="hotels_spo_all absolute">смотреть все</a>
            <div class="row-1 row-3-sm hotels_spo">
                <div class="img_slider_hotels relative">
                    <ul class="img_slider_hotels_ul spo_beach">
                        <?if(!empty($_REQUEST["arrFilter_pf"]["COUNTRY"])){?>
                            <?$url = $_REQUEST["arrFilter_pf"]["COUNTRY"];?>
                            <?foreach($arResult["ITEMS"] as $arItem) { ?>
                                <?$select = $arItem["PROPERTY_240"];?>
                                <? if($select==$url) { ?>
                                    <li class="img_slide_hotel">
                                        <div class="special-item-inner">
                                            <div class="relative">
                                                <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                                                <?
                                                $Country_ID = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];
                                                if(!empty($Country_ID)) {
                                                    $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $Country_ID), false, array("NAME"))->Fetch();
                                                    $City_ID = $arItem["PROPERTIES"]["CITY"]["VALUE"];
                                                    $arCity = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>27,"SECTION_ID"=>$Country_ID), false, array("NAME"))->Fetch();
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
                                            <a href="<?=$arItem["DISPLAY_PROPERTIES"]['link']["VALUE"]?>" class="btn btn-red btn-100">забронировать</a>
                                        </div>
                                    </li>
                                <? } ?>
                            <? } ?>
                        <? } else { ?>
                            <?foreach($arResult["ITEMS"] as $arItem) { ?>
                                <li class="img_slide_hotel">
                                    <div class="special-item-inner">
                                        <div style="position: relative;">
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
                                                $arCity = CIBlockElement::GetList(Array(), Array('IBLOCK_ID'=>27,"SECTION_ID"=>$Country_ID), false, array("NAME"))->Fetch();
                                                ?>
                                                <p class="spo_hotel_country"><?=$arCountry['NAME']?><?if(!empty($arCity['NAME'])){?><span class="spo_hotel_city"><?=$arCity['NAME']?></span><?}?></p>
                                            <?}?>
                                            <?if($arHotel['CODE']){?>
                                                <div class="hotel-description">
                                                    <a class="spo_list_link" href="/hotels/<?=$arHotel['CODE']?>/" title="Отель"><?echo$arHotel["NAME"]?></a>
                                                </div>
                                            <?}?>
                                            <p class="spo_element_description"><?=mb_strimwidth($arItem["NAME"], 0, 30, "...");?></p>
                                            <a class="absolute-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                                        </div>
                                        <?/*
                                        $Country_ID = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];
                                        if(!empty($Country_ID)) {
                                            $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $Country_ID), false, array("NAME"))->Fetch();
                                            */?><!--
                                            <p class="hotel-name"><?/*=$arCountry['NAME'] */?></p>
                                            <div class="hotel-description">
                                                <a href="/hotels/<?/*= $arHotel['CODE'] */?>" title="Отель"><?/* echo $arHotel["NAME"] */?></a>
                                            </div>
                                        --><?/*}*/?>
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
                                        <?$pos = strpos($arItem["PROPERTIES"]['link']["VALUE"], '/booking/');
                                        if ($pos !== false) {
                                            if ($_SESSION['typeOfUser'] == 'b2b') {
                                                $link = $arItem['PROPERTIES']['link']['VALUE'];
                                            } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                                                $re = '/\/[a-zA-Z]\w+\//';
                                                $privateLink = preg_replace($re,'',$arItem['PROPERTIES']['link']['VALUE']);
                                                $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
                                            }
                                        }?>
                                        <a href="<?if ($pos !== false) {
                                            if ($link) {echo $link;} else {echo 'javascript:void(0)';}} else {echo $arItem['PROPERTIES']['link']['VALUE'];}?>" class="btn-link-order btn btn-red btn-100" data-id="<?=$arItem['ID']?>">забронировать</a>
                                        <div class="find_tour_b find_tour_b_btn find_tour_b_btn-excursion" id="find_tour_b_excursion-<?=$arItem['ID']?>">
                                            <div class="find_tour_title">Кто я?</div>
                                            <div class="find_tour_list">
                                                <?$re = '/\/[a-zA-Z]\w+\//';$privateLink = preg_replace($re,'',$arItem['PROPERTIES']['link']['VALUE']);?>
                                                <div class="find_tour_item">
                                                    <span class="typeOfUser" style="display:none;" data-value="b2c"></span>
                                                    <a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx<?=$privateLink?>">Я частное лицо</a>
                                                </div>
                                                <div class="find_tour_item">
                                                    <span class="typeOfUser" style="display:none;" data-value="b2b"></span>
                                                    <a href="http://www.tailortour.ru<?=$arItem['PROPERTIES']['link']['VALUE']?>">Я агент</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <? }?>
                        <? }?>
                    </ul>
                    <div class="absolute img_slider_hotels_pager"></div>
                </div>
            </div>
            <?if($arResult["NAV_STRING"]){?>
                <div class="hotels-list-pagination">
                    <?=$arResult["NAV_STRING"]?>
                </div>
            <?}?>
<? } ?>