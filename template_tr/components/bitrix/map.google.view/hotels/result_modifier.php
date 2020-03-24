<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

CModule::IncludeModule('iblock');

$arFilter = array('IBLOCK_ID' => 32, '!PROPERTY_geo' => false);
if (isset($_REQUEST['arrFilter_pf'])) {
    $arFilter = array('IBLOCK_ID' => 32, 'ID' => $arParams['ELEMENTS'], '!PROPERTY_geo' => false);
}

$res = CIBlockElement::GetList(
    array('ID' => 'DESC'),
    $arFilter, false, false,
    array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_geo', 'PREVIEW_PICTURE')
);

$arResult['POSITION']['PLACEMARKS'] = array();


while ($arRow = $res->GetNext()) {

    $arGeo = explode(',', $arRow['PROPERTY_GEO_VALUE']);

    $text = 'Отель <a href="' . $arRow['DETAIL_PAGE_URL'] . '">' . $arRow['NAME'] . '</a><br>';

    if ($arRow['PREVIEW_PICTURE'] > 0) {
        $file = CFile::ResizeImageGet($arRow['PREVIEW_PICTURE'], array('width' => 146, 'height' => 88), BX_RESIZE_IMAGE_EXACT , false);
        $text .= '<img src="' . $file['src'] . '">';
    }

    $arResult['POSITION']['PLACEMARKS'][] = array('TEXT' => $text, 'LON' => $arGeo[1], 'LAT' => $arGeo[0]);

    $arResult['POSITION']['google_lon'] = $arGeo[1];
    $arResult['POSITION']['google_lat'] = $arGeo[0];
}

//$arResult['POSITION']['google_lon']
//$arResult['POSITION']['google_lat']