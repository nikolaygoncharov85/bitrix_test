<?
/*include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");*/
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/*require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";*/
include_once($_SERVER['DOCUMENT_ROOT'].'/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
$APPLICATION->SetTitle("Страница не найдена");
?>
<div class="container without-padding">
    <div class="page">
        <div class="page-content page-content-full">
            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col">
                    <div class="text text-block-padding">        
                        <img style="width: 70%;display: block;margin: 0 auto;" src="/img/404.jpg" alt="Страница не найдена">
                        <p><b>Ошибка :(</b>
                            <br>
                            <br>
                            Страница, к которой Вы обратились, была удалена.
                            А возможно, ее вообще никогда не существовало...</p>
                        <p>
                        <a href="/">Перейти на главную страницу</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? /*
  $APPLICATION->IncludeComponent("bitrix:main.map", ".default", array(
  "CACHE_TYPE" => "A",
  "CACHE_TIME" => "36000000",
  "SET_TITLE" => "Y",
  "LEVEL" => "3",
  "COL_NUM" => "2",
  "SHOW_DESCRIPTION" => "Y"
  ), false
  ); */
 require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>