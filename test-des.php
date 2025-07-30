<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
<!-- Swiper -->
<div class="main_banner">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href=""><img src="/local/templates/privarka2023/images/banner_img.png"/></a></div>
            <div class="swiper-slide"><img src="/local/templates/privarka2023/images/banner_img.png"/></div>
            <div class="swiper-slide"><img src="/local/templates/privarka2023/images/banner_img.png"/></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="main_catalog_blocks content_wrapper">
  <div class="main_catalog_blocks_item">
    <a href="">
      <img src="/local/templates/privarka2023/images/main_catalog_blocks1.png" title="" alt=""/>
    </a>
    <a href="" class="main_catalog_blocks_item_a">
      Крепеж
      <br>
      <span>ПОДРОБНЕЕ</span>
    </a>
  </div>
  <div class="main_catalog_blocks_item">
    <a href="">
      <img src="/local/templates/privarka2023/images/main_catalog_blocks2.png" title="" alt=""/>
    </a>
    <a href="">
      Оборудование
      <br>
      <span>ПОДРОБНЕЕ</span>
    </a>
  </div>
</div>
<div class="main_top_product">
  <div class="btn-group content_wrapper">
    <a href="#" class="btn btn_main_category">Скидки и акции</a>
    <a href="#" class="btn btn_main_category_second">Лидеры продаж</a>
  </div>
  <div class="main_top_product_block content_wrapper">
    <?$APPLICATION->IncludeComponent("bitrix:catalog.top", "template1", 
    Array(
      "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
        "ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
        "ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
        "ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
        "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_TYPE" => "A",	// Тип кеширования
        "COMPARE_NAME" => "CATALOG_COMPARE_LIST",	// Уникальное имя для списка сравнения
        "COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
        "CONVERT_CURRENCY" => "Y",	// Показывать цены в одной валюте
        "CURRENCY_ID" => "RUB",	// Валюта, в которую будут сконвертированы цены
        "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:1:7\",\"DATA\":{\"logic\":\"Equal\",\"value\":62}}]}",	// Фильтр товаров
        "DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
        "DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
        "ELEMENT_COUNT" => "4",	// Количество выводимых элементов
        "ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
        "ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
        "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
        "ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
        "ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
        "FILTER_NAME" => "",	// Имя массива со значениями фильтра для фильтрации элементов
        "HIDE_NOT_AVAILABLE" => "N",	// Недоступные товары
        "HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
        "IBLOCK_ID" => "1",	// Инфоблок
        "IBLOCK_TYPE" => "catalog",	// Тип инфоблока
        "LABEL_PROP" => "",	// Свойство меток товара
        "LINE_ELEMENT_COUNT" => "5",	// Количество элементов выводимых в одной строке таблицы
        "MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
        "MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
        "MESS_BTN_COMPARE" => "Сравнить",	// Текст кнопки "Сравнить"
        "MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
        "MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
        "MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",	// Сообщение о недоступности услуги
        "OFFERS_FIELD_CODE" => array(	// Поля предложений
          0 => "",
          1 => "",
        ),
        "OFFERS_LIMIT" => "4",	// Максимальное количество предложений для показа (0 - все)
        "OFFERS_SORT_FIELD" => "sort",	// По какому полю сортируем предложения товара
        "OFFERS_SORT_FIELD2" => "id",	// Поле для второй сортировки предложений товара
        "OFFERS_SORT_ORDER" => "asc",	// Порядок сортировки предложений товара
        "OFFERS_SORT_ORDER2" => "desc",	// Порядок второй сортировки предложений товара
        "PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
        "PRICE_CODE" => array(	// Тип цены
          0 => "BASE_PRICE",
        ),
        "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",	// Порядок отображения блоков товара
        "PRODUCT_DISPLAY_MODE" => "N",	// Схема отображения
        "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
        "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
        "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false}]",	// Вариант отображения товаров
        "PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
        "PROPERTY_CODE_MOBILE" => "",	// Свойства товаров, отображаемые на мобильных устройствах
        "ROTATE_TIMER" => "30",	// Время показа одного слайда, сек (0 - выключить автоматическую смену слайдов)
        "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
        "SEF_MODE" => "N",	// Включить поддержку ЧПУ
        "SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
        "SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
        "SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
        "SHOW_OLD_PRICE" => "N",	// Показывать старую цену
        "SHOW_PAGINATION" => "Y",	// Показывать навигацию по слайдам
        "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
        "SHOW_SLIDER" => "Y",	// Показывать слайдер для товаров
        "SLIDER_INTERVAL" => "3000",	// Интервал смены слайдов, мс
        "SLIDER_PROGRESS" => "N",	// Показывать полосу прогресса
        "TEMPLATE_THEME" => "blue",	// Цветовая тема
        "USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
        "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
        "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
        "VIEW_MODE" => "SECTION",	// Показ элементов
      ),
      false
    );?>
    <div class="main_black_block"></div>
  </div>
