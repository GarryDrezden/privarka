<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

/** @var CBitrixComponentTemplate $this */
/** @var array $arResult */
/** @var array $arParams */

global $APPLICATION;

IncludeTemplateLangFile(__DIR__ . '/template.php');

if (!function_exists('privarkaBlogNormalizePropValue')) {
	/**
	 * Строка свойства ИБ: для HTML — массив с ключом TEXT.
	 *
	 * @param mixed $v
	 */
	function privarkaBlogNormalizePropValue($v): string
	{
		if ($v === null || $v === false || $v === '') {
			return '';
		}
		if (is_array($v)) {
			if (isset($v['~TEXT']) && (is_string($v['~TEXT']) || is_numeric($v['~TEXT']))) {
				return trim((string)$v['~TEXT']);
			}
			if (isset($v['TEXT']) && (is_string($v['TEXT']) || is_numeric($v['TEXT']))) {
				return trim((string)$v['TEXT']);
			}
			if (array_key_exists('~VALUE', $v)) {
				return privarkaBlogNormalizePropValue($v['~VALUE']);
			}
			if (array_key_exists('VALUE', $v)) {
				return privarkaBlogNormalizePropValue($v['VALUE']);
			}
			$parts = [];
			foreach ($v as $part) {
				$t = privarkaBlogNormalizePropValue($part);
				if ($t !== '') {
					$parts[] = $t;
				}
			}

			return trim(implode('', $parts));
		}

		return trim((string)$v);
	}
}

