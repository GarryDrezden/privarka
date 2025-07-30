<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
<div class="content_wrapper basket_page">
	<div class="caption">
		<h1>
			<?$APPLICATION->ShowTitle(true);?>
		</h1>
	</div>
	<?$APPLICATION->IncludeComponent(
		"bitrix:sale.order.checkout",
		"privarka-k97",
		Array(
			"SHOW_RETURN_BUTTON" => "Y",
			"URL_PATH_TO_DETAIL_PRODUCT" => ""
		)
	);?>
	<?//$APPLICATION->IncludeComponent(
		// "bitrix:sale.order.ajax", 
		// "privarka-k97", 
		// array(
		// 	"ACTION_VARIABLE" => "soa-action",
		// 	"ADDITIONAL_PICT_PROP_1" => "-",
		// 	"ADDITIONAL_PICT_PROP_2" => "-",
		// 	"ALLOW_APPEND_ORDER" => "Y",
		// 	"ALLOW_AUTO_REGISTER" => "N",
		// 	"ALLOW_NEW_PROFILE" => "N",
		// 	"ALLOW_USER_PROFILES" => "N",
		// 	"BASKET_IMAGES_SCALING" => "adaptive",
		// 	"BASKET_POSITION" => "before",
		// 	"COMPATIBLE_MODE" => "Y",
		// 	"DELIVERIES_PER_PAGE" => "9",
		// 	"DELIVERY_FADE_EXTRA_SERVICES" => "N",
		// 	"DELIVERY_NO_AJAX" => "N",
		// 	"DELIVERY_NO_SESSION" => "Y",
		// 	"DELIVERY_TO_PAYSYSTEM" => "d2p",
		// 	"DISABLE_BASKET_REDIRECT" => "N",
		// 	"EMPTY_BASKET_HINT_PATH" => "/",
		// 	"HIDE_ORDER_DESCRIPTION" => "N",
		// 	"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		// 	"PATH_TO_AUTH" => "/auth/",
		// 	"PATH_TO_BASKET" => "/basket/",
		// 	"PATH_TO_PAYMENT" => "payment.php",
		// 	"PATH_TO_PERSONAL" => "/personal/",
		// 	"PAY_FROM_ACCOUNT" => "N",
		// 	"PAY_SYSTEMS_PER_PAGE" => "9",
		// 	"PICKUPS_PER_PAGE" => "5",
		// 	"PICKUP_MAP_TYPE" => "yandex",
		// 	"PRODUCT_COLUMNS_HIDDEN" => array(
		// 	),
		// 	"PRODUCT_COLUMNS_VISIBLE" => array(
		// 		0 => "PREVIEW_PICTURE",
		// 		1 => "PROPS",
		// 	),
		// 	"SEND_NEW_USER_NOTIFY" => "Y",
		// 	"SERVICES_IMAGES_SCALING" => "adaptive",
		// 	"SET_TITLE" => "Y",
		// 	"SHOW_BASKET_HEADERS" => "N",
		// 	"SHOW_COUPONS" => "N",
		// 	"SHOW_COUPONS_BASKET" => "Y",
		// 	"SHOW_COUPONS_DELIVERY" => "Y",
		// 	"SHOW_COUPONS_PAY_SYSTEM" => "Y",
		// 	"SHOW_DELIVERY_INFO_NAME" => "N",
		// 	"SHOW_DELIVERY_LIST_NAMES" => "N",
		// 	"SHOW_DELIVERY_PARENT_NAMES" => "N",
		// 	"SHOW_MAP_IN_PROPS" => "N",
		// 	"SHOW_NEAREST_PICKUP" => "Y",
		// 	"SHOW_NOT_CALCULATED_DELIVERIES" => "L",
		// 	"SHOW_ORDER_BUTTON" => "always",
		// 	"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
		// 	"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
		// 	"SHOW_PICKUP_MAP" => "Y",
		// 	"SHOW_STORES_IMAGES" => "Y",
		// 	"SHOW_TOTAL_ORDER_BUTTON" => "Y",
		// 	"SHOW_VAT_PRICE" => "Y",
		// 	"SKIP_USELESS_BLOCK" => "N",
		// 	"SPOT_LOCATION_BY_GEOIP" => "Y",
		// 	"TEMPLATE_LOCATION" => "popup",
		// 	"TEMPLATE_THEME" => "blue",
		// 	"USER_CONSENT" => "Y",
		// 	"USER_CONSENT_ID" => "1",
		// 	"USER_CONSENT_IS_CHECKED" => "Y",
		// 	"USER_CONSENT_IS_LOADED" => "Y",
		// 	"USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
		// 	"USE_CUSTOM_ERROR_MESSAGES" => "N",
		// 	"USE_CUSTOM_MAIN_MESSAGES" => "N",
		// 	"USE_ENHANCED_ECOMMERCE" => "N",
		// 	"USE_PHONE_NORMALIZATION" => "Y",
		// 	"USE_PRELOAD" => "Y",
		// 	"USE_PREPAYMENT" => "N",
		// 	"USE_YM_GOALS" => "N",
		// 	"COMPONENT_TEMPLATE" => "privarka-k97",
		// 	"PROPS_FADE_LIST_1" => array(
		// 		0 => "1",
		// 	),
		// 	"PROPS_FADE_LIST_2" => array(
		// 		0 => "2",
		// 	)
		// ),
		// false
	//);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>