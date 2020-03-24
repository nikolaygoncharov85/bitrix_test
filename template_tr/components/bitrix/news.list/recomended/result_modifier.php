<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {

	$filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width'=>280, 'height'=>218), BX_RESIZE_IMAGE_EXACT, false);

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];

	/*$nav = CIBlockSection::GetNavChain(false, $value['IBLOCK_SECTION_ID']);

	while ($row = $nav->Fetch()) {

		$arResult['ITEMS'][$key]['SPATH'][] = $row;

	}*/

}

if ($arResult['PICTURE'] > 0) {
    $filePreview = CFile::ResizeImageGet($arResult['PICTURE'], array('width'=>381, 'height'=>386), BX_RESIZE_IMAGE_EXACT, false);
    $arResult['PICTURE_SRC'] = $filePreview['src'];
} else {
    $arResult['PICTURE_SRC'] = SITE_TEMPLATE_PATH . '/assets/img/content/index/recommended.jpg';
}
