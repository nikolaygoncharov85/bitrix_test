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
        'small' => $fileSmall['src']
    );

}

if ($arResult['PREVIEW_PICTURE']['ID'] > 0) {
    $filePreview = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width' => 720, 'height' => 355), BX_RESIZE_IMAGE_EXACT, false);
} else {
    $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
}

$arResult['PREVIEW_PICTURE']['SRC'] = $filePreview['src'];
