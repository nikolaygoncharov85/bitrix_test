<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<div class="form_wrapper_url">
    <?=$arResult["FORM_HEADER"]?>
    <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
        if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
            echo $arQuestion["HTML_CODE"];
        }
    }?>
        <div class="inlineblock-list">
            <h4 class="modal-title">Заказать звонок</h4>
            <p class="modal-description">Заполните форму, и мы обязательно свяжемся с Вами</p>
            <div class="personal-textarea-block">
                <div class="phone_name">
                    <?=$arResult["QUESTIONS"]['traveluxe_name']['HTML_CODE']?>
                </div>
                <div class="phone_name">
                    <?=$arResult["QUESTIONS"]['traveluxe_phone']['HTML_CODE']?>
                </div>
                <!--<div class="text_area">
                    <?/*=$arResult["QUESTIONS"]['traveluxe_textarea']['HTML_CODE']*/?>
                </div>-->
                <div class="sub_button">
                    <div class="personal-btn-block">
                        <input type="submit" class="btn btn-red" name="web_form_submit" value="Заказать звонок"/>
                    </div>
                </div>
            </div>
        </div>
        <?=$arResult["QUESTIONS"]['traveluxe_url']['HTML_CODE']?>
        <span class="traveluxe_url" data-url="<?=$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]?>"></span>
    <?=$arResult["FORM_FOOTER"]?>
</div>