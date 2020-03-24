<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); // ���������, ��������� �� ��������� ����� ����� (����)?>
<?if (!empty($arResult)): // ���� ���� ���� �� 1 ����� ����, ����� �������� �����?>
	<!--<ul id="horizontal-multilevel-menu menu-list" class="menu-list">-->
	<ul id="menu-list" class="menu-list">
	<?
	$previousLevel = 0; // ���������� �������� �������� DEPTH_LEVEL ����������� ������
foreach($arResult as $arItem): // ��������� �� �������, $arItem - ������ � ����������� � ������� ������?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?// ���� ������� ����������� �������� ������ ���� ������ ��� � �����������, ������ "�������" ����������� � ����� ������� ������?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	<?if ($arItem["IS_PARENT"]): //���� ����� �������� �������, ������� ������ � �������� ����� ������ (��� <ul>)?>
	<?if ($arItem["DEPTH_LEVEL"] == 1): // ���� ������� ����������� =1, �.�. ��� ������� ����?>
	<?// ������� ������ � ��������� ����� "root-item" ���� ����� ���������� � "root-item-selected" ���� ��������?>
	<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
	<ul class="under_menu">
	<?else: // ��� ��������� ������� �����������?>
	<?// ������� ������ � ��������� ����� "parent". ���� ����� ��������, ��� �������� ������ <li> ��������� ����� "item-selected"?>
	<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
	<ul class="under_menu">
	<?endif?>
	<?else: // ��� �������, �� ���������� �������?>
		<?if ($arItem["PERMISSION"] > "D"): // ��������� ����� ������� � ������?>
			<?if ($arItem["DEPTH_LEVEL"] == 1): // ���� ������� ����������� =1, �.�. ��� ������� ����?>
				<?// ������� ������ � ��������� ����� "root-item" ���� ����� ���������� � "root-item-selected" ���� ��������?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else: // ��� ��������� ������� �����������?>
				<?// ������� ������. ���� ����� ��������, ��� �������� ������ <li> ��������� ����� "item-selected"?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a class="<?if ($arItem["PARAMS"]['class']):?>online_order_link<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
		<?else: // ��� �������, � ������� �������� ������?>
			<?if ($arItem["DEPTH_LEVEL"] == 1): // ���� ������� ����������� =1, �.�. ��� ������� ����?>
				<?// ������� ������ ������ � ��������� ����� "root-item" ���� ����� ���������� � "root-item-selected" ���� ��������?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else: // ��� ��������� ������� �����������?>
				<?// ������� ������ ������ � ��������� ����� "denied"?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>
		<?endif?>
	<?endif?>
	<?$previousLevel = $arItem["DEPTH_LEVEL"]; // ���������� ������� �����������?>
<?endforeach?>
	<?if ($previousLevel > 1):// ���� ������ ����������� �� ������ ���� � ������� ����������� >1, ��������� ��������� ������?>
		<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
	<?endif?>
		<li>
			<div class="header_right_link">
				<? if ($USER->IsAuthorized()) { ?>
					<a href="?logout=yes" class="login">Выйти</a>
				<? } else { ?>
					<a href="<?= SITE_DIR ?>login/" class="login">Личный кабинет</a>
				<? } ?>
			</div>
		</li>
		<li class="phone_new_li">
			<style type="text/css">
				.phone_new_li {
					padding: 0 !important;
					position: absolute !important;
					top: 0;
					bottom: 0;
					right: 0;
					border-bottom: 0 !important;
					border-top: 0 !important;
					padding-left: 15px !important;
					background: url(<?= SITE_TEMPLATE_PATH ?>/assets/img/icons/header-phone.png) no-repeat 10px center #06c8c1;
				}
				.phone_new_a {
					display: block;
					padding: 25px 20px 27px 20px;
					text-transform: uppercase;
					text-decoration: none !important;
					color: #fff !important;
				}
			</style>
			<a href="/#index_feedback_phone" class="phone_new_a">Заказать звонок</a>
		</li>
	</ul>
	<?
	?>
	<div class="menu-clear-left"></div>
		<div class="find_tour_b find_tour_b_btn find_tour_b-online_order_link">
			<div class="find_tour_title">
				Кто я?
			</div>
			<div class="find_tour_list">

				<div class="find_tour_item">
					<span class="typeOfUser" style="display:none;" data-value="b2c"></span>
					<a href="http://online.tailortour.ru/Personal_tailor/Extra/QuotedDynamic.aspx?departFrom=975&adults=2&childs=0&pageSize=20&hotelQuotaMask=5&aviaQuotaMask=5&mainOnly=0&country=&dateFrom=&dateTo=">Я частное лицо</a>
				</div>
				<div class="find_tour_item">
					<span class="typeOfUser" style="display:none;" data-value="b2b"></span>
					<a href="/booking/?departFrom=975&adults=2&childs=0&pageSize=20&hotelQuotaMask=5&aviaQuotaMask=5&mainOnly=0&country=&dateFrom=&dateTo=">Я агент</a>
				</div>

			</div>
		</div>

<?endif?>