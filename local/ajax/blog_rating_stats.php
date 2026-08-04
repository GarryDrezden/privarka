<?php
define('NO_KEEP_STATISTIC', true);
define('NO_AGENT_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

header('Content-Type: application/json; charset=utf-8');

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/privarka_blog_rating.php';

$articleId = (int)($_GET['articleId'] ?? $_GET['article_id'] ?? 0);

if ($articleId <= 0) {
	echo json_encode(['ok' => false, 'error' => 'invalid'], JSON_UNESCAPED_UNICODE);
	require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';
	exit;
}

$stats = PrivarkaBlogRating::getStats($articleId);

echo json_encode([
	'ok' => true,
	'average' => $stats['average'],
	'count' => $stats['count'],
	'averageFormatted' => PrivarkaBlogRating::formatAverage((float)$stats['average']),
	'userVoted' => !empty($stats['userVoted']),
	'userVote' => (int)$stats['userVote'],
	'hlReady' => PrivarkaBlogRating::getHlId() > 0,
], JSON_UNESCAPED_UNICODE);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';
