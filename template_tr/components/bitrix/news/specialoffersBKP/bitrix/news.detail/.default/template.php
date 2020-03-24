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
    <div class="page-100 page-content" style="float: left;">
        <div class="row-1 row-inner white-bg mb-col-dist">
            <div class="col without-padding">
                <div class="main-img-block">
                    <pre style="display: none;width: 1200px;position: absolute;z-index: 10;background: black;color: #fff;">
                        <?
                        var_dump($arResult["PREVIEW_PICTURE"]);
                        ?>
                    </pre>
                    <img src="<?=$arResult['PREVIEW_PICTURE']["SRC"];?>" title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"];?>" alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"];?>"/>
                </div>
            </div>
            <div class="col">
                <div class="text text-block-padding">
                    <?=$arResult['DETAIL_TEXT']?>
                </div>
            </div>
        </div>
        <div class="row-1 row-inner white-bg mb-col-dist">
            <div class="col">
                <div class="text-block-padding">
                    <div class="row-1 timer-row">
                        <div class="col">
                            <p class="bog-timer-title">
                                Успейте забронировать
                                до завершения акции


                            </p>
                        </div>
                        <div class="col">
                            <? if (!empty($arResult["PROPERTIES"]['action_date']["VALUE"])) { ?>
                            <div class="timer-bg">
                                <div class="count-down-timer" data-time-end="<?=date('Y/m/d', strtotime($arResult["PROPERTIES"]['action_date']["VALUE"]))?>" data-time-format="%H:%M:%S"></div>
                                <?
                                    $pos = strpos($arResult["PROPERTIES"]['link']["VALUE"], 'http://www.tailortour.ru/booking/');
                                    if ($pos !== false) {
                                        //var_dump($pos);
                                        if ($_SESSION['typeOfUser'] == 'b2b') {
                                            $link = $arResult['PROPERTIES']['link']['VALUE'];
                                        } elseif ($_SESSION['typeOfUser'] == 'b2c') {
                                            $re = '/http:\/\/www\.tailortour\.ru\/booking\//';
                                            $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['link']['VALUE']);
                                            $link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx'.$privateLink;
                                        }
                                    }
                                ?>
                                <a href="<?if ($pos !== false) {
                                            if ($link) {
                                                echo $link;
                                            } else {
                                                echo 'javascript:void(0)';

                                            }

                                        } else {
                                            echo $arResult["PROPERTIES"]['link']["VALUE"];

                                        }?>" class="btn-link-order btn btn-red btn-padding" data-id="<?=$arResult['ID']?>">забронировать  сейчас</a>
                                <div class="find_tour_b find_tour_b_btn find_tour_b_btn-excursion" id="find_tour_b_excursion-<?=$arResult['ID']?>">
                                    <div class="find_tour_title">
                                        Кто я?
                                    </div>
                                    <div class="find_tour_list">
                                        <?
                                        $re = '/http:\/\/www\.tailortour\.ru\/booking\//';
                                        $privateLink = preg_replace($re,'',$arResult['PROPERTIES']['link']['VALUE']);
                                        ?>
                                        <div class="find_tour_item">
                                            <span class="typeOfUser" style="display:none;" data-value="b2c"></span>
                                            <a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx<?=$privateLink?>">Я частное лицо</a>
                                        </div>
                                        <div class="find_tour_item">
                                            <span class="typeOfUser" style="display:none;" data-value="b2b"></span>
                                            <a href="http://www.tailortour.ru<?=$arResult['PROPERTIES']['link']['VALUE']?>">Я агент</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
