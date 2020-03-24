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

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="/transfers/" method="get">
    <?foreach($arResult["ITEMS"] as $arItem):
        if(array_key_exists("HIDDEN", $arItem)):
            echo $arItem["INPUT"];
        endif;
    endforeach;?>

    <div class="left-sidebar-sep small"></div>
    <p class="left-sidebar-menu-title">Расширенный поиск</p>

    <div class="left-sidebar-section">
        <?=$arResult["ITEMS"]['PROPERTY_326']['INPUT']?>
    </div>

    <div class="left-sidebar-section" id="resorts-list-from-ajax">
        <?=$arResult["ITEMS"]['PROPERTY_327']['INPUT']?>
    </div>

    <div class="left-sidebar-section" id="city-list-from-ajax">
        <?=$arResult["ITEMS"]['PROPERTY_329']['INPUT']?>
    </div>
    
    <input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" class="btn btn-red" />
    <input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;

</form>

<script>

    function getCityList(resortId){
        if(resortId){
            var data = {'resortId': resortId};
        }
        else {
            var data = {'countryId': <?=$_REQUEST["arrFilter_pf"]["COUNTRY"];?>};
        }
        $.ajax({
            dataType: 'html',
            type: "POST",
            url: '<?=$this->__folder?>/ajax.php?city=Y',
            data: data,
            cache: false,
            success: function(result){

                $('#city-list-from-ajax').html(result);

                $('.custom-select').styler();

            }
        });
    }

    function getResortsList(countryId){
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '<?=$this->__folder?>/ajax.php?resort=Y',
            data: {'countryId':countryId},
            cache: false,
            success: function(result) {

                $('#resorts-list-from-ajax').html(result.resort);

                $('#city-list-from-ajax').html(result.city);

                $('.custom-select').styler();



            }
        });
    }
</script>