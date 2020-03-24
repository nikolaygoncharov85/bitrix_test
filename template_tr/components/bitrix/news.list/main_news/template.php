<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<div style="display: none;">
    <div class="container">
        <div class="title" style="font-size: 36px;font-family:playfair_displayitalic;border-bottom: 1px solid #e3dfd5;padding-bottom: 10px;">Новости</div>
        <div class="row">
            <? foreach($arResult['ITEMS'] as $arItem) {?>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="news_item" style="position: relative">
                    <img src="<?=$arItem['PREVIEW_PICTURE']['IMG']?>" alt=""/>
                    <div class="news_item_date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></div>
                    <div class="news_item_title"><?=$arItem['NAME']?></div>
                    <div class="news_item_text"><?=$arItem['PREVIEW_TEXT']?></div>
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-default btn-default-without-border btn-sm news_link"></a>
                </div>
            </div>
            <? } ?>
            
            </div>
        </div>
        <div class="block_center">
            <a href="<?=SITE_DIR?>news/" class="btn btn-default btn-lg all_news_link">Все новости <span class="icon icon-btn-arrow"></span></a>
        </div>
    </div>
</div>