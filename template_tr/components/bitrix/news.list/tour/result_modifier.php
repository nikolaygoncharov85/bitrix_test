<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {

	$filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width'=>280, 'height'=>218), BX_RESIZE_IMAGE_EXACT, false);

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];


    $arResult['TABS'][$value['DISPLAY_PROPERTIES']['COUNTRY']['VALUE']] = array(
            "ID" => $value['DISPLAY_PROPERTIES']['COUNTRY']['VALUE'],
            "NAME" => strip_tags($value['DISPLAY_PROPERTIES']['COUNTRY']['DISPLAY_VALUE']
        )
    );
}