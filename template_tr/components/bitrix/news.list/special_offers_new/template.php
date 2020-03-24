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
<div class="container white-bg">
    <div class="row-1">
        <div class="relative">
            <div class="special_title">Специальные предложения</div>
            <div class="special_all absolute"><a href="/specialoffers/" title="Другие акции">Другие акции</a></div>
            <div class="row-1 row-3-sm">
                <div class="special_list_wr"">
                    <div class="row-1 row-3-sm">
                    <?
                    $k = 1;
                    $count = count($arResult["ITEMS"]);
                    ?>
                    <?foreach($arResult["ITEMS"] as $arItem) { ?>
                        <div class="special_list_el relative">
                            <a class="special_detail" href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem["NAME"]?>">
                                <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt="<?=$arItem["NAME"]?>"/>
                                <h4 class="special_name"><?=$arItem["NAME"]?></h4>
                            </a>
                            <div class="special_description">
                                <?
                                $hotel_id = $arItem["PROPERTIES"]["hotel"]["VALUE"];
                                $starSelect = CIBlockElement::GetProperty(32, $hotel_id, Array(), Array("CODE"=>"STAR_CATEGORY"));
                                $starValue = $starSelect -> GetNext();
                                $star = $starValue["~VALUE_ENUM"];
                                $country_id = $arItem["PROPERTIES"]["COUNTRY"]["VALUE"];
                                $H = CIBlockElement::GetByID($hotel_id);
                                $H_res = $H->GetNext();
                                $C = CIblockSection::GetByID($country_id);
                                $C_res = $C->GetNext();
                                $City_id = $arItem["PROPERTIES"]["CITY"]["VALUE"];
                                $City = CIBlockElement::GetByID($City_id);
                                $City_res = $City->GetNext();
                                $City_name = $City_res["NAME"];
                                ?>
                                <span class="country_span">
                                    <?=$C_res["NAME"]?>
                                    <?if($City_name){?>, <?=$City_name?><?}?>
                                </span>
                                <a href="<?=$H_res["DETAIL_PAGE_URL"]?>" title="Отель: <?=$H_res["NAME"]?>">
                                    <?=$H_res["NAME"]?>
                                    <?if($star){?> <?=$star?>*<?}?>
                                </a>
                            </div>
                            <?if(!empty($arItem["PROPERTIES"]["action_date"]["~VALUE"]) || !empty($arItem["PROPERTIES"]["PRICE"]["~VALUE"])){?>
                                <div class="special_date_price">
                                    <?if(!empty($arItem["PROPERTIES"]["action_date"]["~VALUE"])){?>
                                        <span>До <?=$arItem["PROPERTIES"]["action_date"]["~VALUE"]?></span>
                                    <?}if(!empty($arItem["PROPERTIES"]["PRICE"]["~VALUE"])){?>
                                        <span class="price"><?=$arItem["PROPERTIES"]["PRICE"]["~VALUE"]?></span>
                                    <?}?>
                                </div>
                            <?}?>
                            <?if(!empty($arItem['PROPERTIES']["link"]["~VALUE"])){?>
                                <a class="special_booking" href="<?=$arItem['PROPERTIES']["link"]["~VALUE"]?>">Забронировать</a>
                            <?}?>
                        </div>
                        <?if($k % 3 == 0 && $count!=$k){?>
                            </div>
                            <div class="row-1 row-3-sm">
                        <?}?>
                        <?if($count==$k){?>
                            </div>
                        <?}?>
                        <?$k++;?>
                    <?}?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<? } ?>