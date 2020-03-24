<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"wedding_request",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "wedding_request",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => Array(
			"RESULT_ID" => "RESULT_ID",
			"WEB_FORM_ID" => "WEB_FORM_ID"
		),
		"WEB_FORM_ID" => "18",
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_STYLE" => "Y"
	)
);
