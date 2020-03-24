<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

\Bitrix\Main\Loader::includeModule('iblock');

$res = CIBlockSection::GetList(array('NAME' => 'ASC'), array('IBLOCK_ID' => 27, 'ACTIVE' => 'Y', 'DEPTH_LEVEL' => 1), false);

$arr['REFERENCE'][] = '---';
$arr['REFERENCE_ID'][] = null;

while($arRow = $res->Fetch()) {
    $arr['REFERENCE'][] = $arRow['NAME'];
    $arr['REFERENCE_ID'][] = $arRow['ID'];
}

/*$res = CIBlockSection::GetList(array('ID' => 'DESC', 'ACTIVE' => 'Y'), array('IBLOCK_ID' => 27), false);

while($arRow = $res->Fetch()) {
    $arr['REFERENCE'][] = $arRow['NAME'];
    $arr['REFERENCE_ID'][] = $arRow['ID'];
}*/

$arResult["ITEMS"]['PROPERTY_326']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_326']['INPUT_NAME'],
    $arr,
    $_REQUEST['arrFilter_pf']['COUNTRY'],
    "",
    //" onchange=\"getCityList(this.value)\" class=\"custom-select\" data-placeholder=\"СТРАНА\"",
    " onchange=\"getResortsList(this.value)\" class=\"custom-select\" data-placeholder=\"СТРАНА\"",
    false,
    "form2"
);


// country
//----------------------------------------------------------------------//

$countryId = (int)$_REQUEST['arrFilter_pf']['COUNTRY'];
$arr = array(
    "REFERENCE" => array(),
    "REFERENCE_ID" => array()
);

$arr['REFERENCE'][] = '---';
$arr['REFERENCE_ID'][] = null;

if ($countryId > 0) {

    $res = CIBlockSection::GetList(
        array('ID' => 'DESC'),
        array('IBLOCK_ID' => 27, 'SECTION_ID' => $countryId, 'ACTIVE' => 'Y'),
        false,
        array('ID', 'NAME'),
        array('nTopCount' => 100)
    );

    while($arItem = $res->Fetch()) {
        $arr['REFERENCE'][] = $arItem['NAME'];
        $arr['REFERENCE_ID'][] = $arItem['ID'];
    }
}

$arResult["ITEMS"]['PROPERTY_327']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_327']['INPUT_NAME'],
    $arr,
    $_REQUEST['arrFilter_pf']['RESORT'],
    "",
    " onchange=\"getCityList(this.value)\" class=\"custom-select\" data-placeholder=\"Курорт\"",
    false,
    "form2"
);
//----------------------------------------------------------------------//


// resort
//----------------------------------------------------------------------//
$resortId = (int)$_REQUEST['arrFilter_pf']['RESORT'];

if ($resortId == 0 && $countryId > 0) {
    $resortId = $countryId;
}

$arr = array(
    "REFERENCE" => array(),
    "REFERENCE_ID" => array()
);

$arr['REFERENCE'][] = '---';
$arr['REFERENCE_ID'][] = null;

if ($resortId > 0) {

    $res = CIBlockElement::GetList(
        array('ID' => 'DESC'),
        array('IBLOCK_ID' => 27, 'SECTION_ID' => $resortId, 'ACTIVE' => 'Y'),
        false,
        array('nTopCount' => 100), array('ID', 'NAME')
    );

    while($arItem = $res->Fetch()) {
        $arr['REFERENCE'][] = $arItem['NAME'];
        $arr['REFERENCE_ID'][] = $arItem['ID'];
    }
}

$arResult["ITEMS"]['PROPERTY_329']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_329']['INPUT_NAME'],
    $arr,
    $_REQUEST['arrFilter_pf']['CITY'],
    "",
    " class=\"custom-select\" data-placeholder=\"Город\"",
    false,
    "form2"
);
//----------------------------------------------------------------------//

/*
$arResult["ITEMS"]['PROPERTY_191']['INPUT'] = array();
$starRes = CIBlockElement::GetList(array('NAME' => 'ASC'), array('IBLOCK_ID' => 33), false, false, array('ID', 'NAME'));
while($arRow = $starRes->Fetch()) {

    $checked = '';
    if (in_array($arRow['ID'], $_REQUEST['arrFilter_pf']['STAR'])) {
        $checked = ' checked';
    }

    $arResult["ITEMS"]['PROPERTY_191']['INPUT'][$arRow['ID']] = array(
        'name' => $arRow['NAME'],
        'html' => '<input type="checkbox" class="checkbox" id="checkbox' . $arRow['ID'] . '" name="arrFilter_pf[STAR][]" value="' . $arRow['ID'] . '" ' . $checked . '/>'
    );
}
*/