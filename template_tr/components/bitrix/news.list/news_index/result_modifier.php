<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {

	$filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width'=>278, 'height'=>193), BX_RESIZE_IMAGE_EXACT, false);

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = $filePreview['src'];

	/*$nav = CIBlockSection::GetNavChain(false, $value['IBLOCK_SECTION_ID']);

	while ($row = $nav->Fetch()) {

		$arResult['ITEMS'][$key]['SPATH'][] = $row;

	}
	*/
}