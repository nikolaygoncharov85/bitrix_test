<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
    <?=$arResult["FORM_HEADER"]?>
    <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
        if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
            echo $arQuestion["HTML_CODE"];
        }
    }
    ?>
    <?=$arResult["QUESTIONS"]['traveluxe_feedback_phone']['HTML_CODE']?>
    <?=$arResult["QUESTIONS"]['traveluxe_feedback_time']['HTML_CODE']?>
    <div class="feedback-btn">
        <input  class="btn btn-red" type="submit" value="Заказать звонок" name="web_form_submit" onclick="ym(46293162, 'reachGoal', 'ORDERCALL'); return true;"/>
    </div>
<?=$arResult["FORM_FOOTER"]?>