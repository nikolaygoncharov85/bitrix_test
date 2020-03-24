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
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <h2 class="mt-col-dist">Специальные предложения по <?=$arParams['TITLE']?></h2>
            <div class="row-1 row-3-sm">
                <?if(!empty($_REQUEST["arrFilter_pf"]["COUNTRY"])){?>
                    <?$url = $_REQUEST["arrFilter_pf"]["COUNTRY"];?>
                    <?foreach($arResult["ITEMS"] as $arItem) { ?>
                        <?$select = $arItem["PROPERTY_240"];?>
                        <? if($select==$url) { ?>
                            <div class="col">
                                <div class="special-item-inner">
                                    <div style="position: relative;">
                                        <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                                        <p class="hotel-name bold"><?echo $arItem["NAME"]?>&nbsp;
                                            <?$arHotel = $arResult['HOTELS'][$arItem['PROPERTIES']['hotel']['VALUE']];?>
                                            <?foreach($arHotel['PROPERTY_STAR_CATEGORY_VALUE'] as $star){?>
                                                <?=$star?>*
                                            <?}?>
                                            <?foreach($arHotel['PROPERTY_STAR_CATEGORY_TYPE_VALUE'] as $star){?>
                                                <?=$star?>
                                            <?}?>
                                        </p>
                                        <a class="absolute-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                                    </div>
                                    <?
                                    $Country_ID = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];
                                    if(!empty($Country_ID)) {
                                        $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $Country_ID), false, array("NAME"))->Fetch();
                                        $star = $arHotel["PROPERTY_STAR_CATEGORY_VALUE"];
                                        ?>
                                        <p class="hotel-name"><?=$arCountry['NAME'] ?></p>
                                        <div class="hotel-description">
                                            <a href="/hotels/<?=$arHotel['CODE']?>/" title="Отель"><?echo$arHotel["NAME"]?><?if(!empty($star)){?> <?=$star?>*<?}?></a>
                                            <pre style="display: none">
                                                <?
                                                var_dump($arHotel["PROPERTY_STAR_CATEGORY_VALUE"]);
                                                ?>
                                            </pre>
                                        </div>
                                    <?}
                                    $Tour_ID = $arItem["PROPERTIES"]["tour"]["VALUE"];
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
                            </div>
                        <? } ?>
                    <? } ?>
                <? } else { ?>
                    <?foreach($arResult["ITEMS"] as $arItem) { ?>
                        <div class="col">
                            <div class="special-item-inner">
                                <div style="position: relative;">
                                    <img src="<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>" alt="">
                                    <p class="hotel-name bold"><?echo $arItem["NAME"]?>&nbsp;
                                        <?$arHotel = $arResult['HOTELS'][$arItem['PROPERTIES']['hotel']['VALUE']];?>
                                        <?foreach($arHotel['PROPERTY_STAR_CATEGORY_VALUE'] as $star){?>
                                            <?=$star?>*
                                        <?}?>
                                        <?foreach($arHotel['PROPERTY_STAR_CATEGORY_TYPE_VALUE'] as $star){?>
                                            <?=$star?>
                                        <?}?>
                                    </p>
                                    <a class="absolute-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                                </div>
                                <?
                                $Country_ID = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];
                                if(!empty($Country_ID)) {
                                    $arCountry = CIblockSection::GetList(array(), array('IBLOCK_ID' => 27, 'ID' => $Country_ID), false, array("NAME"))->Fetch();
                                    ?>
                                    <p class="hotel-name"><?=$arCountry['NAME'] ?></p>
                                    <div class="hotel-description">
                                        <a href="/hotels/<?= $arHotel['CODE'] ?>" title="Отель"><? echo $arHotel["NAME"] ?></a>
                                    </div>
                                <?}
                                $Tour_ID = $arItem["PROPERTIES"]["tour"]["VALUE"];
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
                        </div>
                    <? }?>
                <? }?>
            </div>
            <div class="hotels-list-pagination">
                <?=$arResult["NAV_STRING"]?>
            </div>
            <?if($arResult[SECTION][ARCHIVE] == "Y"){?>
                <div style="text-align: center;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="/specialoffersarchive/" style="color: red;text-decoration:underline;font-size: 16px;">Архив акций</a>
                    <br>
                    <br>
                </div>
            <?}?>
        </div>
    </div>
<? } ?>
