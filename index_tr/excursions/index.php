<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if($_REQUEST['ELEMENT_ID'] && $_REQUEST['ELEMENT_ID']){
    $element=CIBlockElement::GetById($_REQUEST['ELEMENT_ID'])->Fetch();
    LocalRedirect("/excursions/".$element[CODE]."/");
}
?>
<?$APPLICATION->SetTitle("Экскурсии");?>



<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"excursions", 
	array(
		"COMPONENT_TEMPLATE" => "excursions",
		"IBLOCK_TYPE" => "traveluxe_content",
		"IBLOCK_ID" => "29",
		"NEWS_COUNT" => "20",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"CHECK_DATES" => "Y",
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
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "CITY",
			1 => "PRICE",
			2 => "STAR",
			3 => "COUNTRY",
			4 => "HOTEL",
			5 => "FILE",
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
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "CITY",
			1 => "booking",
			2 => "geo_descr",
			3 => "geo",
			4 => "spa_wellness",
			5 => "for_kids",
			6 => "service_in_hotel",
			7 => "COUNTRY",
			8 => "EVENTS",
			9 => "FILE",
			10 => "",
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
		"FILTER_NAME" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "CITY",
			1 => "TYPE_GROUP",
			2 => "TYPE_INDIVIDUAL",
			3 => "STAR",
			4 => "COUNTRY",
			5 => "RESORT",
			6 => "",
		),
		"SEF_FOLDER" => "/excursions/",
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