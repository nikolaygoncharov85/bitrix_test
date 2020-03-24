<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<div class="row-1">
        <div class="popup-title"><?=$arParams['TITLE']?></div>
        <div class="">
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
                        <div class="col mb-col-dist<?if($arResult["QUESTIONS"]['user_name']['REQUIRED'] = "Y" && strlen($arResult['FORM_ERRORS']['user_name']) > 0) { ?> mb-col-dist-error<? }?>">
                            Имя
                            <?=$arResult["QUESTIONS"]['user_name']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist<?if($arResult["QUESTIONS"]['user_last_name']['REQUIRED'] = "Y" && strlen($arResult['FORM_ERRORS']['user_last_name']) > 0) { ?> mb-col-dist-error<? }?>">
                            Фамилия
                            <?=$arResult["QUESTIONS"]['user_last_name']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist<?if($arResult["QUESTIONS"]['user_email_phone']['REQUIRED'] = "Y" && strlen($arResult['FORM_ERRORS']['user_email_phone']) > 0) { ?> mb-col-dist-error<? }?>">
                            Удобный способ связи (e-mail / телефон)
                            <?=$arResult["QUESTIONS"]['user_email_phone']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist<?if($arResult["QUESTIONS"]['from_to']['REQUIRED'] = "Y" && strlen($arResult['FORM_ERRORS']['from_to']) > 0) { ?> mb-col-dist-error<? }?>">
                           Маршрут
                            <?=$arResult["QUESTIONS"]['from_to']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            Дата поездки
                            <?=$arResult["QUESTIONS"]['date']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist<?if($arResult["QUESTIONS"]['people_cols']['REQUIRED'] = "Y" && strlen($arResult['FORM_ERRORS']['people_cols']) > 0) { ?> mb-col-dist-error<? }?>">
                            Количество человек(взрослые)
                            <?=$arResult["QUESTIONS"]['people_cols']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist<?if($arResult["QUESTIONS"]['child_cols']['REQUIRED'] = "Y" && strlen($arResult['FORM_ERRORS']['child_cols']) > 0) { ?> mb-col-dist-error<? }?>">
                            Количество человек(дети 3-18 лет)
                            <?=$arResult["QUESTIONS"]['child_cols']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist<?if($arResult["QUESTIONS"]['comment']['REQUIRED'] = "Y" && strlen($arResult['FORM_ERRORS']['comment']) > 0) { ?> mb-col-dist-error<? }?>">
                            Комментарии и пожелания
                            <?=$arResult["QUESTIONS"]['comment']['HTML_CODE']?>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="col mb-col-dist">
                            <input class="btn btn-red" type="submit" value="Отправить" name="web_form_submit" />
                        </div>
                    </div>
                <?=$arResult["FORM_FOOTER"]?>
        </div>
</div>