<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {

    if ($value['PREVIEW_PICTURE']['ID'] > 0) {
        $filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width' => 320, 'height' => 350), BX_RESIZE_IMAGE_EXACT, false);
    } else {
        $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
    }

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];
    /*foreach($arItem["DISPLAY_PROPERTIES"]["hotel"]["LINK_ELEMENT_VALUE"] as $arHotel => $keyHotel) {
        $ID = $keyHotel["ID"];
        $arSelect = CIBlockElement::GetProperty(32, $ID, Array(), Array("CODE"=>"STAR_CATEGORY"));
        $hotel_star = $arSelect->Fetch();
        $star = $hotel_star["VALUE_ENUM"];
        $keyHotel["STAR"] = $star;
    }*/
}
foreach($arResult["ITEMS"] as $arItem){
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
}