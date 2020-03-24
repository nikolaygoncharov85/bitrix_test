<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$rsCategory = CUserFieldEnum::GetList(array(), array("USER_FIELD_ID" => 10));

while($arRow = $rsCategory->Fetch()) {
    $arResult['UF_CATEGORY'][$arRow['ID']] = array(
        'id' => $arRow['ID'],
        'name' => $arRow['VALUE']
    );
}


foreach($arResult['SECTIONS'] as $key => $arSection) {


    if ($arSection['PICTURE']['ID'] > 0) {
        $filePreview = CFile::ResizeImageGet($arSection['PICTURE']['ID'], array('width' => 211, 'height' => 182), BX_RESIZE_IMAGE_EXACT, false);
    } else {
        $filePreview['src'] = SITE_TEMPLATE_PATH . '/assets/img/hotels-pic.jpg';
    }

    $arResult['SECTIONS'][$key]['PICTURE']['SRC'] = $filePreview['src'];
}

//var_dump($arResult['UF_CATEGORY']);