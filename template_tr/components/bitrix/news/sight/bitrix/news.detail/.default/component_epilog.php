<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
$APPLICATION->AddChainItem(
    strip_tags($arResult['PROPERTY_COUNTRY']),
    '/sight/?arrFilter_pf[COUNTRY]=' . $arResult['PROPERTIES']['COUNTRY']['VALUE'] . '&set_filter=Y'
);
if (is_array($arResult['PROPERTIES']['CITY']['VALUE'])) {
    $arResult['PROPERTIES']['CITY']['VALUE'] = current($arResult['PROPERTIES']['CITY']['VALUE']);
}
if ($arResult['PROPERTIES']['CITY']['VALUE'] > 0 && $arResult['PROPERTY_CITY']) {
    $APPLICATION->AddChainItem(
        strip_tags($arResult['PROPERTY_CITY']),
        '/sight/?arrFilter_pf[COUNTRY]=' . $arResult['PROPERTIES']['COUNTRY']['VALUE'] . '&arrFilter_pf[CITY]=' . $arResult['PROPERTIES']['CITY']['VALUE'] . '&set_filter=Фильтр&set_filter=Y'
    );
}
/*
if (!empty($arResult['PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE'])) {
    $arResult['NAME'] .= " " . implode(', ', $arResult['PROPERTIES']['STAR_CATEGORY_TYPE']['VALUE']);
}
if (!empty($arResult['PROPERTIES']['STAR_CATEGORY']['VALUE'])) {
    $arResult['NAME'] .= " " . implode('', $arResult['PROPERTIES']['STAR_CATEGORY']['VALUE']) . '<span class="icon icon-star"></span>';
}*/
if (strlen($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) > 0) {
    $arResult['NAME'] = $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'];
}
if (strlen($arResult['IPROPERTY_VALUES']['ELEMENT_META_TITLE']) > 0) {
    $APPLICATION->AddChainItem($arResult['IPROPERTY_VALUES']['ELEMENT_META_TITLE']);
} else {
    $APPLICATION->AddChainItem($arResult['NAME']);
}
$APPLICATION->SetPageProperty('title', $arResult['NAME']);
