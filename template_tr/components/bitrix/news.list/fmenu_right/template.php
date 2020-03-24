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
<div class="right_fmenu">
    <div class="table">
        <div class="arrow_fmenu"></div>
        <div class="list_fmenu">
            <div class="services_padding">
                <span class="inflot_span">Inflot</span>
                <span class="services_span">Услуги</span>
            </div>
            <ul>
                <?foreach($arResult["ITEMS"] as $key => $arItem) {?>
                    <li>
                        <a href="<?=$arItem["PROPERTIES"]["menu_link"]["~VALUE"]?>"><?=$arItem["NAME"]?></a>
                    </li>
                <? } ?>
            </ul>
        </div>
    </div>
</div>
