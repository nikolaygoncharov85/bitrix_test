<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if($_REQUEST['ELEMENT_ID'] && $_REQUEST['ELEMENT_ID']){
    $element=CIBlockElement::GetById($_REQUEST['ELEMENT_ID'])->Fetch();
    LocalRedirect("/specialoffers/".$element[CODE]."/");
}
?>
<?$APPLICATION->SetTitle("Акции и специальные предложения");?>
	<link rel="stylesheet" type="text/css" href="/specialoffers/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/specialoffers/slick/slick-theme.css"/>
	<script type="text/javascript" src="/specialoffers/slick/slick.min.js"></script>
<?
$type = $_REQUEST["arrFilter_pf"]["TYPE"];
if(!empty($type)){
	global $arrFilter_type;
	$arrFilter_type = array($type);
}
$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"specialoffers_update",
	array(
		"COMPONENT_TEMPLATE" => "specialoffers_update",
		"IBLOCK_TYPE" => "traveluxe_content",
		"IBLOCK_ID" => "22",
		"NEWS_COUNT" => 1000,
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "$arrFilter_type",
		"FILTER_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "CITY",
			2 => "STAR_CATEGORY",
			3 => "interest",
			4 => "position",
			5 => "service_list",
			6 => "COUNTRY",
			7 => "RESORT",
			8 => "",
		),
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_FOLDER" => "/specialoffers/",
		"SEF_MODE" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "DATE_ACTIVE_TO",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "link",
			1 => "action",
			2 => "action_date",
			3 => "PRICE",
			4 => "STAR_CATEGORY",
			5 => "STAR_CATEGORY_TYPE",
			6 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DETAIL_PICTURE",
			2 => "DATE_ACTIVE_TO",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "link",
			1 => "action",
			2 => "action_date",
			3 => "PRICE",
			4 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"FILE_404" => "",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>