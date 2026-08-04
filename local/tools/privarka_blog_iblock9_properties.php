<?php
/**
 * Однократный скрипт: свойства инфоблока блога (ID=9) для шаблона privarka_blog.
 * Запуск: из браузера под администратором https://site/local/tools/privarka_blog_iblock9_properties.php
 */
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

if (!$GLOBALS['USER']->IsAdmin()) {
	header('HTTP/1.0 403 Forbidden');
	die('Access denied');
}

if (!\Bitrix\Main\Loader::includeModule('iblock')) {
	die('iblock module');
}

$iblockId = 9;

$ensure = static function (int $iblockId, array $fields) use (&$ensure): int {
	$res = CIBlockProperty::GetList([], ['IBLOCK_ID' => $iblockId, 'CODE' => $fields['CODE']]);
	if ($row = $res->Fetch()) {
		return (int)$row['ID'];
	}
	$ibp = new CIBlockProperty();
	$id = (int)$ibp->Add(array_merge(['IBLOCK_ID' => $iblockId], $fields));
	return $id;
};

// Мета и рейтинг
$ensure($iblockId, [
	'NAME' => 'Время чтения',
	'ACTIVE' => 'Y',
	'SORT' => 100,
	'CODE' => 'READING_TIME',
	'PROPERTY_TYPE' => 'S',
	'ROW_COUNT' => 1,
]);

// Устаревшие ручные поля рейтинга — отключаем (рейтинг только из HL / голосования посетителей).
$deactivateProperty = static function (int $iblockId, string $code) {
	$res = CIBlockProperty::GetList([], ['IBLOCK_ID' => $iblockId, 'CODE' => $code]);
	if ($row = $res->Fetch()) {
		$ibp = new CIBlockProperty();
		$ibp->Update((int)$row['ID'], ['ACTIVE' => 'N']);
	}
};

foreach (['RATING', 'RATING_VALUE', 'RATING_COUNT', 'RATING_SUM', 'RATING_TOTAL'] as $legacyCode) {
	$deactivateProperty($iblockId, $legacyCode);
}

$legacyNameNeedles = ['Рейтинг', 'Средняя оценка', 'Число оценок', 'Сумма оценок'];
$res = CIBlockProperty::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => $iblockId]);
while ($row = $res->Fetch()) {
	foreach ($legacyNameNeedles as $needle) {
		if (mb_stripos((string)$row['NAME'], $needle) !== false) {
			$ibp = new CIBlockProperty();
			$ibp->Update((int)$row['ID'], ['ACTIVE' => 'N']);
			break;
		}
	}
}

// Эксперт / автор
$ensure($iblockId, [
	'NAME' => 'Мнение эксперта (HTML)',
	'ACTIVE' => 'Y',
	'SORT' => 200,
	'CODE' => 'EXPERT_QUOTE',
	'PROPERTY_TYPE' => 'S',
	'USER_TYPE' => 'HTML',
]);

$ensure($iblockId, [
	'NAME' => 'Автор: ФИО',
	'ACTIVE' => 'Y',
	'SORT' => 210,
	'CODE' => 'AUTHOR_NAME',
	'PROPERTY_TYPE' => 'S',
]);

$ensure($iblockId, [
	'NAME' => 'Автор: должность',
	'ACTIVE' => 'Y',
	'SORT' => 220,
	'CODE' => 'AUTHOR_JOB',
	'PROPERTY_TYPE' => 'S',
]);

$ensure($iblockId, [
	'NAME' => 'Автор: фото',
	'ACTIVE' => 'Y',
	'SORT' => 230,
	'CODE' => 'AUTHOR_PHOTO',
	'PROPERTY_TYPE' => 'F',
]);

$ensure($iblockId, [
	'NAME' => 'Кнопка CTA: текст',
	'ACTIVE' => 'Y',
	'SORT' => 240,
	'CODE' => 'AUTHOR_CTA_TEXT',
	'PROPERTY_TYPE' => 'S',
]);

$ensure($iblockId, [
	'NAME' => 'Кнопка CTA: ссылка',
	'ACTIVE' => 'Y',
	'SORT' => 250,
	'CODE' => 'AUTHOR_CTA_LINK',
	'PROPERTY_TYPE' => 'S',
]);

$ensure($iblockId, [
	'NAME' => 'Материал проверен',
	'ACTIVE' => 'Y',
	'SORT' => 260,
	'CODE' => 'MATERIAL_VERIFIED',
	'PROPERTY_TYPE' => 'L',
	'LIST_TYPE' => 'C',
	'MULTIPLE' => 'N',
	'VALUES' => [
		'n0' => ['VALUE' => 'Да', 'DEF' => 'N', 'SORT' => 100, 'XML_ID' => 'Y'],
	],
]);

