<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы клиентов");?><style type="text/css">
		.clear {
			clear: both;
		}
		.quality_control {
			width: 100%;
		}
		.quality_control .input-feedback-name,
		.quality_control .input-feedback-company,
		.quality_control .input-feedback-mail {
			width: 30%;
			border-radius: 5px;
			border:1px solid silver;
			display: block;
			float: left;
			outline: none;
			margin: 10px;
		}
		.quality_control .input-feedback-text {
			border-radius: 5px;
			border:1px solid silver;
			display: block;
			outline: none;
			width: 63%;
			margin: 10px;
		}
		.quality_control .quality_control_button {
			border-radius: 5px;
			outline: none;
			width: auto;
		}
		.feedback-btn {
			width: 64%;
		}
	</style>
<div class="row-1 row-inner white-bg mb-col-dist">
	<div class="col">
		<div class="text text-block-padding">
			<div class="quality_control">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"quality_control",
	array(
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"COMPONENT_TEMPLATE" => "quality_control",
		"EDIT_URL" => "result_edit.php",	// Страница редактирования результата
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
		"LIST_URL" => "result_list_quality.php",	// Страница со списком результатов
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
		"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
		"VARIABLE_ALIASES" => array(
			"RESULT_ID" => "RESULT_ID",
			"WEB_FORM_ID" => "WEB_FORM_ID",
		),
		"WEB_FORM_ID" => "9",	// ID веб-формы
	)
);?>
			</div>
 <br>
			<p style="text-align: justify;">
 <span style="color: #003562;">Уважаемые коллеги!</span>
			</p>
			<p style="text-align: justify;">
				<span style="color: #003562;">&nbsp;В целях повышения качества, мы открыли раздел - "Отзывы клиентов". Здесь Вы можете оставить свои отзывы и пожелания по работе компании и её представительств. Руководители подразделений, которым будет отправлен запрос, внимательно изучат поступившую информацию, рассмотрят все Ваши пожелания и предложения. </span>
			</p>
 <span style="color: #003562;"> </span><br>
		</div>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>