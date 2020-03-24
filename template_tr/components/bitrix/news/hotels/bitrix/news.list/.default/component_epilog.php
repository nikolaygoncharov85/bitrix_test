<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

if ($_REQUEST['arrFilter_pf']['COUNTRY'] > 0) {
    $countryId = (int)$_REQUEST['arrFilter_pf']['COUNTRY'];
    
    $rsCountry = CIBlockSection::GetList(Array($by=>$order), array('ID' => $countryId, 'IBLOCK_ID' => 27), false,
        array("ID","NAME","IBLOCK_SECTION_ID","NAME","DESCRIPTION","UF_TITLE2"));

    if ($arRow = $rsCountry->Fetch()) {
        $name = (strlen($arRow['UF_TITLE2']) > 0) ? $arRow['UF_TITLE2'] : $arRow['NAME'];
        $title = $APPLICATION->GetTitle();
        $APPLICATION->AddChainItem($arRow['NAME'], '/hotels/?arrFilter_pf[COUNTRY]=' . $arRow['ID'] . '&set_filter=Фильтр&set_filter=Y');
        $title = $title . " " . $name;
    }
    $cityId = (int)$_REQUEST['arrFilter_pf']['CITY'];
    $resortId = (int)$_REQUEST['arrFilter_pf']['RESORT'];
    if ($cityId > 0) {
        $rsCity = CIBlockElement::GetList(array('ID' => 'DESC'), array('ID' => $cityId, 'IBLOCK_ID' => 27), false, false, array('ID', 'NAME', 'PROPERTY_NAME2'));
        if ($arRow = $rsCity->Fetch()) {
            $APPLICATION->AddChainItem($arRow['NAME']);
            if (strlen($arRow['PROPERTY_NAME2_VALUE']) > 0) {
                $arRow['NAME'] = $arRow['PROPERTY_NAME2_VALUE'];
            }
            $title = "Отели " . $arRow['NAME'];
        }
    }
    elseif($resortId > 0){
        $rsResort = CIBlockSection::GetById($resortId);
        if($arRow = $rsResort->Fetch()){
            $name = (strlen($arRow['UF_TITLE2']) > 0) ? $arRow['UF_TITLE2'] : $arRow['NAME'];
            $APPLICATION->AddChainItem($name);
            $title = "Отели " . $name;
        }
    }
    $APPLICATION->SetPageProperty('title', $title);
    //$APPLICATION->SetTitle('title', $title);

}