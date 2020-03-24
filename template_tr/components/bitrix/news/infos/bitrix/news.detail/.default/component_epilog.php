<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$GLOBALS['IBLOCK_SECTION_ID'] = $arResult['IBLOCK_SECTION_ID'];

if ($arResult['PROPERTIES']['show_archive']['VALUE'] == 'Y') {
    $APPLICATION->AddChainItem("Архив новостей", "/newsarchive/");
} else {
    $APPLICATION->AddChainItem("Новости", "/news/");
}
$APPLICATION->AddChainItem($arResult['NAME'], $arResult['CODE']);