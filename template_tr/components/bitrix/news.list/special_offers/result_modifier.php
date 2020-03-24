<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

$arHotels = array();

foreach($arResult['ITEMS'] as $key => $value) {

	$filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width'=>280, 'height'=>218), BX_RESIZE_IMAGE_EXACT, false);

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];

    $arHotels[$value['PROPERTIES']['hotel']['VALUE']] = $value['PROPERTIES']['hotel']['VALUE'];

}

if (!empty($arHotels)) {
    $res = CIBlockElement::GetList(
        array('ID' => 'DESC'),
        array('IBLOCK_ID' => 32, 'PROPERTY_hotel' => $arHotels),
        false,
        false,
        array('ID', 'NAME', 'IBLOCK_ID', 'PROPERTY_STAR_CATEGORY', 'PROPERTY_STAR_CATEGORY_TYPE')
    );

    while ($arRow = $res->Fetch()) {
        $arResult['HOTELS'][$arRow['ID']] = $arRow;
    }
}