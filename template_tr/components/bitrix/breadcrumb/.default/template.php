<?
//e($arResult);
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
    return "";

$strReturn = '<ol class="breadcrumb">';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($arResult[$index]["LINK"] <> ""  && $index != $itemSize-1)
        $strReturn .= '<li> <a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a> </li>';
    else {
        if (strlen($title) > 0) {
            $strReturn .= '<li class="active">' . $title . '</li>';
        }

    }
}

$strReturn .= '</ol>';

return $strReturn;