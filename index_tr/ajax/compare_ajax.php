<?
// подключение служебной части пролога
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.compare.list", "", Array(
    "IBLOCK_TYPE" => "traveluxe_content",
    "IBLOCK_ID" => "32",
    "AJAX_MODE" => "Y",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "AJAX_OPTION_HISTORY" => "N",
    "DETAIL_URL" => "",
    "COMPARE_URL" => "/hotels/compare/",
    "NAME" => "CATALOG_COMPARE_LIST",
    "AJAX_OPTION_ADDITIONAL" => "",
),
    false
);?>
<?
// подключение визуальной части пролога
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>