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
<!--div class="page-content"-->
    <div class="row-1 row-inner">
        <?
        foreach($arResult['ITEMS'] as $arItem) {
            $arElements[] = $arItem['ID'];
        }
        ?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:map.google.view",
            "hotels",
            array(
                "COMPONENT_TEMPLATE" => ".default",
                "CONTROLS" => array(
                    0 => "SMALL_ZOOM_CONTROL",
                    1 => "SCALELINE",
                ),
                "INIT_MAP_TYPE" => "ROADMAP",
                "MAP_DATA" => serialize($MAP_DATA),
                "MAP_HEIGHT" => "961",
                "MAP_ID" => "travel",
                "MAP_WIDTH" => "100%",
                "OPTIONS" => array(
                    0 => "ENABLE_DRAGGING",
                    1 => "ENABLE_KEYBOARD",
                ),
                'ELEMENTS' => $arElements
            ),
            false
        );?>
    </div>
<!--/div-->