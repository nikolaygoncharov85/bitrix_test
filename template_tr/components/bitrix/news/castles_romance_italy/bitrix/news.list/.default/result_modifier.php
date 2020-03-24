<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {

    if ($value['PREVIEW_PICTURE']['ID'] > 0) {
        $fileId = $value['PREVIEW_PICTURE']['ID'];
    } elseif(empty($value['PREVIEW_PICTURE']['ID']) && $value['DETAIL_PICTURE']['ID'] > 0) {
        $fileId = $value['DETAIL_PICTURE']['ID'];
    }

    if ($fileId > 0) {
        $filePreview = CFile::ResizeImageGet($fileId, array('width' => 350, 'height' => 200), BX_RESIZE_IMAGE_EXACT, false);
    } else {
        $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
    }

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];

}