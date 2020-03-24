<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказать визит");?><div class="row-1 row-inner white-bg mb-col-dist">
	<div class="col">
		<p class="text text-block-padding">
		</p>
		<p style="text-align: justify;">
 <span style="color: #003562;">
			Уважаемые коллеги, если Вам интересно узнать больше о нашей компании, и Вы хотите получить больше информации о нашем продукте, мы готовы предложить Вам сервис «закажи визит» - выезд специалиста нашей компании к вам в офис*. </span>
		</p>
 <br>
		<h3><span style="color: #003562;">Преимущества:</span></h3>
		<p>
		</p>
		<ul class="text-list red-list list-disc" style="text-align: justify;">
			<li><b>Личное знакомство и подробная индивидуальная презентация от профессионалов нашей компании в удобное для Вас время</b></li>
			<li><b>Подробное представление наших возможностей, а также условий сотрудничества;&nbsp;</b></li>
			<li><b>Обучение сотрудников вашего офиса;&nbsp;</b></li>
			<li><b>Предоставление рекламных материалов и каталогов;</b></li>
		</ul>
 <br>
 <span style="color: #003562;">Для этого вам необходимо заполнить нижеуказанную анкету-запрос, после чего вам перезвонит менеджер по работе с агентствами и согласует время и дату визита. </span>
		<p>
 <span style="color: #003562;"> </span>
		</p>
 <span style="color: #003562;"> </span>
		<p>
 <span style="color: #003562;"> </span><br>
 <span style="color: #003562;">
			* выезд специалиста осуществляется в Москве пределах МКАД.&nbsp;</span>
		</p>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"request_form_tr",
	array(
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "N",	// Тип кеширования
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"COMPONENT_TEMPLATE" => "request_form_tr",
		"EDIT_URL" => "",	// Страница редактирования результата
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
		"LIST_URL" => "",	// Страница со списком результатов
		"SEF_FOLDER" => "/agency/",	// Каталог ЧПУ (относительно корня сайта)
		"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
		"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
		"USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
		"WEB_FORM_ID" => "13",	// ID веб-формы
	)
);?><br>
 <br>
 <br>
		<p>
		</p>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>