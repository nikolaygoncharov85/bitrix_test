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
$arFilter[CODE] = $arResult[VARIABLES][ELEMENT_CODE];
$arFilter[IBLOCK_ID] = $arParams[[IBLOCK_ID]];
$item = CIblockElement::GetList(array(),$arFilter)->Fetch();
$country = CIBlockElement::GetProperty($arParams[IBLOCK_ID], $item[ID], "sort", "asc", Array("CODE"=>"COUNTRY"))->Fetch();
$countryId = $country[VALUE];
if ($countryId > 0) {
    $arCountry = CIblockSection::GetList(array(),array('IBLOCK_ID' => 27, 'ID' => $countryId))->Fetch();
    $countryCode = $arCountry['CODE'];
}
?>
<style type="text/css">
    .visa_list_menu {
        width: 100%;
    }
    .visa_list_menu li {
        padding: 0;
    }
    .visa_list_menu li a {
        display: block;
        width: 100%;
    }
    .visa_list {
        width: 100%;
        padding: 0;
    }
    .visa_list .jq-selectbox__select-text {
        color: #efefef;
        text-transform: uppercase;
    }
    .visa_list .jq-selectbox li {
        margin: 0;
        display: block;
        min-height: 18px;
        padding: 5px 10px 6px;
    }
</style>
    <div class="page-content visa_list">
        <pre style="display: none;width: 400px;background: blue;overflow: visible;position: absolute;z-index: 2;">
            <?
            var_dump($arResult);
            ?>
        </pre>
        <select class="excursion-list visa_list_menu">
                <option data-link="/visa/">Общая информация</option>
            <?foreach($arResult["ITEMS"] as $arItem) { ?>
                <?if($APPLICATION->getCurDir()==$arItem['DETAIL_PAGE_URL']){?>
                    <option selected data-link="<?=$arItem['DETAIL_PAGE_URL']?>" class="selected sel">
                        <?=strip_tags($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE'])?>
                    </option>
                <?} else {?>
                    <option data-link="<?=$arItem['DETAIL_PAGE_URL']?>">
                        <?=strip_tags($arItem['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE'])?>
                    </option>
                <?}?>
            <? } ?>
        </select>
        <?=$arResult["NAV_STRING"]?>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".visa_list_menu").styler();
        $(".visa_list_menu").parent().find('.jq-selectbox__dropdown li').on('click',function(){
            window.location=$(this).data('link');
        });
    });
</script>