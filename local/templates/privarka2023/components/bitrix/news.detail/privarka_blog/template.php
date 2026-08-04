<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$this->addExternalCss('/bitrix/css/main/bootstrap.css');
$this->addExternalCss('/bitrix/css/main/font-awesome.css');
$this->addExternalCss($this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css');
$this->addExternalCss($this->GetFolder() . '/style.css');
$this->addExternalJs($this->GetFolder() . '/script.js');
$this->addExternalJs($this->GetFolder() . '/rating.js');

if (class_exists('\Bitrix\Main\UI\Extension')) {
	\Bitrix\Main\UI\Extension::load(['fx', 'ui.fonts.opensans']);
} elseif (class_exists('CUtil')) {
	CUtil::InitJSCore(['fx', 'ui.fonts.opensans']);
}

$p = $arResult['PROPERTIES'];
$dp = $arResult['DISPLAY_PROPERTIES'] ?? [];

$readingTime = trim((string)($dp['READING_TIME']['DISPLAY_VALUE'] ?? ''));

$views = '';
if (isset($arResult['FIELDS']['SHOW_COUNTER'])) {
	$views = (string)(int)$arResult['FIELDS']['SHOW_COUNTER'];
} elseif (isset($arResult['SHOW_COUNTER'])) {
	$views = (string)(int)$arResult['SHOW_COUNTER'];
}

$modifiedFmt = '';
if (!empty($arResult['TIMESTAMP_X'])) {
	$modifiedFmt = CIBlockFormatProperties::DateFormat(
		$arParams['ACTIVE_DATE_FORMAT'] ?: 'd.m.Y',
		MakeTimeStamp($arResult['TIMESTAMP_X'], CSite::GetDateFormat())
	);
}

$authorName = trim((string)($dp['AUTHOR_NAME']['DISPLAY_VALUE'] ?? ''));
$authorJob = trim((string)($dp['AUTHOR_JOB']['DISPLAY_VALUE'] ?? ''));
$ctaText = trim((string)($dp['AUTHOR_CTA_TEXT']['DISPLAY_VALUE'] ?? ''));
$ctaLink = trim((string)($dp['AUTHOR_CTA_LINK']['DISPLAY_VALUE'] ?? ''));
$authorPhoto = '';
$phId = $p['AUTHOR_PHOTO']['VALUE'] ?? '';
if ($phId) {
	$af = CFile::GetFileArray($phId);
	if ($af && $af['SRC']) {
		$authorPhoto = $af['SRC'];
	}
}

$expertHtml = (string)($dp['EXPERT_QUOTE']['DISPLAY_VALUE'] ?? '');
$materialVerified = false;
if (!empty($p['MATERIAL_VERIFIED']['VALUE_XML_ID']) && $p['MATERIAL_VERIFIED']['VALUE_XML_ID'] === 'Y') {
	$materialVerified = true;
} elseif (!empty($p['MATERIAL_VERIFIED']['VALUE']) && (string)$p['MATERIAL_VERIFIED']['VALUE'] === 'Y') {
	$materialVerified = true;
}

$sectionId = 'privarka_blog_' . (int)$arResult['ID'];
$bodyClass = 'privarka-blog__body text-content';

$showDetailPicture = ($arParams['DISPLAY_PICTURE'] != 'N');
$hasHeroMedia = $showDetailPicture && (
	!empty($arResult['VIDEO'])
	|| !empty($arResult['SOUND_CLOUD'])
	|| (!empty($arResult['SLIDER']) && is_array($arResult['SLIDER']) && count($arResult['SLIDER']) > 0)
	|| (!empty($arResult['DETAIL_PICTURE']) && is_array($arResult['DETAIL_PICTURE']) && !empty($arResult['DETAIL_PICTURE']['SRC']))
);
$heroInnerMods = 'article-hero__inner' . ($hasHeroMedia ? '' : ' article-hero__inner--solo');
?>
<div class="bx-newsdetail privarka-blog" id="<?= htmlspecialcharsbx($this->GetEditAreaId($arResult['ID'])) ?>" data-section-id="<?= htmlspecialcharsbx($sectionId) ?>" data-contact-banner="<?= !empty($arResult['CONTACT_BANNER_ACTIVE']) ? '1' : '0' ?>">

	<div class="privarka-blog__layout">
		<div class="privarka-blog__main">

	<section class="privarka-blog__article-hero article-hero" aria-label="<?= Loc::getMessage('PRIVARKA_BLOG_HERO') ?>">
				<div class="<?= htmlspecialcharsbx($heroInnerMods) ?>">
					<?php if ($hasHeroMedia): ?>
						<div class="article-hero__image">
							<?php if (!empty($arResult['VIDEO'])): ?>
								<div class="privarka-blog__media embed-responsive embed-responsive-16by9">
									<iframe src="<?= htmlspecialcharsbx($arResult['VIDEO']) ?>" allowfullscreen title=""></iframe>
								</div>
							<?php elseif (!empty($arResult['SOUND_CLOUD'])): ?>
								<div class="privarka-blog__media">
									<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?= urlencode($arResult['SOUND_CLOUD']) ?>&amp;color=ff5500"></iframe>
								</div>
							<?php elseif (!empty($arResult['SLIDER']) && count($arResult['SLIDER']) > 1): ?>
								<div class="bx-newsdetail-slider privarka-blog__media">
									<div class="bx-newsdetail-slider-container" style="width: <?= count($arResult['SLIDER']) * 100 ?>%;left:0">
										<?php foreach ($arResult['SLIDER'] as $file): ?>
											<div style="width: <?= 100 / count($arResult['SLIDER']) ?>%" class="bx-newsdetail-slider-slide">
												<img src="<?= $file['SRC'] ?>" alt="<?= htmlspecialcharsbx($file['DESCRIPTION'] ?? '') ?>">
											</div>
										<?php endforeach; ?>
										<div style="clear:both"></div>
									</div>
									<div class="bx-newsdetail-slider-arrow-container-left"><div class="bx-newsdetail-slider-arrow"><i class="fa fa-angle-left"></i></div></div>
									<div class="bx-newsdetail-slider-arrow-container-right"><div class="bx-newsdetail-slider-arrow"><i class="fa fa-angle-right"></i></div></div>
									<ul class="bx-newsdetail-slider-control">
										<?php foreach ($arResult['SLIDER'] as $i => $file): ?>
											<li rel="<?= $i + 1 ?>" class="<?= $i ? '' : 'current' ?>"><span></span></li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php elseif (!empty($arResult['SLIDER'])): ?>
								<div class="privarka-blog__media">
									<img class="privarka-blog__pic" src="<?= $arResult['SLIDER'][0]['SRC'] ?>" width="<?= (int)$arResult['SLIDER'][0]['WIDTH'] ?>" height="<?= (int)$arResult['SLIDER'][0]['HEIGHT'] ?>"
										alt="<?= htmlspecialcharsbx($arResult['SLIDER'][0]['ALT'] ?? $arResult['NAME'] ?? '') ?>">
								</div>
							<?php elseif (!empty($arResult['DETAIL_PICTURE']) && is_array($arResult['DETAIL_PICTURE'])): ?>
								<div class="privarka-blog__media">
									<img class="privarka-blog__pic" src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
										alt="<?= htmlspecialcharsbx($arResult['DETAIL_PICTURE']['ALT'] ?? $arResult['NAME'] ?? '') ?>">
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="article-hero__content">
						<?php
						$heroRatingFrame = $this->createFrame('privarka_blog_hero_rating_' . (int)$arResult['ID']);
						$heroRatingFrame->begin();
						include __DIR__ . '/include/rating_vars.php';
						?>
						<div class="article-hero__rating-badge" title="<?= Loc::getMessage('PRIVARKA_BLOG_META_RATING') ?>">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<span data-hero-rating-value><?= htmlspecialcharsbx($privarkaBlogRatingFmt) ?></span>
						</div>
						<?php $heroRatingFrame->end(); ?>
						<?php if (($arParams['DISPLAY_DATE'] != 'N' && $arResult['DISPLAY_ACTIVE_FROM']) || $modifiedFmt): ?>
							<div class="article-hero__dates">
								<?php if ($arParams['DISPLAY_DATE'] != 'N' && $arResult['DISPLAY_ACTIVE_FROM']): ?>
									<div class="article-hero__date-item">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
											<rect x="1" y="3" width="14" height="12" rx="2" stroke="currentColor" stroke-width="1.4"/>
											<path d="M5 1v4M11 1v4M1 7h14" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
										</svg>
										<?= $arResult['DISPLAY_ACTIVE_FROM'] ?>
									</div>
								<?php endif; ?>
								<?php if ($modifiedFmt): ?>
									<div class="article-hero__date-item">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
											<path d="M13.5 8A5.5 5.5 0 1 1 8 2.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
											<path d="M10 2h4v4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M14 2l-3 3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
										</svg>
										<?= htmlspecialcharsbx($modifiedFmt) ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if ($arResult['NAME']): ?>
							<h1 class="article-hero__title privarka-blog__title"><?= htmlspecialcharsbx($arResult['NAME']) ?></h1>
						<?php endif; ?>

						<?php if ($readingTime || ($views !== '' && (int)$views > 0)): ?>
							<div class="article-hero__stats">
								<?php if ($readingTime): ?>
									<div class="article-hero__stat">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
											<circle cx="8" cy="8" r="6.5" stroke="currentColor" stroke-width="1.4"/>
											<path d="M8 4.5V8.5l2.5 1.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
										<?= htmlspecialcharsbx($readingTime) ?>
									</div>
								<?php endif; ?>
								<?php if ($views !== '' && (int)$views > 0): ?>
									<div class="article-hero__stat">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
											<path d="M1 8s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5z" stroke="currentColor" stroke-width="1.4"/>
											<circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="1.4"/>
										</svg>
										<?= htmlspecialcharsbx($views) ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>

		<aside class="privarka-blog__aside" aria-label="<?= Loc::getMessage('PRIVARKA_BLOG_TOC') ?>">
			<div class="privarka-blog__toc-card">
				<div class="privarka-blog__toc-title"><?= Loc::getMessage('PRIVARKA_BLOG_TOC') ?></div>
				<nav class="privarka-blog__toc-nav">
					<ol class="privarka-blog__toc-root" id="privarka-blog-toc"></ol>
				</nav>
			</div>
		</aside>

			<?php if ($expertHtml): ?>
				<section class="privarka-blog__expert" aria-label="<?= Loc::getMessage('PRIVARKA_BLOG_EXPERT') ?>">
					<h2 class="privarka-blog__expert-label"><?= Loc::getMessage('PRIVARKA_BLOG_EXPERT') ?></h2>
					<div class="privarka-blog__expert-quote"><?= $expertHtml ?></div>
					<?php if ($authorName || $authorPhoto || $authorJob || ($ctaText && $ctaLink)): ?>
						<div class="privarka-blog__author-card">
							<?php if ($authorPhoto): ?>
								<div class="privarka-blog__author-photo">
									<img src="<?= htmlspecialcharsbx($authorPhoto) ?>" alt="" width="80" height="80" loading="lazy">
								</div>
							<?php endif; ?>
							<div class="privarka-blog__author-text">
								<?php if ($authorName): ?>
									<div class="privarka-blog__author-name"><?= htmlspecialcharsbx($authorName) ?></div>
								<?php endif; ?>
								<?php if ($authorJob): ?>
									<div class="privarka-blog__author-job"><?= htmlspecialcharsbx($authorJob) ?></div>
								<?php endif; ?>
								<?php if ($ctaText && $ctaLink): ?>
									<a class="privarka-blog__cta btn btn-warning btn-sm" href="<?= htmlspecialcharsbx($ctaLink) ?>"><?= htmlspecialcharsbx($ctaText) ?></a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</section>
			<?php endif; ?>

			<?php if (!empty($arResult['STAGING_APPEND'])): ?>
				<div class="privarka-blog__staging-append"><?= $arResult['STAGING_APPEND'] ?></div>
			<?php endif; ?>

			<div class="<?= htmlspecialcharsbx($bodyClass) ?>" id="<?= htmlspecialcharsbx($sectionId) ?>">
				<?php if ($arResult['NAV_RESULT']): ?>
					<?php if ($arParams['DISPLAY_TOP_PAGER']): ?>
						<?= $arResult['NAV_STRING'] ?><br>
					<?php endif; ?>
					<?= $arResult['NAV_TEXT'] ?>
					<?php if ($arParams['DISPLAY_BOTTOM_PAGER']): ?>
						<br><?= $arResult['NAV_STRING'] ?>
					<?php endif; ?>
				<?php elseif ($arResult['DETAIL_TEXT'] != ''): ?>
					<?= $arResult['DETAIL_TEXT'] ?>
				<?php else: ?>
					<?= $arResult['PREVIEW_TEXT'] ?>
				<?php endif; ?>
			</div>

			<?php if (!empty($dp['SOURCES']['DISPLAY_VALUE'])): ?>
				<section class="privarka-blog__sources">
					<h2 class="privarka-blog__h2"><?= Loc::getMessage('PRIVARKA_BLOG_SOURCES') ?></h2>
					<div class="privarka-blog__sources-body"><?= $dp['SOURCES']['DISPLAY_VALUE'] ?></div>
				</section>
			<?php endif; ?>

			<?php if ($authorName || $authorPhoto || $authorJob): ?>
				<section class="privarka-blog__author-footer">
					<h2 class="privarka-blog__h2"><?= Loc::getMessage('PRIVARKA_BLOG_AUTHOR') ?></h2>
					<?php if ($materialVerified): ?>
						<div class="privarka-blog__verified"><?= Loc::getMessage('PRIVARKA_BLOG_VERIFIED') ?></div>
					<?php endif; ?>
					<div class="privarka-blog__author-card privarka-blog__author-card--footer">
						<?php if ($authorPhoto): ?>
							<div class="privarka-blog__author-photo">
								<img src="<?= htmlspecialcharsbx($authorPhoto) ?>" alt="" width="80" height="80" loading="lazy">
							</div>
						<?php endif; ?>
						<div class="privarka-blog__author-text">
							<?php if ($authorName): ?>
								<div class="privarka-blog__author-name"><?= htmlspecialcharsbx($authorName) ?></div>
							<?php endif; ?>
							<?php if ($authorJob): ?>
								<div class="privarka-blog__author-job"><?= htmlspecialcharsbx($authorJob) ?></div>
							<?php endif; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<?php if (!empty($arResult['BLOG_FAQ'])): ?>
				<section class="privarka-blog__faq" aria-label="<?= Loc::getMessage('PRIVARKA_BLOG_FAQ') ?>">
					<h2 class="privarka-blog__h2"><?= Loc::getMessage('PRIVARKA_BLOG_FAQ') ?></h2>
					<div class="privarka-blog__faq-list">
						<?php foreach ($arResult['BLOG_FAQ'] as $idx => $row): ?>
							<details class="privarka-blog__faq-item" <?= $idx === 0 ? 'open' : '' ?>>
								<summary><h3 class="privarka-blog__faq-q"><?= htmlspecialcharsbx($row['q']) ?></h3></summary>
								<div class="privarka-blog__faq-a"><?= $row['a'] ?></div>
							</details>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif; ?>

			<?php
			$ratingBlockFrame = $this->createFrame('privarka_blog_rating_block_' . (int)$arResult['ID']);
			$ratingBlockFrame->begin();
			include __DIR__ . '/include/rating_vars.php';
			?>
			<section class="privarka-blog__rating-block" aria-label="<?= Loc::getMessage('PRIVARKA_BLOG_RATE') ?>">
				<h3 class="privarka-blog__h3"><?= Loc::getMessage('PRIVARKA_BLOG_RATE') ?></h3>
				<p class="privarka-blog-rating__summary" id="privarka-blog-rating-summary-<?= (int)$arResult['ID'] ?>">
					<?= Loc::getMessage('PRIVARKA_BLOG_META_RATING') ?>:
					<strong class="privarka-blog-rating__summary-val"><?= htmlspecialcharsbx($privarkaBlogRatingFmt) ?></strong>
					(<span class="privarka-blog-rating__summary-count"><?= (int)$privarkaBlogRatingCnt ?></span> <?= Loc::getMessage('PRIVARKA_BLOG_RATING_VOTES') ?>)
				</p>
				<div
					class="privarka-blog-rating<?= $privarkaBlogRatingUserVoted ? ' is-voted' : '' ?>"
					data-privarka-blog-rating
					data-article-id="<?= (int)$arResult['ID'] ?>"
					data-ajax-url="/local/ajax/blog_rating.php"
					data-stats-url="/local/ajax/blog_rating_stats.php"
					data-sessid="<?= htmlspecialcharsbx(bitrix_sessid()) ?>"
					data-user-voted="<?= $privarkaBlogRatingUserVoted ? '1' : '0' ?>"
					data-user-vote="<?= $privarkaBlogRatingUserVote ?>"
					data-msg-thanks="<?= htmlspecialcharsbx(Loc::getMessage('PRIVARKA_BLOG_RATING_THANKS')) ?>"
					data-msg-voted="<?= htmlspecialcharsbx(Loc::getMessage('PRIVARKA_BLOG_RATING_ALREADY')) ?>"
					data-msg-error="<?= htmlspecialcharsbx(Loc::getMessage('PRIVARKA_BLOG_RATING_ERROR')) ?>"
					data-msg-hl="<?= htmlspecialcharsbx(Loc::getMessage('PRIVARKA_BLOG_RATING_HL')) ?>"
					data-msg-sessid="<?= htmlspecialcharsbx(Loc::getMessage('PRIVARKA_BLOG_RATING_SESSID')) ?>"
					data-label-rating="<?= htmlspecialcharsbx(Loc::getMessage('PRIVARKA_BLOG_META_RATING')) ?>"
					data-label-votes="<?= htmlspecialcharsbx(Loc::getMessage('PRIVARKA_BLOG_RATING_VOTES')) ?>"
				>
					<div class="privarka-blog-rating__stars" role="group" aria-label="<?= Loc::getMessage('PRIVARKA_BLOG_RATE') ?>">
						<?php for ($s = 1; $s <= 5; $s++): ?>
							<button type="button" class="privarka-blog-rating__star<?= ($privarkaBlogRatingUserVoted && $s <= $privarkaBlogRatingUserVote) ? ' is-selected' : '' ?>" data-vote="<?= $s ?>" aria-label="<?= $s ?>"<?= $privarkaBlogRatingUserVoted ? ' disabled' : '' ?>>
								<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
							</button>
						<?php endfor; ?>
					</div>
					<p class="privarka-blog-rating__msg" aria-live="polite"></p>
				</div>
			</section>
			<?php $ratingBlockFrame->end(); ?>

			<?php
			$GLOBALS['privarkaBlogOtherFilter'] = ['!ID' => $arResult['ID']];
			?>
			<section class="privarka-blog__more">
				<h2 class="privarka-blog__h2"><?= Loc::getMessage('PRIVARKA_BLOG_MORE') ?></h2>
				<?php
				$APPLICATION->IncludeComponent(
					'bitrix:news.list',
					'flat2',
					[
						'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
						'IBLOCK_ID' => $arParams['IBLOCK_ID'],
						'NEWS_COUNT' => 6,
						'SORT_BY1' => 'ACTIVE_FROM',
						'SORT_ORDER1' => 'DESC',
						'SORT_BY2' => 'SORT',
						'SORT_ORDER2' => 'ASC',
						'FILTER_NAME' => 'privarkaBlogOtherFilter',
						'CACHE_FILTER' => 'Y',
						'FIELD_CODE' => [],
						'PROPERTY_CODE' => [],
						'CHECK_DATES' => 'Y',
						'IBLOCK_URL' => $arParams['IBLOCK_URL'],
						'DETAIL_URL' => $arParams['DETAIL_URL'],
						'SECTION_URL' => $arParams['SECTION_URL'] ?? '',
						'CACHE_TYPE' => $arParams['CACHE_TYPE'],
						'CACHE_TIME' => $arParams['CACHE_TIME'],
						'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
						'DISPLAY_DATE' => 'Y',
						'DISPLAY_NAME' => 'Y',
						'DISPLAY_PICTURE' => 'Y',
						'DISPLAY_PREVIEW_TEXT' => 'Y',
						'ACTIVE_DATE_FORMAT' => $arParams['ACTIVE_DATE_FORMAT'],
						'SET_TITLE' => 'N',
						'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
						'HIDE_LINK_WHEN_NO_DETAIL' => 'N',
						'DISPLAY_TOP_PAGER' => 'N',
						'DISPLAY_BOTTOM_PAGER' => 'N',
						'PAGER_SHOW_ALWAYS' => 'N',
						'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
					],
					$component,
					['HIDE_ICONS' => 'Y']
				);
				unset($GLOBALS['privarkaBlogOtherFilter']);
				?>
			</section>

			<?php if ($arParams['USE_SHARE'] == 'Y'): ?>
				<div class="privarka-blog__share row">
					<div class="col-xs-12 text-right">
						<noindex>
							<?php
							$APPLICATION->IncludeComponent(
								'bitrix:main.share',
								$arParams['SHARE_TEMPLATE'],
								[
									'HANDLERS' => $arParams['SHARE_HANDLERS'],
									'PAGE_URL' => $arResult['~DETAIL_PAGE_URL'],
									'PAGE_TITLE' => $arResult['~NAME'],
									'SHORTEN_URL_LOGIN' => $arParams['SHARE_SHORTEN_URL_LOGIN'],
									'SHORTEN_URL_KEY' => $arParams['SHARE_SHORTEN_URL_KEY'],
									'HIDE' => $arParams['SHARE_HIDE'],
								],
								$component,
								['HIDE_ICONS' => 'Y']
							);
							?>
						</noindex>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>

	<?php if (!empty($arResult['CONTACT_BANNER_ACTIVE']) && !empty($arResult['CONTACT_BANNER_MARKUP'])): ?>
		<template id="privarka-blog-contact-banner-template"><?= $arResult['CONTACT_BANNER_MARKUP'] ?></template>
	<?php endif; ?>
</div>

<script>
BX.ready(function() {
	var sid = '<?= CUtil::JSEscape($this->GetEditAreaId($arResult['ID'])) ?>';
	if (typeof JCNewsSlider !== 'undefined' && BX(sid)) {
		new JCNewsSlider(sid, {
			imagesContainerClassName: 'bx-newsdetail-slider-container',
			leftArrowClassName: 'bx-newsdetail-slider-arrow-container-left',
			rightArrowClassName: 'bx-newsdetail-slider-arrow-container-right',
			controlContainerClassName: 'bx-newsdetail-slider-control'
		});
	}
});
</script>
