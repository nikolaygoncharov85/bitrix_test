<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
/*if (strlen($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) > 0) {
    $arResult['NAME'] = $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'];
}*/
//$APPLICATION->SetPageProperty('title', $arResult['NAME']);

$APPLICATION->AddChainItem($arResult['NAME'], "/countries/" . $arResult['CODE'] . "/");
