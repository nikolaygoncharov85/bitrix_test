<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?>
<div class="container without-padding">
    <div class="page">
        <div class="page-content page-content-full">
            <div class="row-1 row-inner white-bg mb-col-dist">
                <div class="col">
                    <div class="text text-block-padding">  
                        <?php
                        $APPLICATION->IncludeComponent("bitrix:main.map", ".default", array(
                            "CACHE_TYPE" => "Т",
                            "CACHE_TIME" => "0",
                            "SET_TITLE" => "Y",
                            "LEVEL" => "3",
                            "COL_NUM" => "1",
                            "SHOW_DESCRIPTION" => "Y"
                                ), false
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
