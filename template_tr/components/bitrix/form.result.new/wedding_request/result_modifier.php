<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($_REQUEST["formresult"]) && $_REQUEST['WEB_FORM_ID'] == $arParams['WEB_FORM_ID'])
{
    $formResult = strtoupper($_REQUEST['formresult']);
    switch ($formResult)
    {
        case 'ADDOK':
            $arResult['FORM_NOTE'] = str_replace("#RESULT_ID#", $RESULT_ID, GetMessage('SUCCESS_OK'));
    }
}
