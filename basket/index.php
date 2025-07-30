<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<div class="content_wrapper basket_page">
	<div class="caption">
		<h1>
			<?$APPLICATION->ShowTitle(true);?>
		</h1>
	</div>
	<?$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"new_template",
		Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
		)
	);?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket",
		"new_basket_template",
		Array(
			"ACTION_VARIABLE" => "basketAction",
			"ADDITIONAL_PICT_PROP_1" => "-",
			"ADDITIONAL_PICT_PROP_2" => "-",
			"AUTO_CALCULATION" => "Y",
			"BASKET_IMAGES_SCALING" => "adaptive",
			"COLUMNS_LIST_EXT" => array("PREVIEW_PICTURE","DISCOUNT","DELETE","DELAY","TYPE","SUM"),
			"COLUMNS_LIST_MOBILE" => array("PREVIEW_PICTURE","DISCOUNT","DELETE","DELAY","TYPE","SUM"),
			"COMPATIBLE_MODE" => "Y",
			"CORRECT_RATIO" => "Y",
			"DEFERRED_REFRESH" => "N",
			"DISCOUNT_PERCENT_POSITION" => "bottom-right",
			"DISPLAY_MODE" => "extended",
			"EMPTY_BASKET_HINT_PATH" => "/catalog/",
			"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
			"GIFTS_CONVERT_CURRENCY" => "N",
			"GIFTS_HIDE_BLOCK_TITLE" => "N",
			"GIFTS_HIDE_NOT_AVAILABLE" => "N",
			"GIFTS_MESS_BTN_BUY" => "Выбрать",
			"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
			"GIFTS_PAGE_ELEMENT_COUNT" => "4",
			"GIFTS_PLACE" => "BOTTOM",
			"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
			"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
			"GIFTS_SHOW_OLD_PRICE" => "N",
			"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
			"HIDE_COUPON" => "Y",
			"LABEL_PROP" => array(),
			"PATH_TO_ORDER" => "/personal/order/make/",
			"PRICE_DISPLAY_MODE" => "Y",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
			"QUANTITY_FLOAT" => "N",
			"SET_TITLE" => "Y",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_FILTER" => "N",
			"SHOW_RESTORE" => "N",
			"TEMPLATE_THEME" => "blue",
			"TOTAL_BLOCK_DISPLAY" => array("bottom"),
			"USE_DYNAMIC_SCROLL" => "Y",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_GIFTS" => "N",
			"USE_PREPAYMENT" => "N",
			"USE_PRICE_ANIMATION" => "Y"
		)
	);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>