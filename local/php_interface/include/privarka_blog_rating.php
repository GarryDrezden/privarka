<?php

/**
 * Рейтинг статей блога через Highload-блок.
 */
class PrivarkaBlogRating
{
	public const HL_TABLE = 'privarka_blog_vote';
	public const OPTION_HL_ID = 'privarka_blog_vote_hl_id';
	public const COOKIE_FP = 'blog_vote_fp';

	public static function getHlId(): int
	{
		static $hlId = null;
		if ($hlId !== null) {
			return $hlId;
		}

		$hlId = (int)\COption::GetOptionString('main', self::OPTION_HL_ID, '0');
		if ($hlId > 0) {
			return $hlId;
		}

		if (!\Bitrix\Main\Loader::includeModule('highloadblock')) {
			return 0;
		}

		$row = \Bitrix\Highloadblock\HighloadBlockTable::getList([
			'filter' => ['=TABLE_NAME' => self::HL_TABLE],
			'select' => ['ID'],
			'limit' => 1,
		])->fetch();

		$hlId = $row ? (int)$row['ID'] : 0;
		if ($hlId > 0) {
			\COption::SetOptionString('main', self::OPTION_HL_ID, (string)$hlId);
		}

		return $hlId;
	}

	public static function getHlRow(): ?array
	{
		$hlId = self::getHlId();
		if ($hlId <= 0 || !\Bitrix\Main\Loader::includeModule('highloadblock')) {
			return null;
		}

		$hl = \Bitrix\Highloadblock\HighloadBlockTable::getById($hlId)->fetch();

		return $hl ?: null;
	}

	public static function getDataClass(): ?string
	{
		$hl = self::getHlRow();
		if (!$hl) {
			return null;
		}

		$entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hl);

		return $entity->getDataClass();
	}

	/**
	 * Чтение голосов напрямую из таблицы HL (fallback, если ORM не отдаёт UF_*).
	 *
	 * @return list<array{UF_VOTE: int, UF_FINGERPRINT: string}>
	 */
	protected static function fetchVoteRows(int $articleId): array
	{
		$articleId = (int)$articleId;
		if ($articleId <= 0) {
			return [];
		}

		$rows = [];
		$dataClass = self::getDataClass();
		if ($dataClass) {
			$orm = $dataClass::getList([
				'filter' => ['UF_ARTICLE_ID' => $articleId],
				'select' => ['ID', 'UF_VOTE', 'UF_FINGERPRINT'],
			]);
			while ($row = $orm->fetch()) {
				$rows[] = [
					'UF_VOTE' => (int)($row['UF_VOTE'] ?? 0),
					'UF_FINGERPRINT' => (string)($row['UF_FINGERPRINT'] ?? ''),
				];
			}
		}

		if ($rows !== []) {
			return $rows;
		}

		$hl = self::getHlRow();
		if (!$hl || empty($hl['TABLE_NAME'])) {
			return [];
		}

		$connection = \Bitrix\Main\Application::getConnection();
		$sqlHelper = $connection->getSqlHelper();
		$tableSql = method_exists($sqlHelper, 'quote')
			? $sqlHelper->quote($hl['TABLE_NAME'])
			: '`' . str_replace('`', '', $hl['TABLE_NAME']) . '`';
		$res = $connection->query(
			'SELECT UF_VOTE, UF_FINGERPRINT FROM ' . $tableSql . ' WHERE UF_ARTICLE_ID = ' . $articleId
		);

		while ($row = $res->fetch()) {
			$rows[] = [
				'UF_VOTE' => (int)($row['UF_VOTE'] ?? 0),
				'UF_FINGERPRINT' => (string)($row['UF_FINGERPRINT'] ?? ''),
			];
		}

		return $rows;
	}

	public static function getFingerprint(): string
	{
		$cookie = (string)($_COOKIE[self::COOKIE_FP] ?? '');
		if ($cookie === '' || !preg_match('/^[a-f0-9]{32,64}$/i', $cookie)) {
			$cookie = bin2hex(random_bytes(16));
			setcookie(self::COOKIE_FP, $cookie, [
				'expires' => time() + 365 * 86400,
				'path' => '/',
				'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
				'httponly' => true,
				'samesite' => 'Lax',
			]);
			$_COOKIE[self::COOKIE_FP] = $cookie;
		}

		$ip = (string)($_SERVER['REMOTE_ADDR'] ?? '');
		$ua = (string)($_SERVER['HTTP_USER_AGENT'] ?? '');

		return hash('sha256', $cookie . '|' . $ip . '|' . $ua);
	}

	/**
	 * @return array{average: float, count: int, userVoted: bool, userVote: int}
	 */
	public static function getStats(int $articleId, ?string $fingerprint = null): array
	{
		$result = [
			'average' => 0.0,
			'count' => 0,
			'userVoted' => false,
			'userVote' => 0,
		];

		if ($articleId <= 0) {
			return $result;
		}

		if (self::getHlId() <= 0) {
			return $result;
		}

		$fp = $fingerprint ?? self::getFingerprint();
		$voteRows = self::fetchVoteRows($articleId);

		$sum = 0;
		$cnt = 0;
		foreach ($voteRows as $row) {
			$vote = (int)($row['UF_VOTE'] ?? 0);
			if ($vote < 1 || $vote > 5) {
				continue;
			}
			$sum += $vote;
			$cnt++;
			if ($fp !== '' && (string)($row['UF_FINGERPRINT'] ?? '') === $fp) {
				$result['userVoted'] = true;
				$result['userVote'] = $vote;
			}
		}

		$result['count'] = $cnt;
		$result['average'] = $cnt > 0 ? round($sum / $cnt, 2) : 0.0;

		return $result;
	}

	/**
	 * @return array{ok: bool, error?: string, average?: float, count?: int, voted?: bool}
	 */
	public static function addVote(int $articleId, int $vote, ?string $fingerprint = null): array
	{
		if ($articleId <= 0 || $vote < 1 || $vote > 5) {
			return ['ok' => false, 'error' => 'invalid'];
		}

		$dataClass = self::getDataClass();
		if (!$dataClass) {
			return ['ok' => false, 'error' => 'hl'];
		}

		$fp = $fingerprint ?? self::getFingerprint();
		$existing = $dataClass::getList([
			'filter' => [
				'=UF_ARTICLE_ID' => $articleId,
				'=UF_FINGERPRINT' => $fp,
			],
			'select' => ['ID'],
			'limit' => 1,
		])->fetch();

		if ($existing) {
			return ['ok' => false, 'error' => 'already_voted'];
		}

		$add = $dataClass::add([
			'UF_ARTICLE_ID' => $articleId,
			'UF_VOTE' => $vote,
			'UF_FINGERPRINT' => $fp,
			'UF_DATE' => new \Bitrix\Main\Type\DateTime(),
		]);

		if (!$add->isSuccess()) {
			return ['ok' => false, 'error' => 'save'];
		}

		$stats = self::getStats($articleId, $fp);

		return [
			'ok' => true,
			'average' => $stats['average'],
			'count' => $stats['count'],
			'voted' => true,
		];
	}

	public static function formatAverage(float $avg): string
	{
		return number_format($avg, 1, ',', '');
	}
}
