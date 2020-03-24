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
<div class="container without-padding">



    <div class="page">
        <div class="left-sidebar">
            <div class="left-sidebar-icon-menu for-mobile">
                <span class="icon icon-menu"></span>
            </div>
            <p class="left-sidebar-menu-title">Поиск по назаванию</p>
            <div class="left-sidebar-section">
                <div class="find-hotels">
                    <form class="find-hotels-form">
                        <input class="find-hotels-input" type="text" placeholder="Поиск по названию"/>
                        <input class="find-hotels-btn" type="submit" value=""/>
                    </form>
                </div>
            </div>
            <div class="left-sidebar-sep small"></div>
            <ul class="left-sidebar-menu without-arrow">
                <? foreach($arResult['SECTIONS'] as $arSection) { ?>
                <li>
                    <a href="<?=$arSection['SECTION_PAGE_URL']?>"><?=$arSection['NAME']?></a>
                </li>
                <? } ?>
            </ul>
        </div>
        <div class="page-content">
            <div class="row-1 row-inner white-bg">
                <div class="col">
                    <div class="tabs tabs-county">
                        <ul class="tabs-list">
                            <li class="tabs-county-item active" data-group="all">
                                <a href="#">Все</a>
                            </li>
                            <? foreach($arResult['UF_CATEGORY'] as $value) { ?>
                            <li class="tabs-county-item" data-group="<?=$value['id']?>">
                                <a href="#"><?=$value['name']?></a>
                            </li>
                            <? } ?>
                        </ul>
                    </div>

                    <div class="country-tab-content">
                        <div class="row-1 row-3-sm">
                            <? foreach($arResult['SECTIONS'] as $arSection) { ?>

                            <div class="col country-item-block" data-group="all <?=implode(' ', $arSection['UF_CATEGORY'])?>">
                                <h3><?=$arSection['NAME']?></h3>
                                <div class="country-item">
                                    <img src="<?=$arSection['PICTURE']['SRC']?>" alt=""/>
                                    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="btn btn-red">подробнее</a>
                                    <a class="absolute-link" href="<?=$arSection['SECTION_PAGE_URL']?>"></a>
                                </div>

                                <p class="country-item-links">
                                    <a href="#">Royal Beach Tel Aviv 5 <span class="icon icon-star"></span></a>
                                </p>
                                <p class="country-item-links">
                                    <a href="#">Тур “Мертвое море”</a>
                                </p>
                                <p class="country-item-links">
                                    <a href="#">Экскурсии</a>
                                </p>

                            </div>
                            <? } ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container white-bg">
        <div class="row-1 row-manager white-active-block">
            <div class="col">
                <div class="title-text center-text">Ваш индивидуальный менеджер</div>
                <p class="center-text mb-col-dist">Индивидуальный подбор отеля</p>
                <p class="row-manager-phone"><span class="choose-city"><span class="icon icon-arrow-down-green"></span><span class="choose-city-name">Москва</span></span> +7 (495) 662-37-36 </p>
            </div>
            <div class="col">
                <div class="title-text center-text">Обратный звонок</div>
                <p class="center-text mb-col-dist">Мы свяжемся с Вами в удобное для Вас время</p>
                <form action="" class="center-text">
                    <input type="text" class="input-feedback-phone" placeholder="+7 (921) 000 00 00 "/>
                    <input  class="btn btn-red" type="submit" value="Заказать звонок"/>
                </form>
            </div>
        </div>
    </div>

</div>