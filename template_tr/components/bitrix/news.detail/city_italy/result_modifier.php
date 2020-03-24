<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */

$filePreview = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width'=>885, 'height'=>394), BX_RESIZE_IMAGE_EXACT, false);
$arResult['PREVIEW_PICTURE']['SRC'] = $filePreview['src'];

if (count($arResult['PROPERTIES']['gallery']['VALUE']) > 0) {
	foreach($arResult['PROPERTIES']['gallery']['VALUE'] as $key => $value) {

		$filePreview = CFile::ResizeImageGet($value, array('width'=>132, 'height'=>74), BX_RESIZE_IMAGE_EXACT, false);
		$fileList = CFile::ResizeImageGet($value, array('width'=>875, 'height'=>475), BX_RESIZE_IMAGE_EXACT, false);

		$arResult['PROPERTIES']['gallery']['VALUE'][$key] = array(
			'preview' => $filePreview['src'],
			'list' => $fileList['src']
		);
	}
}
if (count($arResult['PROPERTIES']['photo']['VALUE']) > 0) {
	foreach($arResult['PROPERTIES']['photo']['VALUE'] as $key => $value) {

		$filePreview = CFile::ResizeImageGet($value, array('width'=>132, 'height'=>74), BX_RESIZE_IMAGE_EXACT, false);
		$fileList = CFile::ResizeImageGet($value, array('width'=>875, 'height'=>475), BX_RESIZE_IMAGE_EXACT, false);

		$arResult['PROPERTIES']['photo']['VALUE'][$key] = array(
			'preview' => $filePreview['src'],
			'list' => $fileList['src']
		);
	}
}

$nav = CIBlockSection::GetNavChain(false, $arResult['IBLOCK_SECTION_ID']);

while ($row = $nav->Fetch()) {
    $arResult['SPATH'][] = $row;
}


if (count($arResult['PROPERTIES']['nomers_and_suits_id']['VALUE']) > 0) {
    $res = CIBlockElement::GetList(
        array('ID' => 'DESC'),
        array(
            'ID' => $arResult['PROPERTIES']['nomers_and_suits_id']['VALUE'],
            'IBLOCK_ID' => $arResult['PROPERTIES']['nomers_and_suits_id']['LINK_IBLOCK_ID']
        ),
        false,
        false,
        array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'DETAIL_TEXT')
    );

    $arAnother = array();
    while($arRow = $res->GetNext()) {

        if ($arRow['PREVIEW_PICTURE'] > 0) {
            $file = CFile::ResizeImageGet($arRow['PREVIEW_PICTURE'], array('width' => 415, 'height' => 270), BX_RESIZE_IMAGE_EXACT, false);

            $arAnother[] = array(
                'link' => $arRow['DETAIL_PAGE_URL'],
                'src' => $file['src'],
                'alt' => htmlspecialcharsEx($arRow['NAME']),
                'PREVIEW_TEXT' => $arRow['PREVIEW_TEXT'],
                'DETAIL_TEXT' => $arRow['DETAIL_TEXT'],
            );

        }
    }
    $arResult['PROPERTIES']['nomers_and_suits_id']['VALUE'] = $arAnother;
}






