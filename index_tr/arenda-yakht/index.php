<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Аренда яхт");
$APPLICATION->SetTitle("Аренда яхт");
?><div class="container" style="background:#fff;padding:30px;">
	<p>
 <img width="1024" alt="yacht-joy-me-exteriror-01.jpg" src="/upload/medialibrary/393/yacht_joy_me_exteriror_01.jpg" height="514" title="yacht-joy-me-exteriror-01.jpg"><br>
	</p>
	<h3> <span style="color: #004a80;">Лазурный берег, Италия, Сардиния, Майорка, Греция, Хорватия</span></h3>
	<p>
 <br>
 <b>От 25 500 €/неделя</b>
	</p>
 <br>
	<p>
		 От небольших парусных яхт до эксклюзивных супер-гигантов.
	</p>
 <br>
	<p>
		 Обеспечение лучшим персоналом и индивидуальными консьерж-услугами.
	</p>
 <br>
	<p>
 	</p>
	<p>
		 Оригинальные маршруты с посещением самых ярких событий на Средиземном море.
	</p>
<br>
	<p>
 <span style="color: #ee1d24;"><i>Агентская комиссия включена!</i></span>
	</p>
 <br>
	<p>
		 Присылайте ваши заявки на адрес:
	</p>
 <a href="mailto:fit5@inflottravel.com">fit5@inflottravel.com</a>
	<br>
	<br>
	<div class="row-1 row-inner white-bg mb-col-dist feedback_url_form">
		<div class="col">
			<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "feedback_url_form", array(
				"SEF_MODE" => "Y",
				"WEB_FORM_ID" => "29",
				"LIST_URL" => "",
				"EDIT_URL" => "",
				"SUCCESS_URL" => "",
				"CHAIN_ITEM_TEXT" => "",
				"CHAIN_ITEM_LINK" => "",
				"IGNORE_CUSTOM_TEMPLATE" => "Y",
				"USE_EXTENDED_ERRORS" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"SEF_FOLDER" => "/",
				"AJAX_MODE" => "Y",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"COMPONENT_TEMPLATE" => "feedback_url_form"
			),
				false,
				array(
					"ACTIVE_COMPONENT" => "Y"
				)
			);?>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>