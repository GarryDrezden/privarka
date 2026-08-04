<?php
/**
 * Однократно: HL-блок голосов за статьи блога.
 * https://site/local/tools/privarka_blog_hl_rating.php
 */
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

if (!$GLOBALS['USER']->IsAdmin()) {
	header('HTTP/1.0 403 Forbidden');
	die('Access denied');
}

if (!\Bitrix\Main\Loader::includeModule('highloadblock')) {
	die('highloadblock module required');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/privarka_blog_rating.php';

$tableName = PrivarkaBlogRating::HL_TABLE;
$hlName = 'PrivarkaBlogVote';

$existing = \Bitrix\Highloadblock\HighloadBlockTable::getList([
	'filter' => ['=TABLE_NAME' => $tableName],
])->fetch();

if ($existing) {
	\COption::SetOptionString('main', PrivarkaBlogRating::OPTION_HL_ID, (string)$existing['ID']);
	echo 'OK: HL уже существует, ID=' . (int)$existing['ID'];
	require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';
	return;
}

$add = \Bitrix\Highloadblock\HighloadBlockTable::add([
	'NAME' => $hlName,
	'TABLE_NAME' => $tableName,
]);

if (!$add->isSuccess()) {
	die('HL create error: ' . implode(', ', $add->getErrorMessages()));
}

$hlId = (int)$add->getId();
\COption::SetOptionString('main', PrivarkaBlogRating::OPTION_HL_ID, (string)$hlId);

$uf = new \CUserTypeEntity();

$fields = [
	['FIELD_NAME' => 'UF_ARTICLE_ID', 'USER_TYPE_ID' => 'integer', 'XML_ID' => 'UF_ARTICLE_ID', 'SORT' => 100, 'MANDATORY' => 'Y', 'EDIT_FORM_LABEL' => ['ru' => 'ID статьи']],
	['FIELD_NAME' => 'UF_VOTE', 'USER_TYPE_ID' => 'integer', 'XML_ID' => 'UF_VOTE', 'SORT' => 110, 'MANDATORY' => 'Y', 'EDIT_FORM_LABEL' => ['ru' => 'Оценка 1-5']],
	['FIELD_NAME' => 'UF_FINGERPRINT', 'USER_TYPE_ID' => 'string', 'XML_ID' => 'UF_FINGERPRINT', 'SORT' => 120, 'MANDATORY' => 'Y', 'EDIT_FORM_LABEL' => ['ru' => 'Отпечаток посетителя']],
	['FIELD_NAME' => 'UF_DATE', 'USER_TYPE_ID' => 'datetime', 'XML_ID' => 'UF_DATE', 'SORT' => 130, 'MANDATORY' => 'N', 'EDIT_FORM_LABEL' => ['ru' => 'Дата']],
];

foreach ($fields as $f) {
	$uf->Add(array_merge([
		'ENTITY_ID' => 'HLBLOCK_' . $hlId,
		'MULTIPLE' => 'N',
		'SHOW_FILTER' => 'Y',
		'SHOW_IN_LIST' => 'Y',
	], $f));
}

echo 'OK: HL создан, ID=' . $hlId . ', таблица ' . $tableName;

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';
