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

$arResult["ITEMS"]['PROPERTY_320']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_320']['INPUT_NAME'],
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

$arResult["ITEMS"]['PROPERTY_321']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_321']['INPUT_NAME'],
    $arr,
    $_REQUEST['arrFilter_pf']['RESORT'],
    "",
    " onchange=\"getCityList(this.value)\" class=\"custom-select\" data-placeholder=\"Город\"",
    false,
    "form2"
);
//----------------------------------------------------------------------//



