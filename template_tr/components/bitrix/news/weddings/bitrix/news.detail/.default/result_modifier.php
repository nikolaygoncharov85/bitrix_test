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

if ($arResult['DETAIL_PICTURE']['ID'] > 0) {
    $filePreview = CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array('width' => 720, 'height' => 355), BX_RESIZE_IMAGE_EXACT, false);
} else {
    $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
}

$arResult['DETAIL_PICTURE']['SRC'] = $filePreview['src'];

if (count($arResult['PROPERTIES']['INCLUDE_SERVICE']['VALUE']) > 0) {

    $res = CIBlockElement::GetList(array(), array('ID' => $arResult['PROPERTIES']['INCLUDE_SERVICE']['VALUE']), false, false, array());

    while($arRow = $res->Fetch()) {

        $arFile = CFile::GetFileArray($arRow["DETAIL_PICTURE"]);

        $arResult['PROPERTIES']['INCLUDE_SERVICE']['DATA'][] = array(
            'NAME' => $arRow['NAME'],
            'PICTURE' => $arFile['SRC'],
            'DESCRIPTION' => $arRow['PREVIEW_TEXT'],
        );
    }
}

foreach($arResult['PROPERTIES']['accordion1_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion1_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion1_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion2_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion2_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion2_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion3_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion3_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion3_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion4_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion4_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion4_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion5_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion5_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion5_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion6_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion6_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion6_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion7_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion7_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion7_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion8_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion8_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion8_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion9_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion9_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion9_gallery']['DESCRIPTION'][$key]
    );
}
foreach($arResult['PROPERTIES']['accordion10_gallery']['VALUE'] as $key => $value) {
    $filePreview = CFile::ResizeImageGet($value, array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value, array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);
    $fileDetail = CFile::GetFileArray($value);
    $arResult['PROPERTIES']['accordion10_gallery']['VALUE'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        'description' => $arResult['PROPERTIES']['accordion10_gallery']['DESCRIPTION'][$key]
    );
}