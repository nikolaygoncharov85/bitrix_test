<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="bx-system-auth-form">

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']) {?>
    <script>
        $(document).ready(function() {
           $('#login-link').click();
        });
    </script>
	<?ShowMessage($arResult['ERROR_MESSAGE']); ?>
<?}?>

<?if($arResult["FORM_TYPE"] == "login"):?>

    <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
        <?if($arResult["BACKURL"] <> ''):?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
        <?endif?>
        <?foreach ($arResult["POST"] as $key => $value):?>
            <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
        <?endforeach?>
        <input type="hidden" name="AUTH_FORM" value="Y" />
        <input type="hidden" name="TYPE" value="AUTH" />

        <div class="row-1 row-2-sm">
            <div class="col mb-col-dist">
                <input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" size="17" placeholder="Логин" />
            </div>
            <div class="col mb-col-dist">
                <input type="password" name="USER_PASSWORD" maxlength="50" size="17" autocomplete="off" placeholder="Пароль" />
            </div>
        </div>
        <div class="mb-col-dist">
            <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y"  class="gray-checkbox" />
            <label for="remember" class="light-label">Запомнить меня на этом компьютере</label>
            <?endif?>
        </div>
        <div class="row-1 row-2-sm">
            <div class="col mb-col-dist">
                <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>">Выслать пароль</a>
            </div>
            <div class="col mb-col-dist">
                <div class="right-text">
                    <button type="submit" class="btn btn-red btn-padding">
                        Войти <span class="icon login-btn-arrow"></span>
                    </button>

                </div>
            </div>
        </div>
    </form>
<? else: ?>

<form action="<?=$arResult["AUTH_URL"]?>">
	<table width="95%">
		<tr>
			<td align="center">
				<?=$arResult["USER_NAME"]?><br />
				[<?=$arResult["USER_LOGIN"]?>]<br />
				<a href="<?=$arResult["PROFILE_URL"]?>" title="<?=GetMessage("AUTH_PROFILE")?>"><?=GetMessage("AUTH_PROFILE")?></a><br />
			</td>
		</tr>
		<tr>
			<td align="center">
			<?foreach ($arResult["GET"] as $key => $value):?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?endforeach?>
			<input type="hidden" name="logout" value="yes" />
			<input type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" />
			</td>
		</tr>
	</table>
</form>
<?endif?>
</div>
