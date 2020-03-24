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

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
    <?/*foreach($arResult["ITEMS"] as $arItem):
        if(array_key_exists("HIDDEN", $arItem)):
            echo $arItem["INPUT"];
        endif;
    endforeach;*/?>

    <div class="left-sidebar-section">
        <?=$arResult["ITEMS"]['PROPERTY_264']['INPUT']?>
    </div>
    <div class="left-sidebar-section" id="city-list-from-ajax" style="display: none;>
        <?=$arResult["ITEMS"]['PROPERTY_265']['INPUT']?>
    </div>


    <input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" class="btn btn-red" />
    <input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;
</form>

<script>
    function getCityList(countryId){
        $.ajax({
            dataType: 'html',
            type: "POST",
            url: '<?=$this->__folder?>/ajax.php',
            data: {'countryId':countryId},
            cache: false,
            success: function(result){
                $('#city-list-from-ajax').html(result);
                $('.custom-select').styler();
            }
        });
    }
</script>