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

<? if (count($arResult["ITEMS"]) > 0) { ?>

    <div class="row-1 row-inner white-bg">
        <div class="col">
            <div class="tabs tabs-county tabs-tour">
                <ul class="tabs-list">
                    <?
                    $url = nfGetCurPageParam("", array(array('arrFilter_pf', 'reseort')));
                    ?>
                    <li class="tabs-county-item <? if (!isset($_REQUEST['arrFilter_pf']['reseort'])) { ?> active<? } ?>">
                        <a href="<?=$url?>">Все</a>
                    </li>
                    <? foreach($arResult["ITEMS"] as $arItem) {
                        $url = nfGetCurPageParam("arrFilter_pf%5Breseort%5D" . "=" . $arItem['ID'] . "", array(array('arrFilter_pf', 'reseort')));
                        ?>
                    <li class="tabs-county-item <? if ($_REQUEST['arrFilter_pf']['reseort'] == $arItem['ID']) { ?> active<? } ?>">
                        <a href="<?=$url?>"><?=$arItem['NAME']?></a>
                    </li>
                    <? } ?>
                </ul>
            </div>
        </div>
    </div>

<? } ?>


