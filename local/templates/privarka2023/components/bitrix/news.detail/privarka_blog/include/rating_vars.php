<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/privarka_blog_rating.php';

$privarkaBlogArticleId = (int)($arResult['ID'] ?? 0);
$privarkaBlogRating = PrivarkaBlogRating::getStats($privarkaBlogArticleId);
$privarkaBlogRatingCnt = (int)($privarkaBlogRating['count'] ?? 0);
$privarkaBlogRatingFmt = PrivarkaBlogRating::formatAverage((float)($privarkaBlogRating['average'] ?? 0));
$privarkaBlogRatingUserVoted = !empty($privarkaBlogRating['userVoted']);
$privarkaBlogRatingUserVote = (int)($privarkaBlogRating['userVote'] ?? 0);
