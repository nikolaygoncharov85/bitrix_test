<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<script type="text/javascript">
	$(".breadcrumb li").each(function(){
		if($(this).find('a').text()=='Страны'){
			$(this).find('a').text('Италия');
			$(this).find('a').attr('href','/countries/italiya/')
		}
	});
</script>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem){?>
	<div class="element_div">
		<div class="table">
			<div class="img_content" style="background: url('<?=$arItem["PREVIEW_PICTURE"]["IMG"]?>');">
				<div class="header_text"><?=$arItem["NAME"]?></div>
			</div>
			<div class="text_content">
				<div class="element_row">
					<?foreach($arItem["DISPLAY_PROPERTIES"]["hotel"]["LINK_ELEMENT_VALUE"] as $arHotel => $keyHotel) {?>
						<?
						$ID = $keyHotel["ID"];
						$arSelect = CIBlockElement::GetProperty(32, $ID, Array(), Array("CODE"=>"STAR_CATEGORY"));
						$hotel_star = $arSelect->Fetch();
						$star = $hotel_star["VALUE_ENUM"];
						$x = CIBlockElement::GetProperty(32, $ID, Array(), Array("CODE"=>"free_nights_italy"));
						$y = $x->Fetch();
						?>
						<div class="city_name"><?=$keyHotel["NAME"]?><?if(!empty($star)){?> <?=$star?>*<?}?></div>
						<?if($y["VALUE"]["TEXT"]){?>
							<span class="text"><?=$y["VALUE"]["TEXT"]?></span>
						<?}?>
						<a class="btn btn-red" href="<?=$keyHotel["DETAIL_PAGE_URL"]?>">Подробнее</a>
						<div class="clear"></div>
					<?}?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?}?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
