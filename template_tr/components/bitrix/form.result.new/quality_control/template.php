<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>


<?=$arResult["FORM_HEADER"]?>
<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
    if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
        echo $arQuestion["HTML_CODE"];
    }
}
?>

<?=$arResult["QUESTIONS"]['quality_control_name']['HTML_CODE']?>
<div class="clear"></div>
<?=$arResult["QUESTIONS"]['quality_control_company']['HTML_CODE']?>
<?=$arResult["QUESTIONS"]['quality_control_mail']['HTML_CODE']?>
<div class="clear"></div>
<?=$arResult["QUESTIONS"]['quality_control_text']['HTML_CODE']?>
    <div class="feedback-btn">
        <input  class="btn btn-red quality_control_button" type="submit" value="Отправить" name="web_form_submit" />
    </div>
<?=$arResult["FORM_FOOTER"]?>