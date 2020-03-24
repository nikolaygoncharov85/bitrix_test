<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>


<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<div class="fast_change_tour_b">
	<?=$arResult["FORM_HEADER"]?>

	<?
	if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
	{
	?>
		<?
	/***********************************************************************************
						form header
	***********************************************************************************/
	if ($arResult["isFormTitle"])
	{
	?>
		<div class="form_title"><?=$arResult["FORM_TITLE"]?></div>
	<?
	} //endif ;

		if ($arResult["isFormImage"] == "Y")
		{
		?>
		<a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
		<?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
		<?
		} //endif
		?>
		<?if ($arResult["FORM_DESCRIPTION"]):?>
			<p><?=$arResult["FORM_DESCRIPTION"]?></p>
		<?endif;?>

		<?
	} // endif
		?>
	<?
	/***********************************************************************************
							form questions
	***********************************************************************************/
	?>

	<div class="fast_change_tour_scroll">
		<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
		<?
		foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
		{
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
			{
				echo $arQuestion["HTML_CODE"];
			}
			else
			{
		?>
				<?if ($FIELD_SID == 'adults'):?>
					<div class="fast_change_tour_label_b fast_change_tour_label_b_count">
						<div class="label">
							<div class="fast_change_tour_label_name">
								Кол-во туристов
							</div>
							<div class="fast_change_tour_label_field">
								<span class="fast_change_tour_label_field_name">Взрослые</span>
								<?=$arQuestion["HTML_CODE"]?>
				<?elseif ($FIELD_SID == 'childs'):?>
								<br>
								<span class="fast_change_tour_label_field_name">Дети</span>
								<?=$arQuestion["HTML_CODE"]?>
							</div>
						</div>
					</div>
				<?elseif ($FIELD_SID == 'FROM'):?>
					<div class="fast_change_tour_label_b fast_change_tour_label_b_date">
						<label>
							<div class="fast_change_tour_label_name">
								Дата отправления
							</div>
							<div class="fast_change_tour_label_field">
								<span class="fast_change_tour_label_field_name">с</span>
								<div class="fast_change_tour_label_b_date_img">
									<?=$arQuestion["HTML_CODE"]?>
								</div>
				<?elseif ($FIELD_SID == 'TO'):?>
								<br>
								<span class="fast_change_tour_label_field_name">по</span>
								<div class="fast_change_tour_label_b_date_img">
									<?=$arQuestion["HTML_CODE"]?>
								</div>
							</div>
						</label>
					</div>
				<?elseif ($FIELD_SID == 'AMOUNT'):?>
					<div class="fast_change_tour_label_b fast_change_tour_label_b_amount">
						<label>
							<div class="fast_change_tour_label_name">
								<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
									<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
								<?endif;?>
								<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
								<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
							</div>
							<div class="fast_change_tour_label_field clearfix">
								<div id="slider-range"></div>
								<?=$arQuestion["HTML_CODE"]?>
							</div>
						</label>
					</div>
				<?elseif ($FIELD_SID == 'hours'):?>
					<div class="fast_change_tour_label_b fast_change_tour_label_b_time">
						<div class="label">
							<div class="fast_change_tour_label_name">
								Удобное время<br>для звонка
							</div>
							<div class="fast_change_tour_label_field">
								<?=$arQuestion["HTML_CODE"]?>
				<?elseif ($FIELD_SID == 'minutes'):?>
								<?=$arQuestion["HTML_CODE"]?>
							</div>
						</div>
					</div>
				<?elseif ($FIELD_SID == 'PERSONAL_DATA_CHECK' || $FIELD_SID == 'EMAIL_CHECK' || $FIELD_SID == 'SMS_CHECK'):?>
				<div class="fast_change_tour_label_b fast_change_tour_label_b_check">
					<label>
						<?=$arQuestion["HTML_CODE"]?>
						<span class="fast_change_tour_label_check_text">
							<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
								<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
							<?endif;?>
							<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
							<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
						</span>
					</label>
				</div>
				<?else:?>
					<?if ($FIELD_SID == 'NAME'):?>
						<div class="fast_change_tour_label_text">
							Контактные данные
						</div>
					<?endif;?>
					<div class="fast_change_tour_label_b">
						<label>
							<div class="fast_change_tour_label_name">
								<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
									<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
								<?endif;?>
								<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
								<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
							</div>
							<div class="fast_change_tour_label_field">
								<?=$arQuestion["HTML_CODE"]?>
							</div>
						</label>
					</div>
				<?endif;?>




		<?
			}
		} //endwhile
		?>

	<?
	if($arResult["isUseCaptcha"] == "Y")
	{
	?>
			<tr>
				<th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
			</tr>
			<tr>
				<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
				<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
			</tr>
	<?
	} // isUseCaptcha
	?>
		<div class="fast_change_tour_btn_b">
			<input class="red_btn" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
			<?if ($arResult["F_RIGHT"] >= 15):?>
				<input type="hidden" name="web_form_apply" value="Y" /><input style="display:none;" type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />
			<?endif;?>
			<input style="display:none;" type="reset" value="<?=GetMessage("FORM_RESET");?>" />
		</div>

	<!-- <p>
		<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
	</p> -->
	</div>
	<?=$arResult["FORM_FOOTER"]?>
</div>
<?
} //endif (isFormNote)
?>
