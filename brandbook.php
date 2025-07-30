<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Шаблоны");
?>
<style>
    /* общие классы */

    .brandbook_h2 {
        font-size: 25px;
        padding-top: 30px;
    }

    /* кнопки */
    .buttons_block {
        display: flex;
        justify-content: space-between;
        padding: 40px 0;
    }

    .button_item {
        width: 33%;
    }

    .but_small {
        background: #F0AB00;
        border-radius: 5px;
        padding: 5px 15px;
        font-size: 16px;
    }

    .but_middle {
        background: #F0AB00;
        border-radius: 5px;
        padding: 10px 40px;
        font-size: 16px;
    }

    .but_big {
        background: #F0AB00;
        border-radius: 5px;
        padding: 13px 33px;
        font-size: 18px;
    }

    /* меню */
    .menu_block {
        display: flex;
        justify-content: space-between;
        padding: 40px 0;
    }

    /* классы поддержки */
    .text-center {
        text-align: center;
    }

	/* каталог */
	.catalog_all{
		display: flex;
		flex-flow: column;
	}	
	.catalog_block{
		display: flex;
		flex-flow: row;
	}
	.catalog_left_block{
		padding-top: 30px;
		width: 20%;
	}
	.catalog_right_block{
		width: 80%;
		padding: 30px 0 0 20px;
	}

	/* блоки с подразделами */
	.card_sections_block{
		display: flex;
    	height: 130px;
		border-bottom: 1px solid #ddd;
	}
	.card_section{
		width: 200px;
		height:100px;
		display: flex;
		align-items: center;
		background-color: #fff;
		box-shadow: 0 1px 4px 0 #bfbfbf;
		box-sizing: border-box;
		margin-left: 20px;
		border-radius: 5px;
	}
	.card_section_img{
		width: 80px;
		height: 80px;
	}
	.card_section_body{
		padding-left: 5px;
	}
	.card_section_title a{
		color: #000;
		text-decoration: none;
		font-weight: 600;
		font-size: 12px;
	}
	/* навигация по каталогу */
	.catalog_section_nav{
		display: flex;
    	flex-flow: column;
		padding-bottom: 10px;
		border-bottom: 1px solid #ddd;
	}
	.catalog_section_item{
		padding-left: 8px;
		padding-right: 8px;
		height: 40px;
		display: flex;
		align-items: center;
		justify-content: left;
		padding-bottom: 0;
		margin-bottom: 0;
	}	
	.catalog_section_item:hover{
		background-color: #f5f5f5;
		border-radius: 6px;
	}
	.catalog_section_title{
		font-weight: 500;
		font-size: 14px;
    	line-height: 20px;
	}

	/* фильтр */
	.catalog_filter{
		padding-top: 20px;
		width: 275px;
	}
	.bx_filter_parameters_box_title{
		font-size: 14px!important;
    	font-weight: 500;
		border-bottom: 1px dashed #F0AB00!important;
	}
	.catalog_filter_block{
		display: flex;
    	flex-flow: column;
	}
	.bx_filter_section{
		border: none!important;
		background: none!important;
		padding: 0!important;
	}
	#set_filter, #del_filter{
		background: #F0AB00;
		color: #fff;
		border: 1px solid #F0AB00;
	}
	.bx_filter_param_text{
		font-weight:400!important;
	}

	/* топ товаров */
	.product-title{
		display: block;
		height: 65px;
		text-align: center;
	}
	.product-item-button-container a{
		color: #fff;
	}
	.product-item{
		width: auto;
		background-color: #fff;
		box-shadow: 0 1px 4px 0 #bfbfbf;
		box-sizing: border-box;    
		border-radius: 5px;
    	padding: 10px 10px;
	}
	.product-item-row{
		padding-bottom: 20px;
	}
	.add_in_basket_cart{
		display: flex;
		justify-content: center;
		align-items: center;
		float: none;
		height: auto;
		margin-top: 10px;
	}	
	.add_in_basket_cart a{
		margin: 0;
	}
	.propertys_cart{
		display: flex;
		justify-content: space-around;
	}
	.count_cart p{
		font-weight: 500;
	}
