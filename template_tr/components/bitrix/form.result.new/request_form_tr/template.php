<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_HEADER"]?>
<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
		echo $arQuestion["HTML_CODE"];
	}
}
?>
<div class="popup-title">Заказать визит:</div>
<div class="row-1">
	<div class="col mb-col-dist">
		<?=$arResult["QUESTIONS"]['tr_your_company']['HTML_CODE']?>
	</div>
</div>
<div class="row-1">
	<div class="col mb-col-dist">
		<?=$arResult["QUESTIONS"]['tr_your_adress']['HTML_CODE']?>
	</div>
</div>
<div class="row-1">
	<div class="col mb-col-dist">
		<?=$arResult["QUESTIONS"]['tr_your_contact_name']['HTML_CODE']?>
	</div>
</div>
<div class="row-1">
	<div class="col mb-col-dist">
		<?=$arResult["QUESTIONS"]['tr_your_email']['HTML_CODE']?>
	</div>
</div>
<div class="row-1">
	<div class="col mb-col-dist">
		<?=$arResult["QUESTIONS"]['tr_visite_phone']['HTML_CODE']?>
	</div>
</div>
<div class="row-1">
	<div class="col mb-col-dist">
		<input  class="btn btn-red quality_control_button" type="submit" value="Заказать" name="web_form_submit" />
	</div>
</div>
<?=$arResult["FORM_FOOTER"]?>