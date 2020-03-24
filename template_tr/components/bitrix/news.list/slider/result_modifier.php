<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {
/*
    if ($value['PREVIEW_PICTURE']['ID'] > 0) {
        $filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width' => 200, 'height' => 164), BX_RESIZE_IMAGE_EXACT, false);
    } else {
        $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
    }

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];*/

    $filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width'=>390, 'height'=>292), BX_RESIZE_IMAGE_EXACT, false);
    $fileSmall = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width'=>75, 'height'=>56), BX_RESIZE_IMAGE_EXACT, false);

    $fileDetail = CFile::GetFileArray($value['PREVIEW_PICTURE']['ID']);

    $arResult['ITEMS'][$key] = array(
        'preview' => $filePreview['src'],
        'detail' => $fileDetail['SRC'],
        'small' => $fileSmall['src'],
        //'description' => $arResult['PROPERTIES']['PHOTO']['DESCRIPTION'][$key]
    );

}