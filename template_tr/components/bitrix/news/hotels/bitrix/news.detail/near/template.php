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
<?if($arResult["PROPERTIES"]["hotel_near"]["VALUE"]){?>
    <div class="bottom-slider near_blocks" style="display: block;">
        <h2><?=$arResult["PROPERTIES"]["hotel_near"]["NAME"]?></h2>
        <?$a1 = 0;?>
        <div class="bottom-carousel-block">
            <div class="bottom-carousel">
                <ul class="bottom-carousel-list">
                    <?foreach($arResult["PROPERTIES"]["hotel_near"]["VALUE"] as $id){?>
                        <?
                        $a1++;
                        $arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
                        $arFilter = Array("IBLOCK_ID"=>32, "ID" => $id);
                        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                        if($ar_res = $res->GetNext()){
                            $arHotel = $ar_res;
                        }
                        if ($arHotel['DETAIL_PICTURE'] > 0) {
                            $filePreview = CFile::ResizeImageGet($arHotel['DETAIL_PICTURE'], array('width' => 250, 'height' => 200), BX_RESIZE_IMAGE_EXACT, false);
                        } else {
                            $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
                        }
                        $img = $filePreview['src'];
                        ?>
                        <li>
                            <div class="relative">
                                <img src="<?=$img?>" alt="<?=$arHotel['NAME']?>" title="<?=$arHotel['NAME']?>" width="250" height="200"/>
                                <p class="bottom-carousel-photo-name"><?=$arHotel['NAME']?></p>
                                <a href="<?=$arHotel['DETAIL_PAGE_URL']?>" title="<?=$arHotel['NAME']?>"></a>
                                <!--<a href="<?/*=$arHotel['DETAIL_PAGE_URL']*/?>" class="btn btn-red" title="<?/*=$arHotel['NAME']*/?>">подробнее</a>-->
                            </div>
                        </li>
                    <? } ?>
                </ul>
            </div>
            <?if($a1>3){?>
                <a href="#" class="jcarousel-control-prev"></a>
                <a href="#" class="jcarousel-control-next"></a>
            <?}?>
        </div>
    </div>
<?}?>
<?if($arResult["PROPERTIES"]["transfers"]["VALUE"]){?>
    <hr>
    <div class="bottom-slider near_blocks" style="display: block;">
        <h2><?=$arResult["PROPERTIES"]["transfers"]["NAME"]?></h2>
        <?$a2 = 0;?>
        <div class="bottom-carousel-block">
            <div class="bottom-carousel">
                <ul class="bottom-carousel-list">
                    <?foreach($arResult["PROPERTIES"]["transfers"]["VALUE"] as $id2){?>
                        <?
                        $arSelect2 = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
                        $arFilter2 = Array("IBLOCK_ID"=>47, "ID" => $id2);
                        $res2 = CIBlockElement::GetList(Array(), $arFilter2, false, false, $arSelect2);
                        if($ar_res2 = $res2->GetNext()){
                            $arTransfers = $ar_res2;
                        }
                        if ($arTransfers['DETAIL_PICTURE'] > 0) {
                            $filePreview2 = CFile::ResizeImageGet($arTransfers['DETAIL_PICTURE'], array('width' => 250, 'height' => 200), BX_RESIZE_IMAGE_EXACT, false);
                        } else {
                            $filePreview2['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
                        }
                        $img2 = $filePreview2['src'];
                        ?>
                        <li>
                            <div>
                                <img src="<?=$img2?>" alt="<?=$arTransfers['NAME']?>" title="<?=$arTransfers['NAME']?>" width="250" height="200"/>
                                <p class="bottom-carousel-photo-name"><?=$arTransfers['NAME']?></p>
                                <a href="/transfers/<?=$arTransfers['CODE']?>/" title="<?=$arTransfers['NAME']?>"></a>
                            </div>
                        </li>
                    <? } ?>
                </ul>
            </div>
            <?if($a2>3){?>
                <a href="#" class="jcarousel-control-prev"></a>
                <a href="#" class="jcarousel-control-next"></a>
            <?}?>
        </div>
    </div>
<?}?>
<?if($arResult["PROPERTIES"]["excursions"]["VALUE"]){?>
    <hr>
    <div class="bottom-slider near_blocks" style="display: block;">
        <h2><?=$arResult["PROPERTIES"]["excursions"]["NAME"]?></h2>
        <?$a3 = 0;?>
        <div class="bottom-carousel-block">
            <div class="bottom-carousel">
                <ul class="bottom-carousel-list">
                    <?foreach($arResult["PROPERTIES"]["excursions"]["VALUE"] as $id3){?>
                        <?
                        $arSelect3 = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
                        $arFilter3 = Array("IBLOCK_ID"=>29, "ID" => $id3);
                        $res3 = CIBlockElement::GetList(Array(), $arFilter3, false, false, $arSelect3);
                        if($ar_res3 = $res3->GetNext()){
                            $arExcursions = $ar_res3;
                        }
                        if ($arExcursions['DETAIL_PICTURE'] > 0) {
                            $filePreview3 = CFile::ResizeImageGet($arExcursions['DETAIL_PICTURE'], array('width' => 250, 'height' => 200), BX_RESIZE_IMAGE_EXACT, false);
                        } else {
                            $filePreview3['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
                        }
                        $img3 = $filePreview3['src'];
                        ?>
                        <li>
                            <div>
                                <img src="<?=$img3?>" alt="<?=$arExcursions['NAME']?>" title="<?=$arExcursions['NAME']?>" width="250" height="200"/>
                                <p class="bottom-carousel-photo-name"><?=$arExcursions['NAME']?></p>
                                <a href="<?=$arExcursions['DETAIL_PAGE_URL']?>" title="<?=$arExcursions['NAME']?>"></a>
                            </div>
                        </li>
                    <? } ?>
                </ul>
            </div>
            <?if($a3>3){?>
                <a href="#" class="jcarousel-control-prev"></a>
                <a href="#" class="jcarousel-control-next"></a>
            <?}?>
        </div>
    </div>
<?}?>
