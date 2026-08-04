# Privarka — контекст проекта для быстрого входа

Краткая карта кодовой базы **1C-Bitrix** (сайт «Контур» / приварной крепёж). Шаблон: **`local/templates/privarka2023/`**.

Обновляйте файл при существенных изменениях структуры или маршрутов.

---

## Платформа

- Ядро: `/bitrix/` (может отсутствовать в git).
- Кастомизация: **`/local/`**, шаблон сайта **`local/templates/privarka2023/`**.
- ЧПУ: `.htaccess` → несуществующие пути → **`urlrewrite.php`**.
- Глобальный хук: **`local/php_interface/init.php`** — `OnEndBufferContent`, добавляет `defer` выбранным `<script>`.

---

## Ключевые URL и точки входа

| Назначение | Файл | Компонент (шаблон) |
|------------|------|---------------------|
| Главная | `index.php` | `bitrix:catalog.top` → **template1**, баннер, ссылки на ветки каталога |
| Каталог | `catalog/index.php` | На точном `/catalog/` — только блоки-ссылки; иначе **`bitrix:catalog`** → **new_catalog_template** |
| Поиск | `search/index.php` | **`bitrix:catalog.search`** → **privarka-k97** |
| Корзина | `basket/index.php` | **`bitrix:sale.basket.basket`** → **new_basket_template** |
| ЛК | `personal/index.php` | **`bitrix:sale.personal.section`** → **privarka-k97** |
| Оформление заказа | `personal/order/make/index.php` | **`bitrix:sale.order.checkout`** → **privarka-k97** (`sale.order.ajax` рядом закомментирован) |
| Новости компании | `company/news/index.php` | **`bitrix:news`** → **flat1** |
| Акции | `actions/index.php` | **`bitrix:news`** → **sale-new** |
| Блог | `blog/index.php` | **`bitrix:news`** → **flat2** |
| Авторизация | `auth/index.php` (см. `urlrewrite.php`) | `system.auth.*` в шаблоне |

Разделы **`/krepezh/`**, **`/oborudovanie/`** в дереве репозитория как папок нет — на проде это может быть ЧПУ каталога, симлинки или настройки вне снимка.

---

## Каталог: кастомные шаблоны (где править витрину)

Путь: `local/templates/privarka2023/components/bitrix/`

| Область | Папка / шаблон |
|---------|----------------|
| Оболочка каталога | `catalog/new_catalog_template`, `catalog/default-privarka` |
| Список раздела | `catalog.section/privarka-default-section` |
| Список в поиске | `catalog.section/privarka-default-search` |
| Карточка товара | `catalog.element/privarka-element` |
| Плитка/строка в списке | `catalog.item/privarka_item` |
| Умный фильтр | `catalog.smart.filter/privarka_filter` |
| Поиск (оформление) | `catalog.search/privarka-k97` |
| Топ на главной | `catalog.top/template1` |

---

## Поиск в интерфейсе

- Кастомный поиск: **`atum:smartsearch`** — `local/templates/privarka2023/components/atum/smartsearch/` (в т.ч. `mobile`, `template2`).

---

## Шаблон `privarka2023`

- **`header.php`** — jQuery, Bootstrap 5, Popper, маски, `styles.css`, `css/main-style.css`, Jivo, Яндекс.Метрика (`ecommerce: "dataLayer"`).
- **Регионы**: инфоблок **ID 5**, cookie **`region`**, значение по умолчанию **5518** — телефон, email, адрес, время для шапки/футера.
- **`includes/`** — много тематических PHP-включаемых (номенклатура крепежа).
- Регистрация/профиль: `main.register` (fiz_face, ur_face), `main.profile`, `system.auth.*`; фрагмент `aspro/auth.priority`.

---

## Служебное

- **`ajax/`** — формы, `analytics_proxy.php`.
- **`local/tools/privarka_blog_iblock9_properties.php`** — утилита под свойства блога (ИБ 9).

### Блог (`/blog/`, ИБ 9)

- Точка входа: **`blog/index.php`** — `bitrix:news` / **flat2**, `DETAIL_PROPERTY_CODE`; рейтинг из HL (`PrivarkaBlogRating`), **`USE_RATING` = N`** (без свойств `RATING_VALUE` / `RATING_COUNT`).
- Детальная: **`news/flat2/detail.php`** → **`bitrix:news.detail`** / **`privarka_blog`**.
- Шаблон статьи: **`local/templates/privarka2023/components/bitrix/news.detail/privarka_blog/`** (`template.php`, `style.css`, `script.js`, **`result_modifier.php`** — FAQ, плейсхолдеры `[[STAGING_TYPES]]` / `[[MID_PROMO]]`, JSON-LD Article / BreadcrumbList / Organization / FAQPage / AggregateRating).
- Инструкция для контент-менеджера: **`docs/BLOG_CONTENT_MANAGER.md`**.
- **`clear_cache.php`**, **`test.php`**, **`tests/`** — отладка/тесты.
- **`hvr-mag-layout/`** — отдельная статическая вёрстка, не обязательно связана с Bitrix.

---

## Идентификаторы из кода (проверять в админке при расхождениях)

- Каталог: **`IBLOCK_ID` = 1**, тип **`catalog`**.
- Регионы: **ИБ 5**.

---

## `urlrewrite.php` (фрагмент смысла)

Правила для `/personal/`, `/actions/`, `/company/news/`, `/auth/`, сервисов `rest`, `ymarket`, `mobileapp`; остальное — см. полный файл в корне сайта.

---

## Быстрый чеклист задач

| Задача | Куда смотреть |
|--------|----------------|
| Главная, баннер, топ товаров | `index.php`, `catalog.top/template1` |
| Список/фильтр каталога | `catalog.section/privarka-default-*`, `catalog.smart.filter/privarka_filter` |
| Карточка товара | `catalog.element/privarka-element` |
| Строка корзины в шапке / корзина | `basket/`, `sale.basket.basket/new_basket_template` |
| Оформление, оплата, доставка | `personal/order/make/`, `sale.order.checkout/privarka-k97` |
| ЛК, заказы | `personal/`, `sale.personal.section/privarka-k97` |
| Поиск по товарам | `search/`, `catalog.search/privarka-k97`, `atum/smartsearch` |
| Новости компании, акции | `company/news/`, `actions/` — `bitrix:news` (не flat2) |
| Блог (статья, SEO, FAQ) | `blog/`, `news.detail/privarka_blog/`, `news/flat2/detail.php` |
| Глобальные скрипты страницы | `local/php_interface/init.php` |
