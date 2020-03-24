<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->SetTitle("Обратный звонок");?>



<?$APPLICATION->IncludeComponent("bitrix:main.include", "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR."include/index_personal_manager.php"
    )
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>