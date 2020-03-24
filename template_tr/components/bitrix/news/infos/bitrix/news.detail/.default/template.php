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
<div class="col-lg-9 col-md-9 col-sm-12">
    <div class="row"><?=$GLOBALS["TEXT_UP"]?></div>
</div>
<div class="container" style="background: #ffffff;padding: 20px;">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="row hotel_tab_item active">
            <div class="col-sm-12">
                <div class="card_text">
                    <div class="text_page">
                        <?=$arResult['DETAIL_TEXT']?>
                    </div>
                    <? if($arResult['PROPERTIES']['gallery']['VALUE']){?>
                        <div class="hidden_block">
                            <div class="hidden_block_title opening">
                                Галерея
                                <span class="minus">-</span> -->
                            </div>
                            <div class="substrate" style="background-image: url('/img/content/text_img2.jpg')">
                                <div id="carousel1" class="hostel_photo carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <? foreach($arResult['PROPERTIES']['gallery']['VALUE'] as $key => $arPhoto) { ?>
                                            <div class="item<? if ($key==0) { ?> active<? } ?>">
                                                <img src="<?=$arPhoto['list']?>" alt="">
                                                <div class="photo_description">
                                                    <?=$arResult['PROPERTIES']['gallery'][$key]['DESCRIPTION']?> 
                                                </div>
                                            </div>
                                        <? } ?>
                                        <div class="num"></div>
                                    </div>
                                    <a class="left photo_control" href="#carousel1" role="button" data-slide="prev">
                                        <div class="icon_photo_prev"></div> </a>
                                    <a class="right photo_control" href="#carousel1" role="button" data-slide="next">
                                        <div class="icon_photo_next"></div> </a>
                                </div>
                                <p class="substrate_title"><?=$arResult['PROPERTIES']['gallery_title']['VALUE']?$arResult['PROPERTIES']['gallery_title']['VALUE']:"Сардиния - пространство идеального отдыха"?></p>
                                <p class="substrate_text">
                                    <a target="_blank" href="<?=$arResult['PROPERTIES']['gallery_link']['VALUE']?$arResult['PROPERTIES']['gallery_link']['VALUE']:"/booking/?departFrom=1&country=6292&dateFrom=2016-06-11&dateTo=2016-07-09&adults=2&childs=0&pageSize=20&aviaQuotaMask=5&hotelQuotaMask=5&mainOnly=0"?>"><?=$arResult['PROPERTIES']['photo_text']['VALUE']?$arResult['PROPERTIES']['photo_text']['VALUE']:"бронируйте сейчас"?></a>
                                </p>
                            </div>
                        </div>
                    <?} elseif($arResult['PROPERTIES']['photo']['VALUE']){?>
                        <div class="hidden_block">
                            <div class="hidden_block_title opening">
                                Галерея
                            </div>
                            <div class="substrate" style="background-image: url('/img/content/text_img2.jpg')">
                                <div id="carousel1" class="hostel_photo carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <? foreach($arResult['PROPERTIES']['photo']['VALUE'] as $key => $arPhoto) { ?>
                                            <div class="item<? if ($key==0) { ?> active<? } ?>">
                                                <img src="<?=$arPhoto['list']?>" alt="">
                                                <div class="photo_description">
                                                    <?=$arResult['PROPERTIES']['photo'][$key]['DESCRIPTION']?> 
                                                </div>
                                            </div>
                                        <? } ?>
                                        <div class="num"></div>
                                    </div>
                                    <a class="left photo_control" href="#carousel1" role="button" data-slide="prev">
                                        <div class="icon_photo_prev"></div> </a>
                                    <a class="right photo_control" href="#carousel1" role="button" data-slide="next">
                                        <div class="icon_photo_next"></div> </a>
                                </div>
                                <p class="substrate_title"><?=$arResult['PROPERTIES']['photo_title']['VALUE']?$arResult['PROPERTIES']['photo_title']['VALUE']:"Сардиния - пространство идеального отдыха"?></p>
                                <p class="substrate_text">
                                    <a target="_blank" href="<?=$arResult['PROPERTIES']['photo_link']['VALUE']?$arResult['PROPERTIES']['photo_link']['VALUE']:"/booking/?departFrom=1&country=6292&dateFrom=2016-06-11&dateTo=2016-07-09&adults=2&childs=0&pageSize=20&aviaQuotaMask=5&hotelQuotaMask=5&mainOnly=0"?>"><?=$arResult['PROPERTIES']['photo_text']['VALUE']?$arResult['PROPERTIES']['photo_text']['VALUE']:"бронируйте сейчас"?></a>
                                </p>
                            </div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
        <div class="row hotel_tab_item">
            <? foreach($arResult['PROPERTIES']['nomers_and_suits_id']['VALUE'] as $arNomersAndHotels) { ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="recommended_item hotel_room">
                        <img src="<?=$arNomersAndHotels['src']?>" alt=""/>
                        <div class="recommended_item_content">
                            <p class="recommended_item_name"><?=$arNomersAndHotels['NAME']?></p>
                            <p class="recommended_item_des hotel_room_param"><?=$arNomersAndHotels['PREVIEW_TEXT']?></p>
                            <p class="recommended_item_des">
                                <?=$arNomersAndHotels['DETAIL_TEXT']?>
                            </p>
                            <br>
                            <a href="#" class="btn btn-default btn-sm">Подробнее <span class="icon icon-btn-arrow"></span></a>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
    <br>
    <?
    foreach($arResult['PROPERTIES']['PHOTO']['VALUE'] as $key => $value) {
        $filePreview = CFile::ResizeImageGet($value, array('width'=>900, 'height'=>674), BX_RESIZE_IMAGE_EXACT, false);
        $fileDetail = CFile::GetFileArray($value);
        $arResult['PROPERTIES']['PHOTO']['VALUE'][$key] = array(
            'preview' => $filePreview['src'],
            'detail' => $fileDetail['SRC'],
            'description' => $arResult['PROPERTIES']['PHOTO']['DESCRIPTION'][$key]
        );
    }
    ?>
    <?if($arResult['PROPERTIES']['show_gallery']["VALUE"]=='Y'){?>
        <div class="col-lg-9 col-md-9 col-sm-12">
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
                    <div class="gallery-thumbs-prev"></div>
                    <div class="gallery-thumbs-next"></div>
                </div>
            </div>
        </div>
    <?}?>
    <br>
    <?if($arResult["SECTION"]["ARCHIVE"] == "Y"){?>
        <div style="text-align: center;margin: 15px 0 0 0;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="/newsarchive/" style="color: red;text-decoration:underline;font-size: 16px;">Архив новостей</a>
        </div>
    <?}?>
</div>
<!--<div class="col-lg-9 col-md-9 col-sm-12">
    <div class="row"><?/*=$GLOBALS["TEXT_DOWN"]*/?></div>
</div>-->