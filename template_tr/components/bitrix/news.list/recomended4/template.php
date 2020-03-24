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

<? if (count($arResult["ITEMS"]) > 0) { ?>
    <div class="container without-padding white-bg recomended4">
        <div class="row-1 row-recommend">
            <div class="col">
                <div class="recommend-img-main">
                    <img src="<?=$arResult['PICTURE_SRC']?>" alt=""/>
                    <h2>Рекомендуем посетить</h2>
                </div>
            </div>
            <div class="col">
                <div class="find-hotels">
                    <form class="find-hotels-form" method="get" action="/hotels/">
                        <input class="find-hotels-input" type="text" name="q" placeholder="Поиск отеля"/>
                        <input class="find-hotels-btn" type="submit" value=""/>
                    </form>
                </div>
                <?foreach($arResult["ITEMS"] as $arItem) { ?>
                    <ul class="recommended-hotels-list">
                        <? $name1 = strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED1"]["DISPLAY_VALUE"]);
                        if($name1){?>
                            <li>
                                <?
                                $NUM1 = $arItem["DISPLAY_PROPERTIES"]["RECOMMENDED1"]["VALUE"];
                                $arSelect1 = Array("PROPERTY_COUNTRY","PROPERTY_CITY","CODE");
                                $arSelectN1 = CIBlockElement::GetProperty(32, $NUM1, Array(), Array("CODE"=>"STAR_CATEGORY"));
                                $country_cityN1 = $arSelectN1->Fetch();
                                $star1 = $country_cityN1["VALUE_ENUM"];
                                $arFilter1 = Array("IBLOCK_ID"=>32, "ID"=>$NUM1);
                                $res1 = CIBlockElement::GetList(Array(), $arFilter1, false, false, $arSelect1);
                                $country_city1 = $res1->Fetch();
                                $countryId1 = $country_city1["PROPERTY_COUNTRY_VALUE"];
                                $cityId1 = $country_city1["PROPERTY_CITY_VALUE"];
                                $arCountry1 = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $countryId1), false, array("NAME"))->Fetch();
                                if(!empty($cityId1)){
                                    $arCity1 = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $cityId1), false, array("NAME"))->Fetch();
                                }
                                ?>
                                <p class="hotel-name"><?=strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED1"]["DISPLAY_VALUE"]);?><?if(!empty($star1)){?> <?=$star1?><b>*</b><?}?></p>
                                <p><?=$arCountry1["NAME"]?><?if($arCity1["NAME"]){?> / <?=$arCity1["NAME"]?><?}?></p>
                                <a class="btn btn-red" href="/hotels/<?=$country_city1["CODE"]?>/">Подробнее</a>
                            </li>
                        <?}?>
                        <? $name2 = strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED2"]["DISPLAY_VALUE"]);
                        if($name2){?>
                            <li>
                                <?
                                $NUM2 = $arItem["DISPLAY_PROPERTIES"]["RECOMMENDED2"]["VALUE"];
                                $arSelect = Array("PROPERTY_COUNTRY","PROPERTY_CITY","CODE");
                                $arSelectN2 = CIBlockElement::GetProperty(32, $NUM2, Array(), Array("CODE"=>"STAR_CATEGORY"));
                                $country_cityN2 = $arSelectN2->Fetch();
                                $star2 = $country_cityN2["VALUE_ENUM"];
                                $arFilter = Array("IBLOCK_ID"=>32, "ID"=>$NUM2);
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                                $country_city = $res->Fetch();
                                $countryId = $country_city["PROPERTY_COUNTRY_VALUE"];
                                $cityId2 = $country_city["PROPERTY_CITY_VALUE"];
                                $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $countryId), false, array("NAME"))->Fetch();
                                if(!empty($cityId2)){
                                    $arCity2 = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $cityId2), false, array("NAME"))->Fetch();
                                }
                                ?>
                                <p class="hotel-name"><?=strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED2"]["DISPLAY_VALUE"]);?><?if(!empty($star2)){?> <?=$star2?><b>*</b><?}?></p>
                                <p><?=$arCountry["NAME"]?><?if($arCity2["NAME"]){?> / <?=$arCity2["NAME"]?><?}?></p>
                                <a class="btn btn-red" href="/hotels/<?=$country_city["CODE"]?>/">Подробнее</a>
                            </li>
                        <?}?>
                        <? $name3 = strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED3"]["DISPLAY_VALUE"]);
                        if($name3){?>
                            <li>
                                <?
                                $NUM3 = $arItem["DISPLAY_PROPERTIES"]["RECOMMENDED3"]["VALUE"];
                                $arSelect = Array("PROPERTY_COUNTRY","PROPERTY_CITY","CODE");
                                $arSelectN3 = CIBlockElement::GetProperty(32, $NUM3, Array(), Array("CODE"=>"STAR_CATEGORY"));
                                $country_cityN3 = $arSelectN3->Fetch();
                                $star3 = $country_cityN3["VALUE_ENUM"];
                                $arFilter = Array("IBLOCK_ID"=>32, "ID"=>$NUM3);
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                                $country_city = $res->Fetch();
                                $countryId = $country_city["PROPERTY_COUNTRY_VALUE"];
                                $cityId3 = $country_city["PROPERTY_CITY_VALUE"];
                                $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $countryId), false, array("NAME"))->Fetch();
                                if(!empty($cityId3)){
                                    $arCity3 = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $cityId3), false, array("NAME"))->Fetch();
                                }
                                ?>
                                <p class="hotel-name"><?=strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED3"]["DISPLAY_VALUE"]);?><?if(!empty($star3)){?> <?=$star3?><b>*</b><?}?></p>
                                <p><?=$arCountry["NAME"]?><?if($arCity3["NAME"]){?> / <?=$arCity3["NAME"]?><?}?></p>
                                <a class="btn btn-red" href="/hotels/<?=$country_city["CODE"]?>/">Подробнее</a>
                            </li>
                        <?}?>
                        <? $name4 = strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED4"]["DISPLAY_VALUE"]);
                        if($name4){?>
                            <li>
                                <?
                                $NUM4 = $arItem["DISPLAY_PROPERTIES"]["RECOMMENDED4"]["VALUE"];
                                $arSelect = Array("PROPERTY_COUNTRY","PROPERTY_CITY","CODE");
                                $arSelectN4 = CIBlockElement::GetProperty(32, $NUM4, Array(), Array("CODE"=>"STAR_CATEGORY"));
                                $country_cityN4 = $arSelectN4->Fetch();
                                $star4 = $country_cityN4["VALUE_ENUM"];
                                $arFilter = Array("IBLOCK_ID"=>32, "ID"=>$NUM4);
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                                $country_city = $res->Fetch();
                                $countryId = $country_city["PROPERTY_COUNTRY_VALUE"];
                                $cityId4 = $country_city["PROPERTY_CITY_VALUE"];
                                $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $countryId), false, array("NAME"))->Fetch();
                                if(!empty($cityId4)){
                                    $arCity4 = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $cityId4), false, array("NAME"))->Fetch();
                                }
                                ?>
                                <p class="hotel-name"><?=strip_tags($arItem["DISPLAY_PROPERTIES"]["RECOMMENDED4"]["DISPLAY_VALUE"]);?><?if(!empty($star4)){?> <?=$star4?><b>*</b><?}?></p>
                                <p><?=$arCountry["NAME"]?><?if($arCity4["NAME"]){?> / <?=$arCity4["NAME"]?><?}?></p>
                                <a class="btn btn-red" href="/hotels/<?=$country_city["CODE"]?>/">Подробнее</a>
                            </li>
                        <?}?>
                    </ul>
                <? } ?>
            </div>

        </div>
    </div>
<? } ?>