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

$isAjax = ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["ajax_action"]) && $_POST["ajax_action"] == "Y");

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME']
);
?>
        <div class="page-content">
            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col">
                    <div class="compare">
                        <div class="compare-param">
                            <div></div>
                            <? foreach($arResult["SHOW_PROPERTIES"] as $arElement) {?>
                                <div>
                                    <? if ($arElement['CODE'] == 'STAR_CATEGORY') { ?>
                                    Звездность
                                    <? } else { ?>
                                        <div><?=$arElement['NAME']?></div>
                                        <? if (is_array($arElement['VALUE'])) {
                                            foreach($arElement['VALUE'] as $value) { ?>
                                                <div class="compare-stripped">
                                                    <?=$value?>
                                                </div>
                                        <? }
                                        }
                                    } ?>
                                </div>
                            <? } ?>
                            <div></div>
                        </div>

                        <div class="compare-products">
                            <ul class="compare-products-list">
                                <?foreach($arResult["ITEMS"] as $arElement) { ?>
                                <li class="compare-products-item">

                                    <div class="compare-tour-img">
                                        <img src="<?=$arElement['PREVIEW_PICTURE']['IMG']?>" alt="" style="height: 99px; width: 120px">
                                        <p class="compare-tour-name"><?=$arElement['NAME']?></p>
                                        <p class="compare-tour-position">Тайланд / Паттайя</p>
                                    </div>

                                    <? foreach($arResult["SHOW_PROPERTIES"] as $arProperty) {?>
                                        <div>
                                        <?
                                        switch ($arProperty['CODE']) {
                                            case 'PRICE':
                                                ?>
                                                <div class="compare-tour-price"><?=$arElement['DISPLAY_PROPERTIES'][$arProperty['CODE']]['DISPLAY_VALUE']?>$</div>
                                                <?
                                                break;

                                            case 'STAR_CATEGORY':
                                                for($i=1; $i<=$arElement['DISPLAY_PROPERTIES']['STAR_CATEGORY']['DISPLAY_VALUE']; $i++) { ?>
                                                    <span class="icon icon-red-star"></span>
                                                <? }
                                                break;

                                            case 'position':
                                                ?><div></div><?
                                                foreach ($arResult["SHOW_PROPERTIES"]['position']['VALUE'] as $key => $value) {

                                                    if (in_array($value, $arElement['DISPLAY_PROPERTIES']['position']['DISPLAY_VALUE'])) { ?>
                                                        <div class="compare-stripped">
                                                            <span class="icon icon-text-check"></span>
                                                        </div>
                                                    <? } else { ?>
                                                        <div class="compare-stripped">
                                                            -
                                                        </div>
                                                        <?
                                                    }
                                                }
                                            break;

                                            case 'service_list':
                                                ?><div></div><?

                                                foreach ($arResult["SHOW_PROPERTIES"]['service_list']['VALUE'] as $key => $value) {

                                                    if (in_array($value, $arElement['DISPLAY_PROPERTIES']['service_list']['DISPLAY_VALUE'])) { ?>
                                                        <div class="compare-stripped">
                                                            <span class="icon icon-text-check"></span>
                                                        </div>
                                                    <? } else { ?>
                                                        <div class="compare-stripped">
                                                        -
                                                        </div>
                                                    <? }
                                                }
                                                break;

                                            case 'interest':
                                                ?><div></div><?

                                                foreach ($arResult["SHOW_PROPERTIES"]['interest']['VALUE'] as $key => $value) {

                                                    if (in_array($value, $arElement['DISPLAY_PROPERTIES']['interest']['DISPLAY_VALUE'])) { ?>
                                                        <div class="compare-stripped">
                                                            <span class="icon icon-text-check"></span>
                                                        </div>
                                                    <? } else { ?>
                                                        <div class="compare-stripped">
                                                        -
                                                        </div>
                                                    <? }
                                                }
                                                break;
                                        }
                                        ?>
                                        </div>
                                    <? } ?>

                                    <div class="compare-btn">
                                        <a href="<?=$arElement['DISPLAY_PROPERTIES']['booking']['DISPLAY_VALUE']?>" class="btn btn-red btn-100">бронировать</a>
                                    </div>
                                </li>
                                <? } ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