// Вставки
$ensure($iblockId, [
	'NAME' => 'Виды стейджинга (HTML, вкладки)',
	'ACTIVE' => 'Y',
	'SORT' => 300,
	'CODE' => 'STAGING_TYPES',
	'PROPERTY_TYPE' => 'S',
	'USER_TYPE' => 'HTML',
]);

$ensure($iblockId, [
	'NAME' => 'Промо: заголовок',
	'ACTIVE' => 'Y',
	'SORT' => 310,
	'CODE' => 'MID_ARTICLE_PROMO_TITLE',
	'PROPERTY_TYPE' => 'S',
]);

$ensure($iblockId, [
	'NAME' => 'Промо: текст',
	'ACTIVE' => 'Y',
	'SORT' => 320,
	'CODE' => 'MID_ARTICLE_PROMO_TEXT',
	'PROPERTY_TYPE' => 'S',
	'USER_TYPE' => 'HTML',
]);

$ensure($iblockId, [
	'NAME' => 'Промо: ссылка',
	'ACTIVE' => 'Y',
	'SORT' => 330,
	'CODE' => 'MID_ARTICLE_PROMO_LINK',
	'PROPERTY_TYPE' => 'S',
]);

$ensure($iblockId, [
	'NAME' => 'Промо: изображение',
	'ACTIVE' => 'Y',
	'SORT' => 340,
	'CODE' => 'MID_ARTICLE_PROMO_IMAGE',
	'PROPERTY_TYPE' => 'F',
]);

// Связи
$ensure($iblockId, [
	'NAME' => 'Связанные статьи',
	'ACTIVE' => 'Y',
	'SORT' => 400,
	'CODE' => 'RELATED_ARTICLES',
	'PROPERTY_TYPE' => 'E',
	'MULTIPLE' => 'Y',
	'LINK_IBLOCK_ID' => $iblockId,
]);

$ensure($iblockId, [
	'NAME' => 'Источники (HTML)',
	'ACTIVE' => 'Y',
	'SORT' => 410,
	'CODE' => 'SOURCES',
	'PROPERTY_TYPE' => 'S',
	'USER_TYPE' => 'HTML',
]);

// FAQ
$ensure($iblockId, [
	'NAME' => 'FAQ: вопрос',
	'ACTIVE' => 'Y',
	'SORT' => 500,
	'CODE' => 'FAQ_QUESTION',
	'PROPERTY_TYPE' => 'S',
	'MULTIPLE' => 'Y',
	'ROW_COUNT' => 2,
]);

$ensure($iblockId, [
	'NAME' => 'FAQ: ответ',
	'ACTIVE' => 'Y',
	'SORT' => 510,
	'CODE' => 'FAQ_ANSWER',
	'PROPERTY_TYPE' => 'S',
	'USER_TYPE' => 'HTML',
	'MULTIPLE' => 'Y',
]);

// Баннер контактов в тексте статьи
$ensure($iblockId, [
	'NAME' => 'Показывать баннер контактов',
	'ACTIVE' => 'Y',
	'SORT' => 600,
	'CODE' => 'CONTACT_BANNER_SHOW',
	'PROPERTY_TYPE' => 'L',
	'LIST_TYPE' => 'C',
	'MULTIPLE' => 'N',
	'VALUES' => [
		'n0' => ['VALUE' => 'Да', 'DEF' => 'N', 'SORT' => 100, 'XML_ID' => 'Y'],
	],
]);

$ensure($iblockId, [
	'NAME' => 'Баннер контактов: HTML',
	'ACTIVE' => 'Y',
	'SORT' => 610,
	'CODE' => 'CONTACT_BANNER_HTML',
	'PROPERTY_TYPE' => 'S',
	'USER_TYPE' => 'HTML',
]);

$ensure($iblockId, [
	'NAME' => 'Баннер контактов: текст кнопки',
	'ACTIVE' => 'Y',
	'SORT' => 620,
	'CODE' => 'CONTACT_BANNER_BTN_TEXT',
	'PROPERTY_TYPE' => 'S',
]);

$ensure($iblockId, [
	'NAME' => 'Баннер контактов: ссылка кнопки',
	'ACTIVE' => 'Y',
	'SORT' => 630,
	'CODE' => 'CONTACT_BANNER_BTN_LINK',
	'PROPERTY_TYPE' => 'S',
]);

echo 'OK: свойства инфоблока ' . $iblockId . ' проверены/созданы. ';
echo 'Ручные поля рейтинга (RATING*, Средняя оценка, Число/Сумма оценок) отключены — рейтинг на сайте из голосов посетителей (HL). ';
echo 'Подсказка: в DETAIL_TEXT вставляйте маркеры [[STAGING_TYPES]] и [[MID_PROMO]] для блоков из свойств.';
