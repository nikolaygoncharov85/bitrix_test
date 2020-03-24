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

<div class="row-1 row-inner white-bg">
    <div class="col">
        <div class="tabs tabs-county tabs-tour">
            <ul class="tabs-list">
                <li class="tabs-county-item<? if (empty($_REQUEST['SID'])) { ?> active<? } ?>">
                    <a href="<?=$APPLICATION->GetCurPageParam('', array('SID'));?>">Все</a>
                </li>
                <? foreach($arResult['SECTIONS'] as $arSection) { ?>
                <li class="tabs-county-item<? if ($arSection['ID'] == $_REQUEST['SID']) { ?> active<? } ?>">
                    <a href="<?=$APPLICATION->GetCurPageParam('SID=' . $arSection['ID'], array('SID'));?>"><?=$arSection['NAME']?></a>
                </li>
                <? } ?>
            </ul>
        </div>
    </div>
</div>