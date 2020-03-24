<?

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
\Bitrix\Main\Loader::includeModule('iblock');

if ($_REQUEST['resort'] == 'Y') {
    if (strlen($_POST['countryId']) > 0) {
        $sectionId = (int) $_POST['countryId'];
        if ($sectionId > 0) {
            $res = CIBlockSection::GetList(
                array('ID' => 'DESC'), array('IBLOCK_ID' => 27, 'SECTION_ID' => $sectionId, 'ACTIVE' => 'Y'), false, array('ID', 'NAME'), array('nTopCount' => 100)
            );
            while ($arItem = $res->Fetch()) {
                $arr['REFERENCE'][] = $arItem['NAME'];
                $arr['REFERENCE_ID'][] = $arItem['ID'];
            }
            if (count($arr['REFERENCE']) == 0) {
                $element = new CIBlockElement();
                $res = $element->GetList(
                    array('ID' => 'DESC'), array('IBLOCK_ID' => 27, 'SECTION_ID' => $sectionId, 'ACTIVE' => 'Y', '!PROPERTY_HIDE_IN_HOTELS' => 'Y'), false, array('nTopCount' => 100), array('ID', 'NAME')
                );
                while ($arItem = $res->Fetch()) {
                    $arCity['REFERENCE'][] = $arItem['NAME'];
                    $arCity['REFERENCE_ID'][] = $arItem['ID'];
                }
            }
        }
    } else {
        $arr = array(
            "REFERENCE" => array(),
            "REFERENCE_ID" => array()
        );
    }
    //echo SelectBoxFromArray("arrFilter_pf[RESORT]", $arr, $_REQUEST['arrFilter_pf[RESORT]'], "---", " onchange=\"getCityList(this.value)\" class=\"custom-select\" data-placeholder=\"Курорт\"", false, "");
    $result = array(
        'resort' => SelectBoxFromArray("arrFilter_pf[RESORT]", $arr, $_REQUEST['arrFilter_pf[RESORT]'], "---", " onchange=\"getCityList(this.value)\" class=\"custom-select\" data-placeholder=\"Курорт\"", false, ""),
        'city' => SelectBoxFromArray("arrFilter_pf[CITY]", $arCity, $_REQUEST['arrFilter_pf[CITY]'], "---", " class=\"custom-select\" data-placeholder=\"Экскурсии из\"", false, "")
    );
    echo json_encode($result);
}

if ($_REQUEST['city'] == 'Y') {
    if (strlen($_POST['resortId']) > 0) {
        $sectionId = (int) $_POST['resortId'];
    }
    elseif(strlen($_POST['countryId']) > 0){
        $sectionId = (int) $_POST['countryId'];
    }
    if ($sectionId > 0) {
        $element = new CIBlockElement();
        $res = $element->GetList(
                array('ID' => 'DESC'), array('IBLOCK_ID' => 27, 'SECTION_ID' => $sectionId, 'ACTIVE' => 'Y', '!PROPERTY_HIDE_IN_HOTELS' => 'Y'), false, array('nTopCount' => 100), array('ID', 'NAME')
        );
        /* $arr['REFERENCE'][] = '---';
          $arr['REFERENCE_ID'][] = null; */
        while ($arItem = $res->Fetch()) {
            $arr['REFERENCE'][] = $arItem['NAME'];
            $arr['REFERENCE_ID'][] = $arItem['ID'];
        }
    }
    else {
        $arr = array(
            "REFERENCE" => array(),
            "REFERENCE_ID" => array()
        );
    }
    echo SelectBoxFromArray("arrFilter_pf[CITY]", $arr, $_REQUEST['arrFilter_pf[CITY]'], "---", " class=\"custom-select\" data-placeholder=\"Экскурсии из\"", false, "");
}