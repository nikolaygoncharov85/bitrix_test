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

foreach($arResult['PROPERTIES']['PHOTO']['VALUE'] as $key => $value) {

	$filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
	$fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);

    $fileDetail = CFile::GetFileArray($value);

    $arResult['PROPERTIES']['PHOTO']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['PHOTO']['DESCRIPTION'][$key]
    );
}

if ($arResult['PREVIEW_PICTURE']['ID'] > 0) {
    $filePreview = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width' => 250, 'height' => 200), BX_RESIZE_IMAGE_EXACT, false);
} else {
    $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
}

$arResult['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];

$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 22, 'PROPERTY_hotel' => $arResult['ID'], '!PROPERTY_show_archive' => "Y"), false, false);

while($arRow = $res->GetNext()) {

    if ($arRow['PREVIEW_PICTURE'] > 0) {
        $filePreview = CFile::ResizeImageGet($arRow['PREVIEW_PICTURE'], array('width' => 200, 'height' => 164), BX_RESIZE_IMAGE_EXACT, false);
    } else {
        $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
    }
    $arResult['PROPERTIES']['HOTEL_OFFERS'][] = array(
        'SRC' => $filePreview['src'],
        'NAME' => $arRow['NAME'],
        'TEXT' => $arRow['PREVIEW_TEXT'],
        'DETAIL_PAGE_URL' => $arRow['DETAIL_PAGE_URL'],
        'ROW' => $arRow["hotel"],
    );
}

//$arResult['PROPERTIES']['HOTEL_OFFERS']