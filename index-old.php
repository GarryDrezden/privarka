<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");
?><style>
	.caption, .bx-breadcrumb{display:none;}
</style>
<div class="content">
	<div class="bannerBlock">
 <a href="/actions/"> <img src="/img/banner2.png" alt="Баннер"> </a>
	</div>
	<div class="catalog">
		<div class="catalog_item">
 <img src="/img/catalog1.png" alt="Крепеж">
			<div class="info_btn_block btn_y">
				<p class="info_btn btn_25">
					 Крепеж
				</p>
			</div>
			<div class="catalog_list">
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="/catalog/zapressovochnyy_krepyezh/">Запрессовочный крепёж</a>
					</p>
				</div>
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="">Резьбовая заклёпка</a>
					</p>
				</div>
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="/catalog/privarnoy_krepyezh/">Приварной крепёж</a>
					</p>
				</div>
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="">Нержавеющий метрический крепёж</a>
					</p>
				</div>
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="">Закладная гайка</a>
					</p>
				</div>
			</div>
			<div class="info_btn_block btn_y">
				<p class="info_btn btn_20">
 <a href="">Смотреть все</a>
				</p>
			</div>
		</div>
		<div class="catalog_item">
 <img src="/img/catalog2.png" alt="Оборудование">
			<div class="info_btn_block btn_y">
				<p class=" info_btn btn_25">
					 Оборудование
				</p>
			</div>
			<div class="catalog_list">
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="">Оборудование для приварки крепежа</a>
					</p>
				</div>
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="">Оборудование для запрессовки крепежа</a>
					</p>
				</div>
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="">Инструменты для резьбовых заклёпок</a>
					</p>
				</div>
				<div class="catalog_list_item">
 <img alt="arrow" src="/img/catalog_arrow.png">
					<p>
 <a href="">Инструменты для отрывных заклёпок</a>
					</p>
				</div>
			</div>
			<div class="info_btn_block btn_y">
				<p class="info_btn btn_20">
 <a href="">Смотреть все</a>
				</p>
			</div>
		</div>
	</div>
	<div class="caption_main" id="promo">
		<h2>Скидки и акции</h2>
	</div>
	<div class="promo">
		<div class="card_block">
			<div class="card_item">
 <a href="/">
				<div class="card_marker">
 <img src="/img/promo_marker.png" alt="" class="promo_marker">
				</div>
				<div class="card_img">
 <img src="/img/promo1.png" alt="">
				</div>
				<div class="card_text">
					<p>
						 Блок питания CDI 502
					</p>
				</div>
 </a> <a href="/" class="card_button">Заказать</a>
			</div>
			<div class="card_item">
 <a href="/">
				<div class="card_marker">
 <img src="/img/promo_marker.png" alt="" class="promo_marker">
				</div>
				<div class="card_img">
 <img src="/img/promo2.png" alt="">
				</div>
				<div class="card_text">
					<p>
						 Инверторный сварочный аппарат Welbee P 500 L
					</p>
				</div>
 </a> <a href="/" class="card_button">Заказать</a>
			</div>
			<div class="card_item">
 <a href="/">
				<div class="card_marker">
 <img src="/img/promo_marker.png" alt="" class="promo_marker">
				</div>
				<div class="card_img">
 <img src="/img/promo3.png" alt="">
				</div>
				<div class="card_text">
					<p>
						 Вертикальная стойка для фиксации приварочных пистолетов
					</p>
				</div>
 </a> <a href="/" class="card_button">Заказать</a>
			</div>
			<div class="card_item">
 <a href="/">
				<div class="card_marker">
 <img src="/img/promo_marker.png" alt="" class="promo_marker">
				</div>
				<div class="card_img">
 <img src="/img/promo4.png" alt="">
				</div>
				<div class="card_text">
					<p>
						 Сварочный робот OTC -Daihen FD-B6
					</p>
				</div>
 </a> <a href="/" class="card_button">Заказать</a>
			</div>
		</div>
	</div>
	<div class="caption_main">
		<h2>Лидеры продаж</h2>
	</div>
	<div class="hit">
		<div class="card_block">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:1:7\",\"DATA\":{\"logic\":\"Equal\",\"value\":62}}]}",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "4",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"LABEL_PROP" => array(),
		"LINE_ELEMENT_COUNT" => "5",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",
		"OFFERS_FIELD_CODE" => array("",""),
		"OFFERS_LIMIT" => "4",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("BASE_PRICE"),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE_MOBILE" => array(),
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "",
		"SEF_MODE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PAGINATION" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"VIEW_MODE" => "SECTION"
	)
);?>
		</div>
	</div>
	<div class="caption_main">
		<h2>О компании</h2>
	</div>
	<div class="about">
		<p>
			 Компания «КОНТУР» существует на рынке с 1997 года, зарекомендовала себя надежным партнером и дистрибьютором высокотехнологичного промышленного оборудования и качественного крепежа для приварки и запрессовки в листовой металл, продолжает развитие в направлении автоматизации производственных процессов и расширении географии поставок.
		</p>
		<p>
			 На сегодняшний день, являясь одной из ведущих компаний на рынке промышленного оборудования и системной интеграции, мы разрабатываем и внедряем эффективные решения по оптимизации технологических процессов предприятий.
		</p>
		<p>
			 Нами реализовано более 2000 крупных проектов, 219 из которых – автоматизация производственных сварочных процессов и процессов термической 3D резки на базе промышленных роботов OTC Daihen (Япония).
		</p>
		<p>
			 Клиентами компании «КОНТУР» являются крупные предприятия РФ и стран СНГ, небольшие производства и частные мастерские.
		</p>
		<p>
			 Наши сотрудники – команда высококвалифицированных специалистов, в том числе инженеров, конструкторов, технологов по сварке и электронщиков, обладающих уникальными профессиональными знаниями и многолетним опытом работы, необходимыми для разработки и успешной реализации проектов любой степени сложности.
		</p>
		<p>
			 Наличие собственного производства позволяет компании «КОНТУР» изготавливать специализированную оснастку и металлоконструкции для автоматизации производственных процессов.
		</p>
		<p>
			 Основные приоритеты нашей компании - индивидуальное отношение к клиенту, комплексное решение поставленных задач и высокое качество продукции, работ и услуг.
		</p>
		<p>
			 Наша цель – качественное удовлетворение потребностей и экспертный подход к оптимизации производственных процессов клиентов, квалифицированная техническая поддержка и консультирование.
		</p>
		<div class="about_button">
 <a href="" class="btn_y">Подробности</a> <a href="" class="btn_y">Начать сотрудничество</a>
		</div>
	</div>
	<div class="caption_main">
		<h2>Наши поставщики</h2>
	</div>
	 <? $APPLICATION->IncludeFile("/include/manufactors.php"); ?>
	<div class="caption">
		<h2>Контакты</h2>
	</div>
	<div class="contacts">
		<div class="contacts_item">
 <img src="/img/footer_location.png" alt="">
			<p class="contact_address">
				 г. Москва, 5-я Магистральная улица, 8А
			</p>
			<p>
				 Многоканальный: <a href="tel:84951283456">8 (495) 128-34-56</a>
			</p>
			<p>
				 Отдел крепежа: <a href="tel:89055768697">8 (905) 576-86-97</a>
			</p>
			<p>
				 Отдел продаж: <a href="tel:89055768785">8 (905) 576-87-85</a>
			</p>
			<p>
				 Отдел роботизации: <a href="tel:89055768785">8 (905) 576-87-85</a>
			</p>
		</div>
		<div class="contacts_item">
 <img src="/img/footer_location.png" alt="">
			<p class="contact_address">
				 г. Екатеринбург, ул. Волховская, дом 20, оф. 105
			</p>
			<p>
				 Многоканальный: <a href="tel:83432264276">8 (343)226-42-76</a>
			</p>
		</div>
		<div class="contacts_item" style="padding-top: 20px;">
 <img src="/img/footer_location.png" alt="">
			<p class="contact_address">
				 г. Новосибирск, ул. Петухова, 67, корпус 10
			</p>
			<p>
				 Многоканальный: <a href="tel:83833752597">8 (383) 375-25-97</a>
			</p>
			<p>
 <a href="tel:83832093397">8 (383) 209-33-97</a>
			</p>
		</div>
		<div class="contacts_item" style="padding-top: 20px;">
 <img src="/img/footer_location.png" alt="">
			<p class="contact_address">
				 192241, г. Санкт-Петербург ул. Софийская, д. 66
			</p>
			<p>
				 Многоканальный: <a href="tel:88124932846">8 (812) 493-28-46</a>
			</p>
		</div>
	</div>
	 <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A941d5374fa80f699f3b45f1d4f9ceb9a25c49deff93d02bbda455f63e83c57fa&amp;source=constructor" width="100%" height="435" frameborder="0"></iframe>
	<div class="caption_main">
		<h2>Отзывы о нас</h2>
	</div>
	<div class="reviews">
		<div class="reviews_item">
			<p class="text-center date">
				 13.07.2021
			</p>
			<p class="text-center">
 <img src="/img/stars.png" alt="">
			</p>
			<p class="text-center">
				 ЗАО "ТКО Механика" выражает глубокую признательность и искреннюю благодарность ООО "Контур-97" за сотрудничество в области поставки оборудования для производства сварочных работ.
			</p>
			<p class="text-center">
				 Поставки оборудования, выполненные в срок, позволили нам бесперебойно осуществить свою деятельность.
			</p>
			<p class="signature">
				 ДИРЕКТОР ПО МАРКЕТИНГУ И ЛОГИСТИКЕ ТКО МЕХАНИКА Гришатов Н.В.
			</p>
		</div>
		<div class="reviews_backcall">
			<div>
 <img src="/img/reviews.png" alt="">
			</div>
			<div>
				<h2>Остались вопросы или у Вас есть пожелания?</h2>
				<p>
					 Свяжитесь с нами или оставьте свой отзыв. Нам важно Ваше мнение!
				</p>
				<div class="reviews_button">
 <a href="" class="btn_y">Оставить отзыв</a> <a href="" class="btn_yb ml-25">Связаться с нами</a>
				</div>
			</div>
		</div>
		<div class="reviews_email">
			<p class="text-center mt-0">
				 Подпишитесь на email-рассылку!
			</p>
			<form method="POST">
 <input type="search" id="add_email" name="add_email" placeholder="name@mail.ru"> <button type="submit">Подписаться</button>
			</form>
		</div>
	</div>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>