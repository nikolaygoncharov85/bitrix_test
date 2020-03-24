<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

foreach($arResult['ITEMS'] as $key => $value) {

    if ($value['PREVIEW_PICTURE']['ID'] > 0) {
        $filePreview = CFile::ResizeImageGet($value['PREVIEW_PICTURE']['ID'], array('width' => 347, 'height' => 285), BX_RESIZE_IMAGE_EXACT, false);
    } else {
        $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
    }

	$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['IMG'] = $filePreview['src'];

}
$res = CIBlockElement::GetList(array(),array("IBLOCK_ID"=>$arParams['IBLOCK_ID'],"PROPERTY_show_archive"=>"Y"));
if($res->SelectedRowsCount()>0){
    $arResult[SECTION][ARCHIVE] = "Y";
}
else {
    $arResult[SECTION][ARCHIVE] = "N";
}