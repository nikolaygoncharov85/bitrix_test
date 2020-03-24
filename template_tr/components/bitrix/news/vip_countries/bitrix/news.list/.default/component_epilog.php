<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

if ($_REQUEST['arrFilter_pf']['COUNTRY'] > 0) {
    $countryId = (int)$_REQUEST['arrFilter_pf']['COUNTRY'];

    $rsCountry = CIBlockSection::GetList(Array($by=>$order), array('ID' => $countryId, 'IBLOCK_ID' => 27), false,
        array("ID","NAME","IBLOCK_SECTION_ID","NAME","DESCRIPTION","UF_TITLE3"));

    if ($arRow = $rsCountry->Fetch()) {
        $name = (strlen($arRow['UF_TITLE3']) > 0) ? $arRow['NAME'] : $arRow['NAME'];
        $title = $APPLICATION->GetTitle();
        $APPLICATION->AddChainItem($arRow['NAME'], '/vip_countries/?arrFilter_pf[COUNTRY]=' . $arRow['ID'] . '&set_filter=Фильтр&set_filter=Y');

        $title = $title . " " . $name;
    }

    if ($_REQUEST['arrFilter_pf']['CITY'] > 0) {
        $cityId = (int)$_REQUEST['arrFilter_pf']['CITY'];
        $rsCity = CIBlockElement::GetList(array('ID' => 'DESC'), array('ID' => $cityId, 'IBLOCK_ID' => 27), false, false, array('ID', 'NAME', 'PROPERTY_NAME2'));
        if ($arRow = $rsCity->Fetch()) {

            $APPLICATION->AddChainItem($arRow['NAME']);
            /*
            if (strlen($arRow['PROPERTY_NAME2_VALUE']) > 0) {
                $arRow['NAME'] = $arRow['PROPERTY_NAME2_VALUE'];
            }
            */
            $title = "Место предоставления услуги - " . $arRow['NAME'];
        }

    }

    $APPLICATION->SetPageProperty('title', $title);

}