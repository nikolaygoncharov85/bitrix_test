<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

$res = CIBlockSection::GetList(array('NAME' => 'ASC', 'ACTIVE' => 'Y'), array('IBLOCK_ID' => 27), false);

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

$arResult["ITEMS"]['PROPERTY_169']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_169']['INPUT_NAME'],
    $arr,
    $_REQUEST['arrFilter_pf']['COUNTRY'],
    "",
    " onchange=\"getCityList(this.value)\" class=\"custom-select\" data-placeholder=\"СТРАНА\"",
    false,
    "form2"
);



\Bitrix\Main\Loader::includeModule('iblock');

$sectionId = (int)$_REQUEST['arrFilter_pf']['COUNTRY'];

$arr = array(
    "REFERENCE" => array(),
    "REFERENCE_ID" => array()
);

$arr['REFERENCE'][] = '---';
$arr['REFERENCE_ID'][] = null;

if ($sectionId > 0) {

    $element = new CIBlockElement();
    $res = $element->GetList(
        array('ID' => 'DESC'),
        array('IBLOCK_ID' => 27, 'SECTION_ID' => $sectionId, 'ACTIVE' => 'Y'),
        false,
        array('nTopCount' => 100), array('ID', 'NAME')
    );

    /*$arr['REFERENCE'][] = '---';
    $arr['REFERENCE_ID'][] = null;*/
    while($arItem = $res->Fetch()) {
        $arr['REFERENCE'][] = $arItem['NAME'];
        $arr['REFERENCE_ID'][] = $arItem['ID'];
    }
}

$arResult["ITEMS"]['PROPERTY_170']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_170']['INPUT_NAME'],
    $arr,
    $_REQUEST['arrFilter_pf']['CITY'],
    "",
    " class=\"custom-select\" data-placeholder=\"Город\"",
    false,
    "form2"
);
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