</div>
<div class="main_about">
  <div class="main_about_item1">
    <div class="item1_layer1"></div>
    <div class="item1_layer2">
      <img src="/local/templates/privarka2023/images/about_layer2.png" title="" alt=""/>
    </div>
    <div class="item1_layer3">
      <p><b>Наша цель</b> – качественное удовлетворение потребностей и экспертный подход к оптимизации производственных процессов клиентов, квалифицированная техническая поддержка и консультирование.</p>
    </div>

  </div>
  <div class="main_about_item2">
    <div class="item2_layer1">
      <h3>О компании</h3>
      <p>Компания «КОНТУР» существует на рынке с 1997 года, зарекомендовала себя надежным партнером и дистрибьютором высокотехнологичного промышленного оборудования и качественного крепежа для приварки и запрессовки в листовой металл, продолжает развитие в направлении автоматизации производственных процессов и расширении географии поставок.</p>
      <p>На сегодняшний день, являясь одной из ведущих компаний на рынке промышленного оборудования и системной интеграции, мы разрабатываем и внедряем эффективные решения по оптимизации технологических процессов предприятий.</p>
      <p>Нами реализовано более 2000 крупных проектов, 219 из которых – автоматизация производственных сварочных процессов и процессов термической 3D резки на базе промышленных роботов OTC Daihen (Япония).</p>
      <p>Клиентами компании «КОНТУР» являются крупные предприятия РФ и стран СНГ, небольшие производства и частные мастерские.</p>
      <p>Наши сотрудники – команда высококвалифицированных специалистов, в том числе инженеров, конструкторов, технологов по сварке и электронщиков, обладающих уникальными профессиональными знаниями и многолетним опытом работы, необходимыми для разработки и успешной реализации проектов любой степени сложности.</p>
      <p>Наличие собственного производства позволяет компании «КОНТУР» изготавливать специализированную оснастку и металлоконструкции для автоматизации производственных процессов.</p>
      <div class="item2_layer1_yellow">
        <p><b>Основные приоритеты нашей компании</b> - индивидуальное отношение к клиенту, комплексное решение поставленных задач и высокое качество продукции, работ и услуг.</p>
      </div>
      <div class="item2_layer1_but">
        <a href="" class="btn_main_no_bg">подробнее</a>
        <a href="" class="btn_main">начать сотрудничество</a>
      </div>
    </div>
  </div>
