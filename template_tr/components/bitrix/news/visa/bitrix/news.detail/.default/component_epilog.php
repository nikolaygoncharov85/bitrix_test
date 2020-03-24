<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

/*
$APPLICATION->AddChainItem(
    strip_tags($arResult['PROPERTY_COUNTRY']),
    '/visa/?arrFilter_pf[COUNTRY]=' . $arResult['PROPERTIES']['COUNTRY']['VALUE'] . '&set_filter=Фильтр&set_filter=Y'
);
*/

if ($arResult['PROPERTIES']['CITY']['VALUE'] > 0) {
    $APPLICATION->AddChainItem(
        strip_tags($arResult['PROPERTY_CITY']),
        '/visa/?arrFilter_pf[COUNTRY]=' . $arResult['PROPERTIES']['COUNTRY']['VALUE'] . '&arrFilter_pf[CITY]=' . $arResult['PROPERTIES']['CITY']['VALUE'] . '&set_filter=Фильтр&set_filter=Y'
    );
}

if (strlen($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) > 0) {
    $arResult['NAME'] = $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'];
}

if (strlen($arResult['IPROPERTY_VALUES']['ELEMENT_META_TITLE']) > 0) {
    $APPLICATION->AddChainItem($arResult['IPROPERTY_VALUES']['ELEMENT_META_TITLE']);
} else {
    $APPLICATION->AddChainItem($arResult['NAME']);
}

$APPLICATION->SetPageProperty('title', $arResult['NAME']);