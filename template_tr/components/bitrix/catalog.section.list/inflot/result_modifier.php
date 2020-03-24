<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult["SECTIONS"] as $key => $arSection) {
    $arResult["SECTIONS"][$key]["PICTURE"]['PREVIEW'] = CFile::ResizeImageGet($arSection['PICTURE']['ID'], array('width'=>347, 'height'=>285), BX_RESIZE_IMAGE_EXACT, true);
}