</style>
<div class="content brandbook">
	<h2 class="brandbook_h2">Поиск по каталогу</h2>
	<?
		$APPLICATION->IncludeComponent (
		"bitrix:catalog.search",
			"",
			Array(
				"AJAX_MODE" => "N",
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_ID" => "1",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_FIELD2" => "id",
				"ELEMENT_SORT_ORDER2" => "desc",
				"SECTION_URL" => "",
				"DETAIL_URL" => "",
				"BASKET_URL" => "/personal/basket.php",
				"ACTION_VARIABLE" => "action",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"DISPLAY_COMPARE" => "Y",
				"PAGE_ELEMENT_COUNT" => "30",
				"LINE_ELEMENT_COUNT" => "3",
				"PROPERTY_CODE" => array(),
				"OFFERS_FIELD_CODE" => array(),
				"OFFERS_PROPERTY_CODE" => array(),
				"OFFERS_SORT_FIELD" => "sort",
				"OFFERS_SORT_ORDER" => "asc",
				"OFFERS_SORT_FIELD2" => "id",
				"OFFERS_SORT_ORDER2" => "desc",
				"OFFERS_LIMIT" => "5",
				"PRICE_CODE" => array("BASE"),
				"USE_PRICE_COUNT" => "Y",
				"SHOW_PRICE_COUNT" => "1",
				"PRICE_VAT_INCLUDE" => "Y",
				"USE_PRODUCT_QUANTITY" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"RESTART" => "Y",
				"NO_WORD_LOGIC" => "Y",
				"USE_LANGUAGE_GUESS" => "Y",
				"CHECK_DATES" => "Y",
				"DISPLAY_TOP_PAGER" => "Y",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Товары",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "Y",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"HIDE_NOT_AVAILABLE" => "N",
				"CONVERT_CURRENCY" => "Y",
				"CURRENCY_ID" => "RUB",
				"OFFERS_CART_PROPERTIES" => array(),
				"AJAX_OPTION_JUMP" => "Y",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "Y"
			)
		);
	?>
	<h2 class="brandbook_h2">Каталог</h2>
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:catalog", 
		"default-privarka", 
		array(
			"ACTION_VARIABLE" => "action",
			"ADD_ELEMENT_CHAIN" => "N",
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BASKET_URL" => "/personal/basket.php",
			"BIG_DATA_RCM_TYPE" => "personal",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
			"COMMON_SHOW_CLOSE_POPUP" => "N",
			"COMPATIBLE_MODE" => "Y",
			"CONVERT_CURRENCY" => "N",
			"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
			"DETAIL_ADD_TO_BASKET_ACTION" => array(
				0 => "BUY",
			),
			"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
				0 => "BUY",
			),
			"DETAIL_BACKGROUND_IMAGE" => "-",
			"DETAIL_BRAND_USE" => "N",
			"DETAIL_BROWSER_TITLE" => "-",
			"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
			"DETAIL_DETAIL_PICTURE_MODE" => array(
				0 => "POPUP",
				1 => "MAGNIFIER",
			),
			"DETAIL_DISPLAY_NAME" => "Y",
			"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
			"DETAIL_IMAGE_RESOLUTION" => "16by9",
			"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(
			),
			"DETAIL_META_DESCRIPTION" => "-",
			"DETAIL_META_KEYWORDS" => "-",
			"DETAIL_OFFERS_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
			"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
			"DETAIL_SET_CANONICAL_URL" => "N",
			"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
			"DETAIL_SHOW_POPULAR" => "Y",
			"DETAIL_SHOW_SLIDER" => "N",
			"DETAIL_SHOW_VIEWED" => "Y",
			"DETAIL_STRICT_SECTION_CHECK" => "N",
			"DETAIL_USE_COMMENTS" => "N",
			"DETAIL_USE_VOTE_RATING" => "N",
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => "sort",
			"ELEMENT_SORT_FIELD2" => "id",
			"ELEMENT_SORT_ORDER" => "asc",
			"ELEMENT_SORT_ORDER2" => "desc",
			"FILTER_HIDE_ON_MOBILE" => "N",
			"FILTER_VIEW_MODE" => "VERTICAL",
			"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
			"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
			"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
			"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
			"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
			"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
			"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
			"GIFTS_MESS_BTN_BUY" => "Выбрать",
			"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
			"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
			"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
			"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
			"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
			"GIFTS_SHOW_IMAGE" => "Y",
			"GIFTS_SHOW_NAME" => "Y",
			"GIFTS_SHOW_OLD_PRICE" => "Y",
			"HIDE_NOT_AVAILABLE" => "N",
			"HIDE_NOT_AVAILABLE_OFFERS" => "N",
			"IBLOCK_ID" => "1",
			"IBLOCK_TYPE" => "catalog",
			"INCLUDE_SUBSECTIONS" => "Y",
			"INSTANT_RELOAD" => "Y",
			"LABEL_PROP" => array(
			),
			"LAZY_LOAD" => "N",
			"LINE_ELEMENT_COUNT" => "4",
			"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
			"LINK_IBLOCK_ID" => "",
			"LINK_IBLOCK_TYPE" => "",
			"LINK_PROPERTY_SID" => "",
			"LIST_BROWSER_TITLE" => "-",
			"LIST_ENLARGE_PRODUCT" => "STRICT",
			"LIST_META_DESCRIPTION" => "-",
			"LIST_META_KEYWORDS" => "-",
			"LIST_OFFERS_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"LIST_OFFERS_LIMIT" => "5",
			"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
			"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
			"LIST_PROPERTY_CODE_MOBILE" => array(
			),
			"LIST_SHOW_SLIDER" => "Y",
			"LIST_SLIDER_INTERVAL" => "3000",
			"LIST_SLIDER_PROGRESS" => "N",
			"LOAD_ON_SCROLL" => "N",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => "В корзину",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_COMPARE" => "Сравнение",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_LAZY_LOAD" => "Показать ещё",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_COMMENTS_TAB" => "Комментарии",
			"MESS_DESCRIPTION_TAB" => "Описание",
			"MESS_NOT_AVAILABLE" => "Нет в наличии",
			"MESS_PRICE_RANGES_TITLE" => "Цены",
			"MESS_PROPERTIES_TAB" => "Характеристики",
			"OFFERS_SORT_FIELD" => "sort",
			"OFFERS_SORT_FIELD2" => "id",
			"OFFERS_SORT_ORDER" => "asc",
			"OFFERS_SORT_ORDER2" => "desc",
			"OFFER_ADD_PICT_PROP" => "-",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => "30",
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(
			),
			"PRICE_VAT_INCLUDE" => "Y",
			"PRICE_VAT_SHOW_VALUE" => "N",
			"PRODUCT_DISPLAY_MODE" => "N",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"PRODUCT_SUBSCRIPTION" => "Y",
			"SEARCH_CHECK_DATES" => "Y",
			"SEARCH_NO_WORD_LOGIC" => "Y",
			"SEARCH_PAGE_RESULT_COUNT" => "50",
			"SEARCH_RESTART" => "N",
			"SEARCH_USE_LANGUAGE_GUESS" => "Y",
			"SEARCH_USE_SEARCH_RESULT_ORDER" => "N",
			"SECTIONS_SHOW_PARENT_NAME" => "Y",
			"SECTIONS_VIEW_MODE" => "LIST",
			"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
			"SECTION_BACKGROUND_IMAGE" => "-",
			"SECTION_COUNT_ELEMENTS" => "Y",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_TOP_DEPTH" => "2",
			"SEF_FOLDER" => "/",
			"SEF_MODE" => "Y",
			"SEF_URL_TEMPLATES" => Array(
				"compare" => "compare.php?action=#ACTION_CODE#",
				"element" => "brandbook.php/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
				"section" => "brandbook.php/#SECTION_CODE_PATH#/",
				"sections" => "catalog",
				"smart_filter" => "brandbook.php/filter/#SMART_FILTER_PATH#/apply/"
			),
			"SET_LAST_MODIFIED" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SHOW_DEACTIVATED" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_MAX_QUANTITY" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"SHOW_SKU_DESCRIPTION" => "N",
			"SHOW_TOP_ELEMENTS" => "Y",
			"SIDEBAR_DETAIL_SHOW" => "N",
			"SIDEBAR_PATH" => "",
			"SIDEBAR_SECTION_SHOW" => "Y",
			"TEMPLATE_THEME" => "blue",
			"TOP_ADD_TO_BASKET_ACTION" => "ADD",
			"TOP_ELEMENT_COUNT" => "9",
			"TOP_ELEMENT_SORT_FIELD" => "sort",
			"TOP_ELEMENT_SORT_FIELD2" => "id",
			"TOP_ELEMENT_SORT_ORDER" => "asc",
			"TOP_ELEMENT_SORT_ORDER2" => "desc",
			"TOP_ENLARGE_PRODUCT" => "STRICT",
			"TOP_LINE_ELEMENT_COUNT" => "4",
			"TOP_OFFERS_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"TOP_OFFERS_LIMIT" => "5",
			"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
			"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
			"TOP_SHOW_SLIDER" => "Y",
			"TOP_SLIDER_INTERVAL" => "3000",
			"TOP_SLIDER_PROGRESS" => "N",
			"TOP_VIEW_MODE" => "SECTION",
			"USER_CONSENT" => "N",
			"USER_CONSENT_ID" => "0",
			"USER_CONSENT_IS_CHECKED" => "Y",
			"USER_CONSENT_IS_LOADED" => "N",
			"USE_BIG_DATA" => "Y",
			"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
			"USE_COMPARE" => "N",
			"USE_ELEMENT_COUNTER" => "Y",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_FILTER" => "Y",
			"USE_GIFTS_DETAIL" => "Y",
			"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
			"USE_GIFTS_SECTION" => "Y",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "N",
			"USE_REVIEW" => "N",
			"USE_SALE_BESTSELLERS" => "Y",
			"USE_STORE" => "N",
			"COMPONENT_TEMPLATE" => "default-privarka",
			"FILTER_NAME" => "",
			"FILTER_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"FILTER_PROPERTY_CODE" => array(
				0 => "",
				1 => "MOUNT_TYPE",
				2 => "WELDING_METOD",
				3 => "WORK_MATERIALS",
				4 => "PRESS_FITTING_TYPE",
				5 => "ID_FROM_1C",
				6 => "SCU",
				7 => "BATTERY",
				8 => "ARTICLE",
				9 => "WEIGHT",
				10 => "MATERIAL",
				11 => "EXTERNAL_DIAMETER",
				12 => "INNER_DIAMETER",
				13 => "HEIGHT",
				14 => "NAIL_DIAMETER",
				15 => "WELDED_DIAMETER",
				16 => "THREAD_DIAMETER",
				17 => "CAP_DIAMETER",
				18 => "WELDING_RANGE",
				19 => "LENGTH",
				20 => "WELDED_LENGTH",
				21 => "UNIT",
				22 => "INSULATION_FIXING",
				23 => "EL_MAT",
				24 => "WORKPIECE_MATERIALS",
				25 => "PRESENCE_COATING",
				26 => "PRESENCE_THREAD",
				27 => "PRESENCE_FORCE",
				28 => "IS_NEW",
				29 => "EQUIPMENT_FEATURES",
				30 => "HOLE_IN_MATERIAL",
				31 => "TO_MAIN",
				32 => "PRODUCER",
				33 => "DISCOUNT",
				34 => "DEGREE_PROTECTION_IP",
				35 => "TYPE_OF_CERAMIC_RING",
				36 => "WELDING_TYPE",
				37 => "THICKNESS_METAL",
				38 => "HIT",
				39 => "WIDTH",
				40 => "",
			),
			"FILTER_PRICE_CODE" => array(
				0 => "BASE_PRICE",
			),
			"FILTER_OFFERS_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"FILTER_OFFERS_PROPERTY_CODE" => array(
				0 => "",
				1 => "ARTICLE",
				2 => "TOP_DIAMETER",
				3 => "LENGTH",
				4 => "CUTS",
				5 => "MATERIAL",
				6 => "DIAMETER",
				7 => "THREAD",
				8 => "CML2_LINK",
				9 => "",
			),
			"VARIABLE_ALIASES" => array(
				"ELEMENT_ID" => "ELEMENT_ID",
				"SECTION_ID" => "SECTION_ID",
			)
		),
		false
	);
	?>
	<br>

	<h2 class="brandbook_h2">Кнопки</h2>
	<div class="buttons_block">
		<div class="button_item text-center">
 <a href="#" class="but_small">Маленькая кнопка</a>
		</div>
		<div class="button_item text-center">
 <a href="#" class="but_middle">Средняя кнопка</a>
		</div>
		<div class="button_item text-center">
 <a href="#" class="but_big">Большая кнопка</a>
		</div>
	</div>
	<h2 class="brandbook_h2">Подвал</h2>
	<div class="footer">
		<div class="footer_bg">
			<div class="footer_content">
				<div class="footer_menu footer_address">
 <img src="/img/footer_logo.png" alt="" title="">
					<p class="pt-10">
						 <?=$region_address;?>
					</p>
					<p>
						 <?=$region_time;?>
					</p>
					<p>
 <a href="tel:+<?=$region_phone_link;?>" style="text-decoration:underline"><?=$region_phone;?></a>
					</p>
					<p>
 <a href="mailto:<?=$region_email;?>" style="text-decoration:underline"><?=$region_email;?></a>
					</p>
				</div>
				<div class="footer_menu">
					<h2>Компания</h2>
					<p>
 <a href="about.php">О компании</a>
					</p>
					<p>
 <a href="/">Продукция</a>
					</p>
					<p>
 <a href="service.php">Услуги</a>
					</p>
					<p>
 <a href="delivery.php">Оплата и доставка</a>
					</p>
					<p>
 <a href="promo.php">Акции</a>
					</p>
					<p>
 <a href="reviews.php">Отзывы</a>
					</p>
				</div>
				<div class="footer_catalog">
					<h2>Продукция</h2>
					<p>
 <a href="/">Крепёж</a>
					</p>
					<p>
 <a href="/">Оборудование</a>
					</p>
				</div>
				<div class="footer_catalog">
					<h2><a href="/">Услуги</a></h2>
					<h2><a href="/">Оплата и доставка</a></h2>
				</div>
				<div class="footer_catalog">
					<h2>Принимаем к оплате</h2>
 <img alt="pay system" src="/img/pay_sys.png" style="width: 150px;">
				</div>
				<div class="footer_catalog footer_social">
					<div style="text-align: right;">
						<h2>Наши соц сети</h2>
 <a href="https://vk.com/kontur97" target="_blank"> <img src="/upload/icons/vk.svg" title="VK" style="width: 44px;"> </a> <a href="https://dzen.ru/kontur" target="_blank" style="padding: 0 10px;"> <img src="/upload/icons/yandex-zen.svg" title="Dzen" style="width: 36px;"> </a> <a href="https://www.youtube.com/channel/UCFZ5TMrd8RaHqRwSeAyts-g" target="_blank"> <img src="/upload/icons/youtube-play.svg" title="Youtube" style="width: 48px;"> </a>
						<div style="padding-top: 10px">
 <a href="" style="text-decoration:underline;font-size: 12px;">Политика конфеденциальности</a><br>
 <a href="" style="text-decoration:underline;font-size: 12px;">Пользовательское соглашение</a><br>
 <br>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_content_oferta" style="justify-content: right;">
				<div class="oferta_block">
					<p style="font-size: 12px;">
						 Все права защищены и охраняются законом. Перепечатка материалов и использование фотографий допускается только с письменного разрешения владельцев сайта и при наличии активной ссылки на сайт privarka-k97.ru. Информация на сайте, носит ознакомительный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 Гражданского кодекса РФ. © Группа компаний «Контур», 2005 - 2023
					</p>
				</div>
			</div>
		</div>
	</div>
	<h2 class="brandbook_h2">Меню</h2>
	<div class="menu_block">
		<div class="menu_item">
			<div id="myDropdown" class="dropdown-content show" style="position: relative!important;top:0!important">
				<div class="list-group-menu">
					<div class="list-group menu_left_block" id="list-tab" role="tablist">
 <a class="list-group-item-action active" id="list-krep-list" data-bs-toggle="list" href="#list-krep2" role="tab" aria-controls="list-krep">Крепеж</a> <a class="list-group-item-action" id="list-equipment-list" data-bs-toggle="list" href="#list-equipment2" role="tab" aria-controls="list-equipment">Оборудование</a>
					</div>
					<div class="menu_right_block">
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="list-krep2" role="tabpanel" aria-labelledby="list-krep2-list">
								<div class="tab-pane-block1">
									<div class="menu_lvl2">
										<div class="menu_lvl2_item">
 <a href="/catalog/zapressovochnyy_krepyezh/" class="lvl2_item">Запрессовочный крепёж</a>
											<div class="menu_lvl3_item">
 <a href="/catalog/shpilka_zapressovochnaya_rezbovaya/" class="lvl3_item">Шпилька запрессовочная резьбовая</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/shpilka_zapressovochnaya_nerezbovaya/" class="lvl3_item">Шпилька запрессовочная нерезьбовая</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/gayka_zapressovochnaya/" class="lvl3_item">Гайка запрессовочная</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/gayka_razvaltsovochnaya/" class="lvl3_item">Гайка развальцовочная</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/vtulka_zapressovochnaya/" class="lvl3_item">Втулка запрессовочная</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/vint_nevypadayushchiy/" class="lvl3_item">Винт невыпадающий</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/dlya_pechatnykh_plat_i_plastika/" class="lvl3_item">Для печатных плат и пластика</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/kreplenie_kabelya/" class="lvl3_item">Крепление кабеля</a>
											</div>
										</div>
										<div class="menu_lvl2_item">
 <a href="/catalog/privarnoy_krepyezh/" class="lvl2_item">Приварной крепёж</a>
											<div class="menu_lvl3_item">
 <a href="/catalog/krepezh_dlya_kondensatornoy_svarki_cd/" class="lvl3_item">Крепеж для конденсаторной сварки CD</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/krepezh_dlya_dugovoy_svarki_arc/" class="lvl3_item">Крепеж для дуговой сварки ARC</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/krepezh_dlya_korotkogo_tsikla_cs/" class="lvl3_item">Крепеж для короткого цикла CS</a>
											</div>
											<div class="menu_lvl3_item">
 <a href="/catalog/gvozdi_izolyatsionnye/" class="lvl3_item">Гвозди изоляционные</a>
											</div>
										</div>
									</div>
								</div>
 <a href="/catalog/krepezh/" class="all_catalog">Перейти в каталог</a>
							</div>
							<div class="tab-pane fade" id="list-equipment2" role="tabpanel" aria-labelledby="list-equipment2-list">
								<div class="menu_lvl2">
									<div class="menu_lvl2_item">
 <a href="/catalog/oborudovanie_dlya_privarki_krepezha/" class="lvl2_item">Оборудование для приварки крепежа</a>
										<div class="menu_lvl3_item">
 <a href="/catalog/bloki_pitaniya/" class="lvl3_item">Блоки питания</a>
										</div>
										<div class="menu_lvl3_item">
 <a href="/catalog/komplekty_oborudovaniya/" class="lvl3_item">Комплекты оборудования</a>
										</div>
										<div class="menu_lvl3_item">
 <a href="/catalog/svarochnye_pistolety/" class="lvl3_item">Сварочные пистолеты</a>
										</div>
										<div class="menu_lvl3_item">
 <a href="/catalog/poluavtomaticheskaya_ustanovka/" class="lvl3_item">Полуавтоматическая установка</a>
										</div>
										<div class="menu_lvl3_item">
 <a href="/catalog/avtomaticheskie_ustanovki_cpw_i_mpw/" class="lvl3_item">Автоматические установки CPW и MPW</a>
										</div>
									</div>
									<div class="menu_lvl2_item">
									</div>
								</div>
 <a href="/catalog/oborudovanie/" class="all_catalog">Перейти в каталог</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>