if (!function_exists('privarkaBlogStripDuplicateH1')) {
	function privarkaBlogStripDuplicateH1(string $html, string $articleName = ''): string
	{
		if ($html === '') {
			return $html;
		}

		$articleNameNorm = trim(htmlspecialchars_decode(strip_tags($articleName), ENT_QUOTES));

		return preg_replace_callback(
			'/<h1(\s[^>]*)?>(.*?)<\/h1>/isu',
			static function (array $m) use ($articleNameNorm) {
				$inner = trim(htmlspecialchars_decode(strip_tags($m[2]), ENT_QUOTES));
				if ($articleNameNorm !== '' && $inner === $articleNameNorm) {
					return '';
				}

				return '<h2' . ($m[1] ?? '') . '>' . $m[2] . '</h2>';
			},
			$html,
			1
		) ?? $html;
	}
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/privarka_blog_rating.php';

/*TAGS*/
if ($arParams['SEARCH_PAGE']) {
	if ($arResult['FIELDS'] && isset($arResult['FIELDS']['TAGS'])) {
		$tags = [];
		foreach (explode(',', $arResult['FIELDS']['TAGS']) as $tag) {
			$tag = trim($tag, " \t\n\r");
			if ($tag) {
				$url = CHTTP::urlAddParams(
					$arParams['SEARCH_PAGE'],
					['tags' => $tag],
					['encode' => true]
				);
				$tags[] = '<a href="' . $url . '">' . $tag . '</a>';
			}
		}
		$arResult['FIELDS']['TAGS'] = implode(', ', $tags);
	}
}

/*VIDEO & AUDIO*/
$mediaProperty = trim($arParams['MEDIA_PROPERTY']);
if ($mediaProperty) {
	if (is_numeric($mediaProperty)) {
		$propertyFilter = ['ID' => $mediaProperty];
	} else {
		$propertyFilter = ['CODE' => $mediaProperty];
	}

	$elementIndex = [];
	$elementIndex[$arResult['ID']] = ['PROPERTIES' => []];

	CIBlockElement::GetPropertyValuesArray($elementIndex, $arResult['IBLOCK_ID'], [
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'ID' => $arResult['ID'],
	], $propertyFilter);

	foreach ($elementIndex as $idx) {
		foreach ($idx['PROPERTIES'] as $property) {
			$url = '';
			if ($property['MULTIPLE'] == 'Y' && $property['VALUE']) {
				$url = current($property['VALUE']);
			}
			if ($property['MULTIPLE'] == 'N' && $property['VALUE']) {
				$url = $property['VALUE'];
			}

			if (preg_match('/(?:youtube\\.com|youtu\\.be).*?[\\?\\&]v=([^\\?\\&]+)/i', $url, $matches)) {
				$arResult['VIDEO'] = 'https://www.youtube.com/embed/' . $matches[1] . '/?rel=0&controls=0showinfo=0';
			} elseif (preg_match('/(?:vimeo\\.com)\\/([0-9]+)/i', $url, $matches)) {
				$arResult['VIDEO'] = 'https://player.vimeo.com/video/' . $matches[1];
			} elseif (preg_match('/(?:rutube\\.ru).*?\\/video\\/([0-9a-f]+)/i', $url, $matches)) {
				$arResult['VIDEO'] = 'http://rutube.ru/video/embed/' . $matches[1] . '?sTitle=false&sAuthor=false';
			} elseif (preg_match('/(?:soundcloud\\.com)/i', $url)) {
				$arResult['SOUND_CLOUD'] = $url;
			}
		}
	}
}

/*SLIDER*/
$sliderProperty = trim($arParams['SLIDER_PROPERTY']);
if ($sliderProperty) {
	if (is_numeric($sliderProperty)) {
		$propertyFilter = ['ID' => $sliderProperty];
	} else {
		$propertyFilter = ['CODE' => $sliderProperty];
	}

	$elementIndex = [];
	$elementIndex[$arResult['ID']] = ['PROPERTIES' => []];

	CIBlockElement::GetPropertyValuesArray($elementIndex, $arResult['IBLOCK_ID'], [
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'ID' => $arResult['ID'],
	], $propertyFilter);

	foreach ($elementIndex as $idx) {
		foreach ($idx['PROPERTIES'] as $property) {
			$files = [];
			if ($property['MULTIPLE'] == 'Y' && $property['VALUE']) {
				$files = $property['VALUE'];
			}
			if ($property['MULTIPLE'] == 'N' && $property['VALUE']) {
				$files = [$property['VALUE']];
			}

			if ($files) {
				$arResult['SLIDER'] = [];
				foreach ($files as $fileId) {
					$file = CFile::GetFileArray($fileId);
					if ($file && $file['WIDTH'] > 0 && $file['HEIGHT'] > 0) {
						$arResult['SLIDER'][] = $file;
					}
				}
			}
		}
	}
}

/* THEME */
$arParams['TEMPLATE_THEME'] = trim($arParams['TEMPLATE_THEME']);
if ($arParams['TEMPLATE_THEME'] != '') {
	$arParams['TEMPLATE_THEME'] = preg_replace('/[^a-zA-Z0-9_\-\(\)\!]/', '', $arParams['TEMPLATE_THEME']);
	if ($arParams['TEMPLATE_THEME'] == 'site') {
		$templateId = COption::GetOptionString('main', 'wizard_template_id', 'eshop_bootstrap', SITE_ID);
		$templateId = (preg_match('/^eshop_adapt/', $templateId)) ? 'eshop_adapt' : $templateId;
		$arParams['TEMPLATE_THEME'] = COption::GetOptionString('main', 'wizard_' . $templateId . '_theme_id', 'blue', SITE_ID);
	}
	if ($arParams['TEMPLATE_THEME'] != '') {
		if (!is_file($_SERVER['DOCUMENT_ROOT'] . $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css')) {
			$arParams['TEMPLATE_THEME'] = '';
		}
	}
}
if ($arParams['TEMPLATE_THEME'] == '') {
	$arParams['TEMPLATE_THEME'] = 'blue';
}

/* --- Блог: FAQ, связанные, плейсхолдеры, JSON-LD --- */

$arResult['BLOG_FAQ'] = [];
$qRaw = $arResult['PROPERTIES']['FAQ_QUESTION']['~VALUE'] ?? $arResult['PROPERTIES']['FAQ_QUESTION']['VALUE'] ?? null;
$aRaw = $arResult['PROPERTIES']['FAQ_ANSWER']['~VALUE'] ?? $arResult['PROPERTIES']['FAQ_ANSWER']['VALUE'] ?? null;
$questions = is_array($qRaw) ? $qRaw : ($qRaw !== null && $qRaw !== '' ? [$qRaw] : []);
$answers = is_array($aRaw) ? $aRaw : ($aRaw !== null && $aRaw !== '' ? [$aRaw] : []);
$n = min(count($questions), count($answers));
for ($i = 0; $i < $n; $i++) {
	$q = privarkaBlogNormalizePropValue($questions[$i] ?? '');
	$a = privarkaBlogNormalizePropValue($answers[$i] ?? '');
	if ($q === '' || $a === '') {
		continue;
	}
	$arResult['BLOG_FAQ'][] = ['q' => $q, 'a' => $a];
}

$articleId = (int)($arResult['ID'] ?? 0);
$arResult['BLOG_RATING'] = PrivarkaBlogRating::getStats($articleId);

$host = defined('SITE_SERVER_NAME') && SITE_SERVER_NAME ? SITE_SERVER_NAME : ($_SERVER['HTTP_HOST'] ?? 'localhost');
$proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$base = $proto . '://' . $host;

$abs = static function ($path) use ($base) {
	$path = (string)$path;
	if ($path === '') {
		return '';
	}
	if (preg_match('#^https?://#i', $path)) {
		return $path;
	}
	return $base . $path;
};

/* Плейсхолдеры в тексте */
$detailKey = $arResult['NAV_RESULT'] ? 'NAV_TEXT' : 'DETAIL_TEXT';
$body = $arResult[$detailKey] ?? '';

$stagingInner = '';
if (!empty($arResult['DISPLAY_PROPERTIES']['STAGING_TYPES']['DISPLAY_VALUE'])) {
	$stagingInner = '<div class="privarka-blog-staging-inner">' . $arResult['DISPLAY_PROPERTIES']['STAGING_TYPES']['DISPLAY_VALUE'] . '</div>';
	$stagingWrapped = '<div class="privarka-blog-staging-tabs" data-privarka-staging>' . $stagingInner . '</div>';
} else {
	$stagingWrapped = '';
}

$promoTitle = trim((string)($arResult['DISPLAY_PROPERTIES']['MID_ARTICLE_PROMO_TITLE']['DISPLAY_VALUE'] ?? ''));
$promoText = (string)($arResult['DISPLAY_PROPERTIES']['MID_ARTICLE_PROMO_TEXT']['DISPLAY_VALUE'] ?? '');
$promoLink = trim((string)($arResult['DISPLAY_PROPERTIES']['MID_ARTICLE_PROMO_LINK']['DISPLAY_VALUE'] ?? ''));
$promoImgId = $arResult['PROPERTIES']['MID_ARTICLE_PROMO_IMAGE']['VALUE'] ?? '';
$promoImgSrc = '';
if ($promoImgId) {
	$f = CFile::GetFileArray($promoImgId);
	if ($f && $f['SRC']) {
		$promoImgSrc = $abs($f['SRC']);
	}
}

$promoWrapped = '';
if ($promoTitle !== '' || $promoText !== '' || $promoLink !== '' || $promoImgSrc !== '') {
	ob_start();
	?>
	<div class="privarka-blog-promo">
		<?php if ($promoImgSrc): ?>
			<div class="privarka-blog-promo__img"><img src="<?= htmlspecialcharsbx($promoImgSrc) ?>" alt="" loading="lazy"/></div>
		<?php endif; ?>
		<div class="privarka-blog-promo__body">
			<?php if ($promoTitle !== ''): ?>
				<div class="privarka-blog-promo__title"><?= htmlspecialcharsbx($promoTitle) ?></div>
			<?php endif; ?>
			<?php if ($promoText !== ''): ?>
				<div class="privarka-blog-promo__text"><?= $promoText ?></div>
			<?php endif; ?>
			<?php if ($promoLink !== ''): ?>
				<a class="privarka-blog-promo__link" href="<?= htmlspecialcharsbx($promoLink) ?>"><?= htmlspecialcharsbx(GetMessage('PRIVARKA_BLOG_PROMO_MORE')) ?></a>
			<?php endif; ?>
		</div>
	</div>
	<?php
	$promoWrapped = ob_get_clean();
}

if ($body !== '') {
	if ($stagingWrapped !== '') {
		$body = str_replace('[[STAGING_TYPES]]', $stagingWrapped, $body);
	}
	if ($promoWrapped !== '') {
		$body = str_replace('[[MID_PROMO]]', $promoWrapped, $body);
	}
	$body = str_replace(['[[STAGING_TYPES]]', '[[MID_PROMO]]'], '', $body);
	$body = privarkaBlogStripDuplicateH1($body, (string)($arResult['NAME'] ?? ''));
	$body = preg_replace('/<h1(\s[^>]*)?>(.*?)<\/h1>/isu', '<h2$1>$2</h2>', $body) ?? $body;
	$arResult[$detailKey] = $body;
	if ($detailKey === 'DETAIL_TEXT') {
		$arResult['~DETAIL_TEXT'] = $body;
	}
}

$arResult['STAGING_APPEND'] = ($stagingWrapped !== '' && is_string($body) && strpos($body, 'privarka-blog-staging-tabs') === false)
	? $stagingWrapped
	: '';

/* Баннер контактов (вставка через JS после 2-го H2) */
$arResult['CONTACT_BANNER_ACTIVE'] = false;
$arResult['CONTACT_BANNER_MARKUP'] = '';
$showBanner = false;
$pShow = $arResult['PROPERTIES']['CONTACT_BANNER_SHOW'] ?? [];
if (!empty($pShow['VALUE_XML_ID']) && $pShow['VALUE_XML_ID'] === 'Y') {
	$showBanner = true;
} elseif (!empty($pShow['VALUE']) && (string)$pShow['VALUE'] === 'Y') {
	$showBanner = true;
}
$bannerHtml = '';
if (!empty($arResult['DISPLAY_PROPERTIES']['CONTACT_BANNER_HTML'])) {
	$bannerHtml = privarkaBlogNormalizePropValue($arResult['DISPLAY_PROPERTIES']['CONTACT_BANNER_HTML']['~VALUE'] ?? $arResult['DISPLAY_PROPERTIES']['CONTACT_BANNER_HTML']['DISPLAY_VALUE'] ?? '');
} elseif (!empty($arResult['PROPERTIES']['CONTACT_BANNER_HTML'])) {
	$bannerHtml = privarkaBlogNormalizePropValue($arResult['PROPERTIES']['CONTACT_BANNER_HTML']['~VALUE'] ?? $arResult['PROPERTIES']['CONTACT_BANNER_HTML']['VALUE'] ?? '');
}
$btnText = trim((string)($arResult['DISPLAY_PROPERTIES']['CONTACT_BANNER_BTN_TEXT']['DISPLAY_VALUE'] ?? $arResult['PROPERTIES']['CONTACT_BANNER_BTN_TEXT']['VALUE'] ?? ''));
$btnLink = trim((string)($arResult['DISPLAY_PROPERTIES']['CONTACT_BANNER_BTN_LINK']['DISPLAY_VALUE'] ?? $arResult['PROPERTIES']['CONTACT_BANNER_BTN_LINK']['VALUE'] ?? ''));

if ($showBanner && $bannerHtml !== '') {
	$arResult['CONTACT_BANNER_ACTIVE'] = true;
	ob_start();
	?>
	<div class="privarka-blog-contact-banner">
		<div class="privarka-blog-contact-banner__html"><?= $bannerHtml ?></div>
		<?php if ($btnLink !== ''): ?>
			<a class="privarka-blog-contact-banner__btn" href="<?= htmlspecialcharsbx($btnLink) ?>" title="<?= htmlspecialcharsbx($btnText) ?>">
				<?php if ($btnText !== ''): ?>
					<span class="privarka-blog-contact-banner__btn-text"><?= htmlspecialcharsbx($btnText) ?></span>
				<?php endif; ?>
				<span class="privarka-blog-contact-banner__btn-icon" aria-hidden="true"></span>
			</a>
		<?php endif; ?>
	</div>
	<?php
	$arResult['CONTACT_BANNER_MARKUP'] = ob_get_clean();
}

/* Изображение статьи для schema */
$articleImage = '';
if (!empty($arResult['DETAIL_PICTURE']['SRC'])) {
	$articleImage = $abs($arResult['DETAIL_PICTURE']['SRC']);
} elseif (!empty($arResult['SLIDER'][0]['SRC'])) {
	$articleImage = $abs($arResult['SLIDER'][0]['SRC']);
}

$authorPhotoUrl = '';
$phId = $arResult['PROPERTIES']['AUTHOR_PHOTO']['VALUE'] ?? '';
if ($phId) {
	$af = CFile::GetFileArray($phId);
	if ($af && $af['SRC']) {
		$authorPhotoUrl = $abs($af['SRC']);
	}
}

$authorName = trim((string)($arResult['DISPLAY_PROPERTIES']['AUTHOR_NAME']['DISPLAY_VALUE'] ?? ''));
$authorJob = trim((string)($arResult['DISPLAY_PROPERTIES']['AUTHOR_JOB']['DISPLAY_VALUE'] ?? ''));

$published = '';
if (!empty($arResult['ACTIVE_FROM'])) {
	$published = date('c', MakeTimeStamp($arResult['ACTIVE_FROM'], CSite::GetDateFormat()));
} elseif (!empty($arResult['DATE_CREATE'])) {
	$published = date('c', MakeTimeStamp($arResult['DATE_CREATE'], CSite::GetDateFormat()));
}

$modified = '';
if (!empty($arResult['TIMESTAMP_X'])) {
	$modified = date('c', MakeTimeStamp($arResult['TIMESTAMP_X'], CSite::GetDateFormat()));
}

$relDetail = (string)($arResult['~DETAIL_PAGE_URL'] ?? $arResult['DETAIL_PAGE_URL'] ?? '');
if ($relDetail === '' && !empty($arResult['CODE'])) {
	$relDetail = '/blog/' . $arResult['CODE'] . '/';
}
$pageUrl = $abs($relDetail);

$siteDir = defined('SITE_DIR') ? (string)SITE_DIR : '/';
$pathPrefix = ($siteDir === '/' || $siteDir === '') ? '' : rtrim($siteDir, '/');
$homeUrl = $base . $pathPrefix . '/';
$blogListUrl = $base . $pathPrefix . '/blog/';

$siteName = COption::GetOptionString('main', 'site_name', $host);
$logoUrl = $abs('/local/templates/privarka2023/images/logo.png');

$desc = '';
if (!empty($arResult['PREVIEW_TEXT'])) {
	$desc = trim(htmlspecialchars_decode(strip_tags($arResult['PREVIEW_TEXT']), ENT_QUOTES));
	$desc = mb_substr($desc, 0, 300);
}

$articleLd = [
	'@context' => 'https://schema.org',
	'@type' => 'Article',
	'mainEntityOfPage' => [
		'@type' => 'WebPage',
		'@id' => $pageUrl,
	],
	'headline' => $arResult['NAME'] ?? '',
	'datePublished' => $published,
	'dateModified' => $modified ?: $published,
	'author' => [
		'@type' => 'Person',
		'name' => $authorName ?: $siteName,
	],
	'publisher' => [
		'@type' => 'Organization',
		'name' => $siteName,
		'url' => $homeUrl,
		'logo' => [
			'@type' => 'ImageObject',
			'url' => $logoUrl,
		],
	],
];

if ($desc !== '') {
	$articleLd['description'] = $desc;
}
if ($articleImage !== '') {
	$articleLd['image'] = [$articleImage];
}
if ($authorJob !== '') {
	$articleLd['author']['jobTitle'] = $authorJob;
}
if ($authorPhotoUrl !== '') {
	$articleLd['author']['image'] = $authorPhotoUrl;
}

$blogRating = $arResult['BLOG_RATING'] ?? ['average' => 0.0, 'count' => 0];
if (!empty($blogRating['count']) && (int)$blogRating['count'] > 0) {
	$articleLd['aggregateRating'] = [
		'@type' => 'AggregateRating',
		'ratingValue' => (float)$blogRating['average'],
		'ratingCount' => (int)$blogRating['count'],
		'bestRating' => 5,
		'worstRating' => 1,
	];
}

$jsonFlags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;
if (defined('JSON_INVALID_UTF8_SUBSTITUTE')) {
	$jsonFlags |= JSON_INVALID_UTF8_SUBSTITUTE;
}

$jsonParts = ['<script type="application/ld+json">' . json_encode($articleLd, $jsonFlags) . '</script>'];

$crumbLd = [
	'@context' => 'https://schema.org',
	'@type' => 'BreadcrumbList',
	'itemListElement' => [
		[
			'@type' => 'ListItem',
			'position' => 1,
			'name' => GetMessage('PRIVARKA_BLOG_CRUMB_HOME'),
			'item' => $homeUrl,
		],
		[
			'@type' => 'ListItem',
			'position' => 2,
			'name' => GetMessage('PRIVARKA_BLOG_CRUMB_BLOG'),
			'item' => $blogListUrl,
		],
		[
			'@type' => 'ListItem',
			'position' => 3,
			'name' => (string)($arResult['NAME'] ?? ''),
			'item' => $pageUrl,
		],
	],
];
$jsonParts[] = '<script type="application/ld+json">' . json_encode($crumbLd, $jsonFlags) . '</script>';

$orgLd = [
	'@context' => 'https://schema.org',
	'@type' => 'Organization',
	'name' => $siteName,
	'url' => $homeUrl,
	'logo' => $logoUrl,
];
$jsonParts[] = '<script type="application/ld+json">' . json_encode($orgLd, $jsonFlags) . '</script>';

if (!empty($arResult['BLOG_FAQ'])) {
	$faqEntities = [];
	foreach ($arResult['BLOG_FAQ'] as $row) {
		$faqEntities[] = [
			'@type' => 'Question',
			'name' => $row['q'],
			'acceptedAnswer' => [
				'@type' => 'Answer',
				'text' => trim(htmlspecialchars_decode(strip_tags($row['a']), ENT_QUOTES)),
			],
		];
	}
	$faqLd = [
		'@context' => 'https://schema.org',
		'@type' => 'FAQPage',
		'mainEntity' => $faqEntities,
	];
	$jsonParts[] = '<script type="application/ld+json">' . json_encode($faqLd, $jsonFlags) . '</script>';
}

foreach ($jsonParts as $chunk) {
	$APPLICATION->AddHeadString($chunk, true);
}
