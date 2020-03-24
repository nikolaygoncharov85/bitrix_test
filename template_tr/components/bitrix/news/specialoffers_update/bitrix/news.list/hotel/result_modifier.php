<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
$arHotels = array();
foreach($arResult['ITEMS'] as $key => $value) {
    if ($value['PREVIEW_PICTURE']['ID'] > 0) {
        $filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width' => 200, 'height' => 164), BX_RESIZE_IMAGE_EXACT, false);
    } else {
        $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
    }
    $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];
    $arHotels[$value['PROPERTIES']['hotel']['VALUE']] = $value['PROPERTIES']['hotel']['VALUE'];
}
if (!empty($arHotels)) {
    $res = CIBlockElement::GetList(
        array('ID' => 'DESC'),
        array('IBLOCK_ID' => 32, 'PROPERTY_hotel' => $arHotels),
        false,
        false,
        array('ID', 'NAME', 'IBLOCK_ID', 'PROPERTY_STAR_CATEGORY', 'PROPERTY_STAR_CATEGORY_TYPE', "DETAIL_PAGE_URL")
    );
    while ($arRow = $res->Fetch()) {
        $arResult['HOTELS'][$arRow['ID']] = $arRow;
    }
}
$res2 = CIBlockElement::GetList(array(),array("IBLOCK_ID"=>$arParams['IBLOCK_ID'],"PROPERTY_show_archive"=>"Y"));
if($res2->SelectedRowsCount()>0){
    $arResult[SECTION][ARCHIVE] = "Y";
}
else {
    $arResult[SECTION][ARCHIVE] = "N";
}
