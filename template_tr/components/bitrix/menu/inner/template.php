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