/*$nav = CIBlockSection::GetNavChain(false, $arResult['IBLOCK_SECTION_ID']);
while($arRow = $nav->Fetch()) {

	if ($arRow['DEPTH_LEVEL'] == 1) {
		$arResult['hotel_page_location']['region'] = $arRow['NAME'];
	} elseif ($arRow['DEPTH_LEVEL'] == 2) {
		$arResult['hotel_page_location']['name'] = $arRow['NAME'];
	}
}

if (count($arResult['PROPERTIES']['another']['VALUE']) > 0) {
	$res = CIBlockElement::GetList(
		array('ID' => 'DESC'),
		array(
			'ID' => $arResult['PROPERTIES']['another']['VALUE'],
			'IBLOCK_ID' => $arResult['PROPERTIES']['another']['LINK_IBLOCK_ID']
		),
		false,
		false,
		array('ID', 'NAME', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE')
	);

	$arAnother = array();
	while($arRow = $res->GetNext()) {

		if ($arRow['DETAIL_PICTURE'] > 0) {
			$file = CFile::ResizeImageGet($arRow['DETAIL_PICTURE'], array('width' => 153, 'height' => 94), BX_RESIZE_IMAGE_EXACT, false);

			$arAnother[] = array(
				'link' => $arRow['DETAIL_PAGE_URL'],
				'src' => $file['src'],
				'alt' => htmlspecialcharsEx($arRow['NAME']),
			);

		}
	}
	$arResult['PROPERTIES']['another']['VALUE'] = $arAnother;
}

//Пляжм
if (count($arResult['PROPERTIES']['beach']['VALUE']) > 0) {
	$res = CIBlockElement::GetList(
		array('ID' => 'DESC'),
		array(
			'ID' => $arResult['PROPERTIES']['beach']['VALUE'],
			'IBLOCK_ID' => $arResult['PROPERTIES']['beach']['LINK_IBLOCK_ID']
		),
		false,
		false,
		array('ID', 'NAME', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE')
	);

	$arAnother = array();
	while($arRow = $res->GetNext()) {

		if ($arRow['DETAIL_PICTURE'] > 0) {
			$file = CFile::ResizeImageGet($arRow['DETAIL_PICTURE'], array('width' => 153, 'height' => 94), BX_RESIZE_IMAGE_EXACT, false);

			$arAnother[] = array(
				'link' => $arRow['DETAIL_PAGE_URL'],
				'src' => $file['src'],
				'alt' => htmlspecialcharsEx($arRow['NAME']),
			);

		}
	}
	$arResult['PROPERTIES']['beach']['VALUE'] = $arAnother;
}

//excursion
if (count($arResult['PROPERTIES']['excursion']['VALUE']) > 0) {
	$res = CIBlockElement::GetList(
		array('ID' => 'DESC'),
		array(
			'ID' => $arResult['PROPERTIES']['excursion']['VALUE'],
			'IBLOCK_ID' => $arResult['PROPERTIES']['excursion']['LINK_IBLOCK_ID']
		),
		false,
		false,
		array('ID', 'NAME', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE')
	);

	$arAnother = array();
	while($arRow = $res->GetNext()) {

		if ($arRow['DETAIL_PICTURE'] > 0) {
			$file = CFile::ResizeImageGet($arRow['DETAIL_PICTURE'], array('width' => 153, 'height' => 94), BX_RESIZE_IMAGE_EXACT, false);

			$arAnother[] = array(
				'link' => $arRow['DETAIL_PAGE_URL'],
				'src' => $file['src'],
				'alt' => htmlspecialcharsEx($arRow['NAME']),
			);

		}
	}
	$arResult['PROPERTIES']['excursion']['VALUE'] = $arAnother;
}

//excursion
if (count($arResult['PROPERTIES']['tour']['VALUE']) > 0) {
	$res = CIBlockElement::GetList(
		array('ID' => 'DESC'),
		array(
			'ID' => $arResult['PROPERTIES']['tour']['VALUE'],
			'IBLOCK_ID' => $arResult['PROPERTIES']['tour']['LINK_IBLOCK_ID']
		),
		false,
		false,
		array('ID', 'NAME', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE')
	);

	$arAnother = array();
	while($arRow = $res->GetNext()) {

		if ($arRow['DETAIL_PICTURE'] > 0) {
			$file = CFile::ResizeImageGet($arRow['DETAIL_PICTURE'], array('width' => 153, 'height' => 94), BX_RESIZE_IMAGE_EXACT, false);

			$arAnother[] = array(
				'link' => $arRow['DETAIL_PAGE_URL'],
				'src' => $file['src'],
				'alt' => htmlspecialcharsEx($arRow['NAME']),
			);

		}
	}
	$arResult['PROPERTIES']['tour']['VALUE'] = $arAnother;
}*/