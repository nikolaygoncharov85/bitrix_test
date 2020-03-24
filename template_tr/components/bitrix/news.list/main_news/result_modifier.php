<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {

	$filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width'=>297, 'height'=>244), BX_RESIZE_IMAGE_EXACT, false);

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];

}