<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');


if (strlen($_POST['countryId']) > 0) {
    \Bitrix\Main\Loader::includeModule('iblock');

    $sectionId = (int)$_POST['countryId'];

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
} else {
    $arr = array(
        "REFERENCE" => array(),
        "REFERENCE_ID" => array()
    );
}
echo SelectBoxFromArray("arrFilter_pf[CITY]", $arr, $_REQUEST['arrFilter_pf[CITY]'], "---", " class=\"custom-select\" data-placeholder=\"Город\"", false, "");
die();