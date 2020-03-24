<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

$GLOBALS['IBLOCK_SECTION_ID'] = $arResult['IBLOCK_SECTION_ID'];
if ($arResult['PROPERTIES']['show_archive']['VALUE'] == 'Y') {
    $APPLICATION->AddChainItem("Архив акций", "/specialoffersarchive/");
} else {
    $APPLICATION->AddChainItem("Акции и специальные предложения", "/specialoffers/");
}
$APPLICATION->AddChainItem($arResult['NAME'], $arResult['CODE']);
