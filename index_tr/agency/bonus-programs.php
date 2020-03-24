<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if($_REQUEST[reg]=="Y"){
    LocalRedirect('/agency/register-online.php');
}
$APPLICATION->SetTitle("Бонусные программы для агентств");
?>
    <div class="row-1 row-inner white-bg mb-col-dist">
        <div class="col">
            <div class="text text-block-padding">
                Бонусные программы для агентств
            </div>
        </div>
    </div>
    <br>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>