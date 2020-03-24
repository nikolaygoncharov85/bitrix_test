<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_HEADER"]?>
<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
    if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
        echo $arQuestion["HTML_CODE"];
    }
}
?>
    <div class="inlineblock-list">
        <div class="personal-textarea-block" style="width: 100% !important;">
            <?=$arResult["QUESTIONS"]['traveluxe_your_name']['HTML_CODE']?>
            <?=$arResult["QUESTIONS"]['traveluxe_your_mail']['HTML_CODE']?>
            <?=$arResult["QUESTIONS"]['traveluxe_your_wishes']['HTML_CODE']?>
            <input type="text" placeholder="E-mail" style="display: none;" name="email" value="" size="0">
        </div>
        <div class="personal-btn-block" style="float: right;clear: both;">
            <input type="submit" class="btn btn-red" name="web_form_submit" value="Подобрать тур"/>
        </div>
    </div>
<?=$arResult["FORM_FOOTER"]?>