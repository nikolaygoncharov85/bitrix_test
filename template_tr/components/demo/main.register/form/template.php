<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<?if($USER->IsAuthorized()){ ?>

<? } else { ?>

    <form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data" class="register-form">

    <? if($arResult["BACKURL"] <> ''):?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
    <?endif; ?>

        <?
        if (count($arResult["ERRORS"]) > 0) { ?>
            <div class="row-1">
                <div class="col mb-col-dist">
            <?foreach ($arResult["ERRORS"] as $key => $error)
                if (intval($key) == 0 && $key !== 0)
                    $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);

            ShowError(implode("<br />", $arResult["ERRORS"]));
            ?>

            <script>
                $(document).ready(function() {
                    $('#register-link').click();
                });
            </script>
                </div>
            </div>
            <?
        }
        ?>

    <div class="row-1">

        <div class="col mb-col-dist">
            <input size="30" type="text" name="REGISTER[NAME]" value="<?=$arResult["VALUES"]["NAME"]?>"  placeholder="Имя" title="Поле, обязательное для заполнения" required/>
        </div>
        <div class="col mb-col-dist">
            <input size="30" type="text" name="REGISTER[LAST_NAME]" value="<?=$arResult["VALUES"]["LAST_NAME"]?>"  placeholder="Фамилия" title="Поле, обязательное для заполнения" required/>
        </div>
        <div class="col mb-col-dist">
            <input size="30" type="text" name="REGISTER[SECOND_NAME]" value="<?=$arResult["VALUES"]["SECOND_NAME"]?>"  placeholder="Отчество"/>
        </div>
    </div>
    <div class="row-1 row-2-sm">
        <div class="col mb-col-dist col-sex">
            <label>Пол:</label>
            <input type="radio" id="h1" name="sex">
            <label for="h1">Жен</label>
            <input type="radio" id="h2" name="sex">
            <label for="h2">Муж.</label>
        </div>
        <div class="col mb-col-dist">
            <input type="text" placeholder="Дата рождения"
                   class="main-filter-datapicker datapicker-register" name="REGISTER[PERSONAL_BIRTHDAY]"  value="<?=$arResult["VALUES"]["PERSONAL_BIRTHDAY"]?>" />
        </div>
    </div>
    <div class="row-1">

        <div class="col mb-col-dist">
            <select name="REGISTER[PERSONAL_CITY]" class="custom-select border-gray" data-placeholder="Город" >
                <option></option>
                <option value="Москва">Москва</option>
                <option value="Санкт-Петербург">Санкт-Петербург</option>
                <option value="Казань">Казань</option>
            </select>
        </div>

        <div class="col mb-col-dist">
            <input size="30" type="text" name="REGISTER[PERSONAL_PHONE]" value="<?=$arResult["VALUES"]["PERSONAL_PHONE"]?>"  placeholder="Контактный телефон"/>
        </div>

        <div class="col mb-col-dist">
            <input size="30" type="text" name="REGISTER[EMAIL]" value="<?=$arResult["VALUES"]["EMAIL"]?>"  placeholder="E-mail" required/>
        </div>

        <div class="col mb-col-dist">
            <input type="checkbox" class="gray-checkbox" id="register-check1"/>
            <label for="register-check1" class="light-label">Согласен на обработку моих персональных данных</label>
        </div>
    </div>



    <? if ($arResult["USE_CAPTCHA"] == "Y") { ?>
    <div class="row-1 row-captcha">
        <div class="col mb-col-dist">
            <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" class="captcha" />
        </div>
        <div class="col mb-col-dist">
            <input type="text" name="captcha_word" maxlength="50" value=""  placeholder="Введите код с картинки" />
        </div>
    </div>
    <? } ?>
    <div class="row-1 row-captcha">
        <div class="col">
        </div>
        <div class="col mb-col-dist">
            <input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>"  class="btn btn-100 btn-red"/>
        </div>
    </div>
        <script>
            $( '.datapicker-register').datepicker({
                dateFormat: 'dd.mm.yy',
                minDate: new Date(1900, 10 - 1, 25),
                autoclose: false,
                beforeShow: function () {
                    $('#ui-datepicker-div').addClass("custom-calendar");
                },
                onSelect: function() {
                    $(this).data('datepicker').inline = true;
                },
                onClose: function() {
                    $(this).data('datepicker').inline = false;
                }
            });
        </script>
</form>

<? } ?>
