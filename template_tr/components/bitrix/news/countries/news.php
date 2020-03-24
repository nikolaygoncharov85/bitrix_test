<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?
$q = trim($_REQUEST['q']);
if (strlen($q) > 0) {
    global $arrFilterByName;
    $arrFilterByName['NAME'] = '%' . $q . '%';
}
?>

<div class="container without-padding">
<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "",
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "FILTER_NAME" => 'arrFilterByName',
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
        "TOP_DEPTH" => 1, //$arParams["SECTION_TOP_DEPTH"],
        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
        "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
        "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
        "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
        "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
        "SECTION_USER_FIELDS" => array('UF_CATEGORY'),
    ),
    $component
);
?>

    <!--div class="container white-bg">
        <div class="row-1 row-manager white-active-block">
            <div class="col">
                <div class="title-text center-text">Ваш индивидуальный менеджер</div>
                <p class="center-text mb-col-dist">Индивидуальный подбор отеля</p>
                <p class="row-manager-phone"><span class="choose-city"><span class="icon icon-arrow-down-green"></span><span class="choose-city-name">Москва</span></span> +7 (495) 662-37-36 </p>
            </div>
            <div class="col">
                <div class="title-text center-text">Обратный звонок</div>
                <p class="center-text mb-col-dist">Мы свяжемся с Вами в удобное для Вас время</p>
                <form action="" class="center-text">
                    <input type="text" class="input-feedback-phone" placeholder="+7 (921) 000 00 00 "/>
                    <input  class="btn btn-red" type="submit" value="Заказать звонок"/>
                </form>
            </div>
        </div>
    </div-->

    <?$APPLICATION->IncludeComponent("bitrix:main.include", "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR."include/index_personal_manager.php"
        )
    );?>

</div>