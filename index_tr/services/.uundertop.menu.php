<?
if ($_SESSION['typeOfUser'] == 'b2b') {
	$link = '/booking/?departFrom=975&adults=2&childs=0&pageSize=20&hotelQuotaMask=5&aviaQuotaMask=5&mainOnly=0&country=&dateFrom=&dateTo=';
} elseif ($_SESSION['typeOfUser'] == 'b2c') {
	$link = 'http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx?departFrom=975&adults=2&childs=0&pageSize=20&hotelQuotaMask=5&aviaQuotaMask=5&mainOnly=0&country=&dateFrom=&dateTo=';
} else {
	$link = 'javascript:void(0);';
}
$aMenuLinks = Array(
	Array(
		"Авиаперелет",
		"/flights/",
		Array(),
		Array(),
		""
	),
	Array(
		"Аренда автомобиля",
		"/arenda-avtomobilya.php",
		Array(),
		Array(),
		""
	),
	Array(
		"Визы",
		"/visa/",
		Array(),
		Array(),
		""
	),
	Array(
		"ЖД билеты",
		"/tickets/",
		Array(),
		Array(),
		""
	),
	Array(
		"Страхование",
		"/agency/health-insurance-terms.php",
		Array(),
		Array(),
		""
	),
	Array(
		"Online бронирование",
		$link,
		Array(),
		Array('class'=>'online_order_link'),
		""
	),
	Array(
		"Аренда яхт",
		"/arenda-yakht/",
		Array(),
		Array(),
		""
	),
	Array(
		"Экскурсии",
		"/excursions/?TYPE_INDIVIDUAL=169&arrFilter_pf%5BCOUNTRY%5D=&arrFilter_pf%5BRESORT%5D=&arrFilter_pf%5BCITY%5D=&set_filter=Y",
		Array(),
		Array(),
		""
	),
	Array(
		"Трансферы",
		"/transfers/?arrFilter_pf%5BCOUNTRY%5D=&arrFilter_pf%5BRESORT%5D=&arrFilter_pf%5BCITY%5D=&set_filter=%D0%A4%D0%B8%D0%BB%D1%8C%D1%82%D1%80&set_filter=Y",
		Array(),
		Array(),
		""
	),
);
