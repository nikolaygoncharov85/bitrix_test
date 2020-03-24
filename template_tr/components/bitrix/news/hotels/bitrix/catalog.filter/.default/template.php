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

<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="/hotels/" method="get" id="fast-search">
    <?foreach($arResult["ITEMS"] as $arItem):
        if(array_key_exists("HIDDEN", $arItem)):
            echo $arItem["INPUT"];
        endif;
    endforeach;?>

    <div class="left-sidebar-sep small"></div>
    <p class="left-sidebar-menu-title">Расширенный поиск</p>

    <div class="left-sidebar-section">
        <?=$arResult["ITEMS"]['PROPERTY_189']['INPUT']?>
    </div>
    <div class="left-sidebar-section" id="resorts-list-from-ajax">
        <?=$arResult["ITEMS"]['PROPERTY_307']['INPUT']?>
    </div>

    <div class="left-sidebar-section" id="city-list-from-ajax">
        <?=$arResult["ITEMS"]['PROPERTY_190']['INPUT']?>
    </div>


    <div class="left-sidebar-section left-filter-checkbox-group">
        <div class="checkbox-group-title">Категория</div>
        <?//=$arResult["ITEMS"]['PROPERTY_215']['INPUT']?>

        <? foreach($arResult["ITEMS"]['PROPERTY_215']['INPUT'] as $id => $input) { ?>
        <div class="checkbox-item">
            <!--input type="checkbox" class="checkbox" id="checkbox9" /-->
            <?=$input['html']?>
            <label for="checkbox<?=$id?>">
                <? for($i=1; $i<=5; $i++) { ?>
                    <span class="icon icon-star-filter <?if ($i <= $input['name']) { ?>active<? } ?>"></span>
                <? } ?>
            </label>
        </div>
        <? } ?>

        <? foreach($arResult["ITEMS"]['PROPERTY_227']['INPUT'] as $id => $input) { ?>
            <div class="checkbox-item">
                <?=$input['html']?>
                <label for="checkbox<?=$id?>">
                    <? echo $input['name']; ?>
                </label>
            </div>
        <? } ?>

    </div>
    <div class="left-sidebar-section left-filter-checkbox-group">
        <div class="checkbox-group-title">Расположение</div>
        <? foreach($arResult["ITEMS"]['PROPERTY_216']['INPUT'] as $id => $input) { ?>
            <div class="checkbox-item">
                <?=$input['html']?>
                <label for="checkbox<?=$id?>"><?=$input['name']?></label>
            </div>
        <? } ?>
    </div>
    <div class="left-sidebar-section left-filter-checkbox-group">
        <div class="checkbox-group-title">Интересы</div>
        <? foreach($arResult["ITEMS"]['PROPERTY_217']['INPUT'] as $id => $input) { ?>
            <div class="checkbox-item">
                <?=$input['html']?>
                <label for="checkbox<?=$id?>"><?=$input['name']?></label>
            </div>
        <? } ?>
    </div>

    <div class="left-sidebar-section left-filter-checkbox-group">
        <div class="checkbox-group-title">Услуги</div>
        <? foreach($arResult["ITEMS"]['PROPERTY_220']['INPUT'] as $id => $input) { ?>
            <div class="checkbox-item">
                <?=$input['html']?>
                <label for="checkbox<?=$id?>"><?=$input['name']?></label>
            </div>
        <? } ?>
    </div>
    <input type="hidden" name="set_filter" value="Y">
    <input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" class="btn btn-red" />

</form>

<script>

    function getCityList(resortId){
        $(".custom-select.city").val('');
        console.log($("#arrFilter_pf[CITY]").val());
        setTimeout($('#fast-search').submit(),10);

    }
    function citychange(){
        $('#fast-search').submit();
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