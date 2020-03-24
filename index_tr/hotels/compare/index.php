<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->SetTitle("Отели сравнение");?>

<div class="container without-padding">
    <div class="page">

        <div class="left-sidebar">
            <div class="left-sidebar-icon-menu for-mobile">
                <span class="icon icon-menu"></span>
            </div>
            <p class="left-sidebar-menu-title">Гид по стране</p>
            <ul class="left-sidebar-menu">
                <li>
                    <a href="#">Акции и спецпредложения</a>
                </li>
                <li>
                    <a href="#">Отели</a>
                </li>
                <li>
                    <a href="#" class="current">Туры</a>
                </li>
                <li>
                    <a href="#">Экскурсии</a>
                </li>
                <li>
                    <a href="#">Достопримечательности</a>
                </li>
                <li>
                    <a href="#">Города и курорты</a>
                </li>
                <li>
                    <a href="#">О стране</a>
                </li>
                <li>
                    <a href="#">VIP услуги</a>
                    <ul class="sub-left-sidebar-menu">
                        <li>
                            <a href="#">
                                Аренда авто
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Вертолетное такси
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Персональная ассистенция
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Аренда яхт
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Аренда авто
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <?$APPLICATION->IncludeComponent(
            "bitrix:catalog.compare.result",
            "hotel",
            array(
                "COMPONENT_TEMPLATE" => "hotel",
                "NAME" => "CATALOG_COMPARE_LIST",
                "IBLOCK_TYPE" => "traveluxe_content",
                "IBLOCK_ID" => "32",
                "FIELD_CODE" => array(
                ),
                "PROPERTY_CODE" => array(
                    0 => "PRICE",
                    1 => "STAR_CATEGORY",
                    2 => "position",
                    3 => "service_list",
                    4 => "interest",
                ),
                "ELEMENT_SORT_FIELD" => "sort",
                "ELEMENT_SORT_ORDER" => "asc",
                "TEMPLATE_THEME" => "green",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "DETAIL_URL" => "",
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "DISPLAY_ELEMENT_SELECT_BOX" => "N",
                "ELEMENT_SORT_FIELD_BOX" => "name",
                "ELEMENT_SORT_ORDER_BOX" => "asc",
                "ELEMENT_SORT_FIELD_BOX2" => "id",
                "ELEMENT_SORT_ORDER_BOX2" => "desc",
                "ACTION_VARIABLE" => "action",
                "PRODUCT_ID_VARIABLE" => "id",
                "PRICE_CODE" => array(
                ),
                "USE_PRICE_COUNT" => "N",
                "SHOW_PRICE_COUNT" => "1",
                "PRICE_VAT_INCLUDE" => "N",
                "BASKET_URL" => "/personal/basket.php"
            ),
            false
        );?>

    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>