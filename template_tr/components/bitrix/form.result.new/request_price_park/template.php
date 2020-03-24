<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<div class="row-1">
        <div class="popup-title"><?=$arParams['TITLE']?></div>
        <div class="register-form">
                <?=$arResult['FORM_NOTE']?>
                <?=$arResult["FORM_HEADER"]?>
                    <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
                        if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
                            ?><div id="<?=$FIELD_SID?>"><?
                            echo $arQuestion["HTML_CODE"];
                            ?></div><?
                        }
                    }
                    ?>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            Имя
                            <?=$arResult["QUESTIONS"]['user_name']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            Фамилия
                            <?=$arResult["QUESTIONS"]['user_last_name']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            Удобный способ связи (e-mail / телефон)
                            <?=$arResult["QUESTIONS"]['user_email_phone']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            Дата поездки
                            <?=$arResult["QUESTIONS"]['date']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            Количество людей
                            <?=$arResult["QUESTIONS"]['people_cols']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            Комментарии и пожелания
                            <?=$arResult["QUESTIONS"]['comment']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            <input  class="btn btn-red" type="submit" value="Отправить" name="web_form_submit" />
                        </div>
                    </div>
                <?=$arResult["FORM_FOOTER"]?>
        </div>
</div>