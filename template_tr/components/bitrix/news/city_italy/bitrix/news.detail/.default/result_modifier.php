<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
global $APPLICATION;
$cp = $this->__component;

if (is_object($cp)) {
    $cp->arResult['PROPERTY_COUNTRY'] = $arResult['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE'];
    $cp->arResult['PROPERTY_CITY'] = $arResult['DISPLAY_PROPERTIES']['CITY']['DISPLAY_VALUE'];
    $cp->SetResultCacheKeys(array('PROPERTY_COUNTRY','PROPERTY_CITY'));

    $arResult['PROPERTY_COUNTRY'] = $cp->arResult['PROPERTY_COUNTRY'];
    $arResult['PROPERTY_CITY'] = $cp->arResult['PROPERTY_CITY'];
}

foreach($arResult['PROPERTIES']['gallery']['VALUE'] as $key => $value) {

	$filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
	$fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);

    $fileDetail = CFile::GetFileArray($value);

    $arResult['PROPERTIES']['gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['gallery']['DESCRIPTION'][$key]
    );

}

if ($arResult['DETAIL_PICTURE']['ID'] > 0) {
    $fileId = $arResult['DETAIL_PICTURE']['ID'];
} elseif(empty($arResult['DETAIL_PICTURE']['ID']) && $arResult['PREVIEW_PICTURE']['ID'] > 0) {
    $fileId = $arResult['PREVIEW_PICTURE']['ID'];
}

if ($fileId > 0) {
    $filePreview = CFile::ResizeImageGet($fileId, array('width' => 725, 'height' => 355), BX_RESIZE_IMAGE_EXACT, false);
} else {
    $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
}

$arResult['PREVIEW_PICTURE']['SRC'] = $filePreview['src'];



if (!empty($arResult['PROPERTIES']['hotel']['VALUE'])){
    $res = CIBlockElement::GetList(
        array(),
        array(
            'ID' => $arResult['PROPERTIES']['hotel']['VALUE'],
            'IBLOCK_ID' => $arResult['PROPERTIES']['hotel']['LINK_IBLOCK_ID']
        ),
        false,
        false,
        array('ID', 'NAME', 'PROPERTY_booking', 'PREVIEW_PICTURE', 'PROPERTY_STAR_CATEGORY', 'PROPERTY_STAR_CATEGORY_TYPE')
    );
    while($arRow = $res->GetNext()) {

        if ($arRow['PREVIEW_PICTURE'] > 0) {
            $filePreview = CFile::ResizeImageGet($arRow['PREVIEW_PICTURE'], array('width' => 211, 'height' => 104), BX_RESIZE_IMAGE_EXACT, false);
        } else {
            $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
        }

        $arResult['PROPERTIES']['hotel']['LIST'][] = array(
            'NAME' => $arRow['NAME'],
            'BOOKING' => $arRow['PROPERTY_BOOKING_VALUE'],
            'PICTURE' => $filePreview['src'],
            'STAR' => implode('', $arRow['PROPERTY_STAR_CATEGORY_VALUE']),
            'STAR_TYPE' => implode('', $arRow['PROPERTY_STAR_CATEGORY_TYPE_VALUE']),
        );
    }
}