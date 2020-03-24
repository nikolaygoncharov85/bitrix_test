<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
        <?=$arResult["FORM_HEADER"]?>
        <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
            if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
                echo $arQuestion["HTML_CODE"];
            }
        }
        ?>
        <div class="fast_change_tour_label_b fast_change_tour_label_b_time select_time">
            <div class="label">
                <div class="fast_change_tour_label_name">
                    Удобный день для звонка
                </div>
                <div class="fast_change_tour_label_field">
                    <?=$arResult["QUESTIONS"]['day_of_week']['HTML_CODE']?>
                </div>
            </div>
        </div>
        <div class="fast_change_tour_label_b fast_change_tour_label_b_time select_time">
            <div class="label">
                <div class="fast_change_tour_label_name">
                    Удобное время для звонка
                </div>
                <div class="fast_change_tour_label_field">
                    <?=$arResult["QUESTIONS"]['hours']['HTML_CODE']?>
                    <?=$arResult["QUESTIONS"]['minutes']['HTML_CODE']?>
                </div>
            </div>
        </div>
        <?=$arResult["QUESTIONS"]['traveluxe_feedback_name']['HTML_CODE']?>
        <?=$arResult["QUESTIONS"]['traveluxe_feedback_phone']['HTML_CODE']?>
        <div class="feedback-btn">
            <input  class="btn btn-red" type="submit" value="Заказать звонок" name="web_form_submit" />
        </div>
        <?=$arResult["FORM_FOOTER"]?>