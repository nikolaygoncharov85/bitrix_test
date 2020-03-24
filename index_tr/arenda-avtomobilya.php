<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Аренда автомобилей");
$APPLICATION->SetTitle("Аренда автомобиля");
?>
	<div class="container">
	<p>
 <img width="1000" alt="kart1.jpg" src="/upload/medialibrary/0df/kart1.jpg" height="490" title="kart1.jpg"><br>
	</p>
	<h3><span style="color: #003370;">Аренда автомобиля по всему миру на выгодных условиях!</span></h3>
	<p>
		 В цену включена комиссия для агентств (кроме тарифа Promo)<br>
	</p>
 <br>
	<h3><span style="color: #003370;">Широкий выбор доступных тарифов:</span> </h3>
 <span style="color: #003370;"> </span>
	<h4> <span style="color: #ee1d24;">&nbsp;-&nbsp;Corporate All Inclusive</span> </h4>
	<p>
		 включены все страховки, в т.ч. полное освобождение от материальной ответственности в случае повреждения и угона а/м, пробег не ограничен
	</p>
	<h4>
	&nbsp;<span style="color: #ee1d24;">- Corporate Light</span> </h4>
	<p>
		 включено страхование ущерба на минимальную сумму, действуют ограничения по пробегу
	</p>
	<h4> <span style="color: #ee1d24;">&nbsp;- Public Web</span> </h4>
	<p>
		 включено страхование ущерба на минимальную сумму, возможны ограничения по пробегу
	</p>
	<h4> <span style="color: #ee1d24;">&nbsp;- Promo</span> </h4>
	<p>
		 включено страхование ущерба на минимальную сумму, возможны ограничения по пробегу
	</p> <br>
Детали бронирования и услуги, входящие в стоимость, уточняйте у менеджера.
	<br>
	<p>
		 Присылайте ваши заявки на адрес:&nbsp;<a href="mailto:fit5@inflottravel.com">fit5@inflottravel.com</a>
	</p>
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
 <br>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>