<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
\Bitrix\Main\Loader::includeModule('iblock');

//страны
$res = CIBlockSection::GetList(array('NAME' => 'ASC'), array('IBLOCK_ID' => 27, 'ACTIVE' => 'Y', 'DEPTH_LEVEL' => 1), false);

$arr['REFERENCE'][] = '---';
$arr['REFERENCE_ID'][] = null;

while($arRow = $res->Fetch()) {
    $arr['REFERENCE'][] = $arRow['NAME'];
    $arr['REFERENCE_ID'][] = $arRow['ID'];
}

$arResult["ITEMS"]['PROPERTY_346']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_346']['INPUT_NAME'],
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

$arResult["ITEMS"]['PROPERTY_347']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_347']['INPUT_NAME'],
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

$arResult["ITEMS"]['PROPERTY_348']['INPUT'] = SelectBoxFromArray(
    $arResult["ITEMS"]['PROPERTY_348']['INPUT_NAME'],
    $arr,
    $_REQUEST['arrFilter_pf']['CITY'],
    "",
    " onchange=\"citychange()\" class=\"custom-select city\" data-placeholder=\"Город\"",
    false,
    "form2"
);
//----------------------------------------------------------------------//

$arResult["ITEMS"]['PROPERTY_215']['INPUT'] = array();

if ($USER->IsAdmin()) {
    /*echo '<pre>';
    var_dump($arResult["ITEMS"]['PROPERTY_215']["LIST"]);
    echo '</pre>';*/
}

foreach($arResult["ITEMS"]['PROPERTY_215']["LIST"] as $id => $value) {
    if ($id == '') {
        continue;
    }
    $checked = '';
    if (in_array($id, $_REQUEST['arrFilter_pf']['STAR_CATEGORY'])) {
        $checked = ' checked';
    }
    $arResult["ITEMS"]['PROPERTY_215']['INPUT'][$id] = array(
        'name' => $value,
        'html' => '<input type="checkbox" class="checkbox" id="checkbox' . $id . '" name="arrFilter_pf[STAR_CATEGORY][]" value="' . $id . '" ' . $checked . '/>'
    );
}

$arResult["ITEMS"]['PROPERTY_227']['INPUT'] = array();
foreach($arResult["ITEMS"]['PROPERTY_227']["LIST"] as $id => $value) {
    if ($id == '') {
        continue;
    }
    $checked = '';
    if (in_array($id, $_REQUEST['arrFilter_pf']['STAR_CATEGORY_TYPE'])) {
        $checked = ' checked';
    }
    $arResult["ITEMS"]['PROPERTY_227']['INPUT'][$id] = array(
        'name' => $value,
        'html' => '<input type="checkbox" class="checkbox" id="checkbox' . $id . '" name="arrFilter_pf[STAR_CATEGORY_TYPE][]" value="' . $id . '" ' . $checked . '/>'
    );
}


$arResult["ITEMS"]['PROPERTY_216']['INPUT'] = array();
foreach($arResult["ITEMS"]['PROPERTY_216']["LIST"] as $id => $value) {

    if ($id == '') {
        continue;
    }

    $checked = '';
    if (in_array($id, $_REQUEST['arrFilter_pf']['position'])) {
        $checked = ' checked';
    }

    $arResult["ITEMS"]['PROPERTY_216']['INPUT'][$id] = array(
        'name' => $value,
        'html' => '<input type="checkbox" class="checkbox" id="checkbox' . $id . '" name="arrFilter_pf[position][]" value="' . $id . '" ' . $checked . '/>'
    );
}


$arResult["ITEMS"]['PROPERTY_217']['INPUT'] = array();

foreach($arResult["ITEMS"]['PROPERTY_217']["LIST"] as $id => $value) {

    if ($id == '') {
        continue;
    }

    $checked = '';
    if (in_array($id, $_REQUEST['arrFilter_pf']['interest'])) {
        $checked = ' checked';
    }

    $arResult["ITEMS"]['PROPERTY_217']['INPUT'][$id] = array(
        'name' => $value,
        'html' => '<input type="checkbox" class="checkbox" id="checkbox' . $id . '" name="arrFilter_pf[interest][]" value="' . $id . '" ' . $checked . '/>'
    );
}

$arResult["ITEMS"]['PROPERTY_220']['INPUT'] = array();

foreach($arResult["ITEMS"]['PROPERTY_220']["LIST"] as $id => $value) {

    if ($id == '') {
        continue;
    }

    $checked = '';
    if (in_array($id, $_REQUEST['arrFilter_pf']['service_list'])) {
        $checked = ' checked';
    }

    $arResult["ITEMS"]['PROPERTY_220']['INPUT'][$id] = array(
        'name' => $value,
        'html' => '<input type="checkbox" class="checkbox" id="checkbox' . $id . '" name="arrFilter_pf[service_list][]" value="' . $id . '" ' . $checked . '/>'
    );
}