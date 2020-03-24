<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult))
	return;
?>
<ul class="left-sidebar-menu">
	<?foreach($arResult as $itemIdex => $arItem) { ?>
	<li>
		<a href="<?=$arItem["LINK"]?>" <? if ($arItem["SELECTED"]) { ?> class="current"<? } ?>><?=$arItem["TEXT"]?> </a>
	</li>
	<? } ?>
</ul>
<?/*<div class="gid_carousel_wr">
	<div class="margin_block"></div>
	<div class="gid_carousel">
		<ul class="gid_carousel_list">
			<li style="background-image: url('/agency/img/sicilia.jpg');">
				<span class="header_span">
					Сицилия
				</span>
				<span class="bottom_span">
					Рекламный тур<br>Вылет 09/09/2018<br>Стоимость – 885 евро
				</span>
				<a href="http://www.tailortour.ru/agency/adv-tours.php" title="Сицилия. Рекламный тур."></a>
			</li>
			<li style="background-image: url('/agency/img/italy_new.jpg');">
				<span class="header_span">
					Италия
				</span>
				<span class="bottom_span">
					Бонусная программа для агентств
				</span>
				<a href="http://www.tailortour.ru/agency/agency_bonus.php" title="Италия. Бонусная программа для агентств."></a>
			</li>
		</ul>
	</div>
</div>*/?>