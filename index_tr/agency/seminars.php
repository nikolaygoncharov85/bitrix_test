<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Семинары");?>
<style type="text/css">
	h3.accordion {
		display: block;
		cursor: pointer;
		margin: 20px 0 0 0;
		text-decoration: underline;
	}
	h3.accordion:first-child {
		margin: 0;
	}
	div.accordion {
		display: none;
		margin: 10px 0 20px 0;
	}
</style>
<div class="row-1 row-inner white-bg mb-col-dist">
	<div class="col">
		<div class="text text-block-padding">
			<p>
				<span style="color: #002056;">Дорогие коллеги!</span><br>
				<span style="color: #002056;"> </span>
			</p>
			<span style="color: #002056;"> </span>
			<p>
				<span style="color: #002056;"> </span>
			</p>
			<span style="color: #002056;"> </span>
			<p style="text-align: justify;">
				<span style="color: #002056;"> </span><span style="color: #002056;">Компания «ИНФЛОТ круизы и путешествия» приглашает Вас принять участие в обучающих семинарах по продукту. </span><span style="color: #002056;">Семинары проводятся ведущими специалистами Компании по профильным направлениям.</span><span style="color: #002056;"> </span>
			</p>
			<span style="color: #002056;"> </span>
			<p>
				<span style="color: #002056;"> </span>
			</p>
			<span style="color: #002056;"> </span>
			<p>
				<span style="color: #002056;"> </span>
			</p>
			<span style="color: #002056;"> </span>
			<p>
				<span style="color: #002056;"> </span><b><span style="color: #002056;"><span style="color: #002056;">БЛИЖАЙШИЕ СЕМИНАРЫ:</span></span></b>
			<h3 class="accordion">01/02/2018 Термальные курорты Италии. Хит продаж: Абано Терме и Фьюджи.</h3>
			<div class="accordion">
				<p>
					Приглашаем вас посетить семинар 01/02/2018, который состоится в конференц-зале компании «Инфлот круизы и путешествия». Начало семинара в 11-00
				</p>
				<p>
					Программа семинара:
					<br>
					<ul>
						<li>1.	Особенности продаж термальных курортов</li>
						<li>2.	Презентация отелей Panoramic Plaza 4*(Абано Терме) и Silva Splendid 4*(Фьюджи)</li>
						<li>3.	Презентация авторских туров компании «Инфлот круизы и путешествия»</li>
						<li>4.	Розыгрыш призов.</li>
					</ul>
				</p>
				<p>
					Ведущий семинара – Алена Лихошва – Product manager Итальянского департамента
				</p>
				<p>
					Анжелика Мирзалова – Sales director Panoramic Plaza 4* & Silva Splendid 4*
				</p>
				<p>
					Заявки присылайте на адрес: <a href="mailto:sales3@inflottravel.com">sales3@inflottravel.com</a>
				</p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("h3.accordion").click(function(){
			if($(this).hasClass('active')){
				$(this).next().hide('swing');
				$(this).removeClass('active');
			}else{
				$("h3.accordion").removeClass('active');
				$("div.accordion").hide('swing');
				$(this).addClass('active');
				$(this).next().show('swing');
			}
		});
	});
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>