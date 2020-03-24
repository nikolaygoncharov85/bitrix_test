<?
use Bitrix\Main\Type\Collection;
use Bitrix\Currency\CurrencyTable;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */

$res = CIBlockSection::GetList(array(), array('ID' => $arResult['ID'], 'IBLOCK_ID' => $arParams['IBLOCK_ID']), false, array('UF_*'));

if ($arRow = $res->Fetch()) {
    $arResult['UF_ABOUT'] = $arRow['UF_ABOUT'];
}