</div>
<div class="main_reviews">
  <div class="main_reviews_item1">
    <div class="main_reviews_quotes">
      <img src="/local/templates/privarka2023/images/quotes.png" alt="" title=""/>
    </div>
    <h3>Отзывы<br>о нас</h3>
  </div>
  <div class="main_reviews_item2">
    <div class="main_black_block"></div>
    <!-- Swiper -->
    <div class="swiper mySwiperReviews">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="main_reviews_card">
            <div class="main_reviews_card_item1">
              <img src="/local/templates/privarka2023/images/stock.png" alt="" title="">
              <div class="main_reviews_card_title">
                <p>Гришатов Н.В.</p>
                <span>Директор по маркетингу и логистике “тко механика”.</span>
              </div>
            </div>
            <div class="main_reviews_card_item2">
              <div class="main_reviews_card_rating">
                <img src="/local/templates/privarka2023/images/5stars.svg" alt="" title="">
                <p>13.07.2021</p>
              </div>
            </div>
            <div class="main_reviews_card_item3">
              <p>ЗАО "ТКО Механика" выражает глубокую признательность и искреннюю благодарность ООО "Контур-97" за сотрудничество в области поставки оборудования для производства сварочных работ. Поставки оборудования, выполненные в срок, позволили нам бесперебойно осуществить свою деятельность.</p>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="main_reviews_card">
            <div class="main_reviews_card_item1">
              <img src="/local/templates/privarka2023/images/stock.png" alt="" title="">
              <div class="main_reviews_card_title">
                <p>Гришатов Н.В.</p>
                <span>Директор по маркетингу и логистике “тко механика”.</span>
              </div>
            </div>
            <div class="main_reviews_card_item2">
              <div class="main_reviews_card_rating">
                <img src="/local/templates/privarka2023/images/5stars.svg" alt="" title="">
                <p>13.07.2021</p>
              </div>
            </div>
            <div class="main_reviews_card_item3">
              <p>ЗАО "ТКО Механика" выражает глубокую признательность и искреннюю благодарность ООО "Контур-97" за сотрудничество в области поставки оборудования для производства сварочных работ. Поставки оборудования, выполненные в срок, позволили нам бесперебойно осуществить свою деятельность.</p>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="main_reviews_card">
            <div class="main_reviews_card_item1">
              <img src="/local/templates/privarka2023/images/stock.png" alt="" title="">
              <div class="main_reviews_card_title">
                <p>Гришатов Н.В.</p>
                <span>Директор по маркетингу и логистике “тко механика”.</span>
              </div>
            </div>
            <div class="main_reviews_card_item2">
              <div class="main_reviews_card_rating">
                <img src="/local/templates/privarka2023/images/5stars.svg" alt="" title="">
                <p>13.07.2021</p>
              </div>
            </div>
            <div class="main_reviews_card_item3">
              <p>ЗАО "ТКО Механика" выражает глубокую признательность и искреннюю благодарность ООО "Контур-97" за сотрудничество в области поставки оборудования для производства сварочных работ. Поставки оборудования, выполненные в срок, позволили нам бесперебойно осуществить свою деятельность.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main_contacts">
  <div class="main_contacts_adress">
    <div class="main_contacts_item1">
      <h3>Контакты</h3>
      <div class="main_contacts_adress_block">
        <div class="main_adress_block">
          <p class="bold_p">г. Москва, 5-я Магистральная улица, 8А</p>
          <p>Многоканальный: 
            <a href="tel:84951283456">8 (495) 128-34-56</a>
          </p>
          <p>Отдел крепежа: 
            <a href="tel:89055768697">8 (905) 576-86-97</a>
          </p>
          <p>Отдел продаж: 
            <a href="tel:89055768785">8 (905) 576-87-85</a>
          </p>
          <p>Отдел роботизации: 
            <a href="tel:89055768785">8 (905) 576-87-85</a>
          </p>
        </div>
        <div class="main_adress_block">
          <p class="bold_p">г. Новосибирск, ул. Петухова, 67, корпус 10</p>
          <p>Многоканальный: 
            <a href="tel:83833752597">8 (383) 375-25-97</a>
          </p>
          <p> 
            <a href="tel:83832093397">8 (383) 209-33-97</a>
          </p>
        </div>
      </div>
    </div>
    <div class="main_contacts_item2">
      <div class="main_contacts_adress_block">
        <div class="main_adress_block">
          <p class="bold_p">г. Екатеринбург, ул. Волховская, дом 20, оф. 105</p>
          <p>Многоканальный: 
            <a href="tel:83432264276">8 (343) 226-42-76</a>
          </p>
        </div>
        <div class="main_adress_block">
          <p class="bold_p">г. Санкт-Петербург, ул. Софийская, д. 66</p>
          <p>Многоканальный: 
            <a href="tel:88124932846">8 (812) 493-28-46</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="main_contacts_map">
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A941d5374fa80f699f3b45f1d4f9ceb9a25c49deff93d02bbda455f63e83c57fa&amp;source=constructor" width="100%" height="435" frameborder="0"></iframe>
  </div>
</div>
<div class="main_feedback">
  <div class="main_feedback_container">
    <div class="main_feedback_form">
        <h3>Остались вопросы или у Вас есть пожелания?</h3>
        <p>Свяжитесь с нами или оставьте свой отзыв. Нам важно Ваше мнение!</p>
        <div class="item2_layer1_but">
          <a href="" class="btn_main_no_bg">Связаться с нами</a>
          <a href="" class="btn_main">Оставить отзыв</a>
        </div>
    </div>
  </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
<script>
    var swiper = new Swiper(".mySwiperReviews", {
      slidesPerView: "auto",
      spaceBetween: 65,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      mousewheel: true,
      keyboard: true,
    });
  </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>