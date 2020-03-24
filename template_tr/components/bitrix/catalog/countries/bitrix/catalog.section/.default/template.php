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
            <p class="left-sidebar-menu-title">Гид по стране</p>
            <ul class="left-sidebar-menu">
                <li>
                    <a href="#">Акции и спецпредложения</a>
                </li>
                <li>
                    <a href="#">Отели</a>
                </li>
                <li>
                    <a href="#">Туры</a>
                </li>
                <li>
                    <a href="#">Экскурсии</a>
                </li>
                <li>
                    <a href="#">Достопримечательности</a>
                </li>
                <li>
                    <a href="#">Города и курорты</a>
                </li>
                <li>
                    <a href="#">О стране</a>
                </li>
            </ul>
        </div>
        <div class="page-content">
            <div class="row-1 row-inner white-bg mb-col-dist">

                <div class="col without-padding">

                    <div class="title-before-main-img">
                        <h3><?=$arResult['UF_ABOUT']?></h3>
                    </div>

                    <div class="main-img-block">
                        <img src="<?=$arResult['PICTURE']['SRC']?>" alt=""/>
                    </div>
                </div>
                <div class="col">
                    <div class="text text-block-padding">

                        

                        <?=$arResult['DESCRIPTION']?>
                    </div>
                </div>
            </div>
            <div class="row-1 row-inner white-bg mb-col-dist inner-page-text">
                <div class="col">
                    <h3>
                        Развлечения и достопримечательности Таиланда
                    </h3>
                    <div class="row-1 row-recommend ">
                        <div class="col">
                            <div class="recommend-img-main">
                                <img src="/img/content/country-one/chiagmain.jpg" alt=""/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text">
                                <h2>Чиангмай</h2>
                                <p>
                                    Лучше даже усовершенствовать: вот принципы, по которым tailortour на протяжении более 40 лет среди лучших в мире сервисов. Для наших гостей предоставляются любые варианты сервисов, демонстрируя свои возможности. Не соглашайтесь на второе место. Лучше даже усовершенствовать: вот принципы, по которым tailortour на протяжении более 40 лет среди лучших в мире сервисов. Для наших гостей предоставляются любые варианты сервисов, демонстрируя свои возможности. Не соглашайтесь на второе место.
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <p class="others-sight-title">Другие достопримечательности:</p>
                    <ul class="others-sight-list">
                        <li>
                            <a href="#">
                                Исторический заповедник Сукхотай
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Древняя столица Чиангсэн
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Культурный центр «Сад Роз»
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Пра-Патхом-Чеди
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Храм Ват-Си-Чхум со статуей сидящего Будды
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col">
                    <h2 class="mt-col-dist">Специальные предложения</h2>
                    <div class="row-1 row-3-sm">
                        <div class="col">
                            <div class="special-item-inner">
                                <img src="/img/content/country-one/hotel1.jpg" alt="">
                                <p class="hotel-name">
                                    Mеridien Bangkok 5<span class="icon icon-star"></span>
                                </p>
                                <div class="hotel-description">
                                    Гарантированный Ранний
                                    заезд с 10 утра.П
                                    оздний выезд до 18 часов.
                                </div>
                                <a href="#" class="btn btn-red btn-100">забронировать</a>
                                <a class="absolute-link" href="#"></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="special-item-inner">
                                <img src="/img/content/country-one/hotel2.jpg" alt="">
                                <p class="hotel-name">
                                    Mеridien Bangkok 5<span class="icon icon-star"></span>
                                </p>
                                <div class="hotel-description">
                                    Гарантированный Ранний
                                    заезд с 10 утра.П
                                    оздний выезд до 18 часов.
                                </div>
                                <a href="#" class="btn btn-red btn-100">забронировать</a>
                                <a class="absolute-link" href="#"></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="special-item-inner">
                                <img src="/img/content/country-one/hotel3.jpg" alt="">
                                <p class="hotel-name">
                                    Mеridien Bangkok 5<span class="icon icon-star"></span>
                                </p>
                                <div class="hotel-description">
                                    Гарантированный Ранний
                                    заезд с 10 утра.П
                                    оздний выезд до 18 часов.
                                </div>
                                <a href="#" class="btn btn-red btn-100">забронировать</a>
                                <a class="absolute-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col">
                    <h2 class="mt-col-dist">Ближайшие туры</h2>
                    <div class="row-1 row-3-sm">
                        <div class="col">
                            <div class="special-item-inner">
                                <img src="/img/content/country-one/hotel1.jpg" alt="">
                                <p class="hotel-name">
                                    Самуи
                                </p>
                                <a href="#" class="btn btn-red btn-100">забронировать</a>
                                <a class="absolute-link" href="#"></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="special-item-inner">
                                <img src="/img/content/country-one/hotel2.jpg" alt="">
                                <p class="hotel-name">
                                    Самуи
                                </p>
                                <a href="#" class="btn btn-red btn-100">забронировать</a>
                                <a class="absolute-link" href="#"></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="special-item-inner">
                                <img src="/img/content/country-one/hotel3.jpg" alt="">
                                <p class="hotel-name">
                                    Самуи
                                </p>
                                <a href="#" class="btn btn-red btn-100">забронировать</a>
                                <a class="absolute-link" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col">
                    <div class="row-1 row-recommend">
                        <div class="col without-padding">
                            <div class="recommend-img-main">
                                <img src="/img/content/country-one/popular.jpg" alt=""/>
                                <h2>Популярные отели</h2>
                            </div>
                        </div>
                        <div class="col">
                            <ul class="recommended-hotels-list">
                                <li>
                                    <p class="hotel-name">Le Méridien Bangkok 5 <span class="icon icon-star"></span></p>
                                    <p>Бангкок / Бангкок</p>
                                    <a class="btn btn-red" href="#">Подробнее</a>
                                </li>
                                <li>
                                    <p class="hotel-name">Le Méridien Bangkok 5 <span class="icon icon-star"></span></p>
                                    <p>Бангкок / Бангкок</p>
                                    <a class="btn btn-red" href="#">Подробнее</a>
                                </li>
                                <li>
                                    <p class="hotel-name">Le Méridien Bangkok 5 <span class="icon icon-star"></span></p>
                                    <p>Бангкок / Бангкок</p>
                                    <a class="btn btn-red" href="#">Подробнее</a>
                                </li>
                                <li>
                                    <p class="hotel-name">Le Méridien Bangkok 5 <span class="icon icon-star"></span></p>
                                    <p>Бангкок / Бангкок</p>
                                    <a class="btn btn-red" href="#">Подробнее</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
