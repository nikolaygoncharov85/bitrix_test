<div class="container white-bg" id="index_personal_manager">
    <div class="row-1 row-manager white-active-block">
        <div class="w50 float_left relative">
            <div class="manager_photo float_left">
                <img src="/upload/tailor/manager_icon.png" alt="Ваш индивидуальный менеджер"/>
            </div>
            <div class="text_block float_left">
                <span class="text_title">Ваш индивидуальный менеджер</span>
                <p class="text_undertitle">Индивидуальный подбор отеля</p>
                <div class="row-manager-phone">
                    <div class="choose-city">
                        <span class="icon icon-arrow-down-green"></span>
                        <span class="choose-city-name">Москва</span>
                        <div class="choose-city-list">
                            <ul>
                                <li>
                                    <a href="#" data-number="<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header_phone_spb.php"), false);?>" class="roistat-spb-tel">Санкт-Петербург</a>
                                </li>
                                <li>
                                    <a href="#" data-number="<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header_phone_kaz.php"), false);?>" class="roistat-kzn-tel">Казань</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="choose-city-number-phone roistat-msk-tel"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/header_phone_msk.php"), false);?></span>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="w50 float_left" id="index_feedback_phone">
            <div class="w50 float_left index_feedback_phone">
                <span class="text_title">Обратный звонок</span>
                <p class="text_undertitle">Мы свяжемся с Вами в удобное для Вас время</p>
            </div>
            <div class="w50 float_left">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    "feedback_phone",
                    array(
                        "SEF_MODE" => "Y",
                        "WEB_FORM_ID" => "7",
                        "LIST_URL" => "",
                        "EDIT_URL" => "",
                        "SUCCESS_URL" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "CHAIN_ITEM_LINK" => "",
                        "IGNORE_CUSTOM_TEMPLATE" => "Y",
                        "USE_EXTENDED_ERRORS" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600",
                        "SEF_FOLDER" => "/",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "COMPONENT_TEMPLATE" => "feedback_phone"
                    ),
                    false,
                    array(
                        "ACTIVE_COMPONENT" => "Y"
                    )
                );?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>