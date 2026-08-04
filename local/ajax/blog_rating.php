<?php
define('NO_KEEP_STATISTIC', true);
define('NO_AGENT_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

header('Content-Type: application/json; charset=utf-8');

$response = static function (array $data, int $code = 200): void {
	http_response_code($code);
	echo json_encode($data, JSON_UNESCAPED_UNICODE);
	require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';
	exit;
};

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	$response(['ok' => false, 'error' => 'method'], 405);
}

if (!check_bitrix_sessid()) {
	$response(['ok' => false, 'error' => 'sessid'], 403);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/privarka_blog_rating.php';

$articleId = (int)($_POST['articleId'] ?? $_POST['article_id'] ?? 0);
$vote = (int)($_POST['vote'] ?? 0);

if ($articleId <= 0 || $vote < 1 || $vote > 5) {
	$response(['ok' => false, 'error' => 'invalid'], 400);
}

if (!\Bitrix\Main\Loader::includeModule('iblock')) {
	$response(['ok' => false, 'error' => 'iblock'], 500);
}

$el = \CIBlockElement::GetList(
	[],
	['ID' => $articleId, 'IBLOCK_ID' => 9, 'ACTIVE' => 'Y'],
	false,
	false,
	['ID', 'IBLOCK_ID']
)->Fetch();

if (!$el) {
	$response(['ok' => false, 'error' => 'not_found'], 404);
}

$result = PrivarkaBlogRating::addVote($articleId, $vote);

if (!$result['ok']) {
	$code = ($result['error'] ?? '') === 'already_voted' ? 409 : 500;
	if ($code === 409) {
		$stats = PrivarkaBlogRating::getStats($articleId);
		$response([
			'ok' => false,
			'error' => 'already_voted',
			'average' => $stats['average'],
			'count' => $stats['count'],
			'averageFormatted' => PrivarkaBlogRating::formatAverage($stats['average']),
			'userVote' => (int)$stats['userVote'],
		], 409);
	}
	$response(['ok' => false, 'error' => $result['error'] ?? 'error'], $code);
}

$stats = PrivarkaBlogRating::getStats($articleId);

$response([
	'ok' => true,
	'average' => $result['average'],
	'count' => $result['count'],
	'averageFormatted' => PrivarkaBlogRating::formatAverage((float)$result['average']),
	'userVote' => (int)$stats['userVote'],
	'voted' => true,
]);
