<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Блог");
$APPLICATION->AddHeadString(
	'<script>document.addEventListener("DOMContentLoaded",function(){document.body.classList.add("privarka-blog-page");});</script>',
	true
);
?>
<div class="content_wrapper news_page">
	<?php
	$blogPath = parse_url((string)($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) ?: '';
	$isBlogIndex = (bool)preg_match('#^/blog/?$#', (string)$blogPath)
		|| (bool)preg_match('#^/blog/index\.php$#', (string)$blogPath);
?>
	<?php if ($isBlogIndex): ?>
	<div class="caption">
		<h1>
			<?$APPLICATION->ShowTitle(true);?>
		</h1>
	</div>
	<?php endif; ?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"new_template",
		Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
		)
	);?>
	<style>
		.bx-newslist .btn{
			background:#F0AB00!important;
			border-color:#F0AB00!important;
		}
	</style>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news", 
		"flat2", 
		array(
			"ADD_ELEMENT_CHAIN" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"CHECK_DATES" => "Y",
			"COLOR_NEW" => "3E74E6",
			"COLOR_OLD" => "C0C0C0",
			"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
			"DETAIL_DISPLAY_TOP_PAGER" => "N",
			"DETAIL_FIELD_CODE" => array(
				0 => "SHOW_COUNTER",
				1 => "TIMESTAMP_X",
			),
			"DETAIL_PAGER_SHOW_ALL" => "Y",
			"DETAIL_PAGER_TEMPLATE" => "",
			"DETAIL_PAGER_TITLE" => "Страница",
			"DETAIL_PROPERTY_CODE" => array(
				0 => "READING_TIME",
				1 => "EXPERT_QUOTE",
				2 => "AUTHOR_NAME",
				3 => "AUTHOR_JOB",
				4 => "AUTHOR_PHOTO",
				5 => "AUTHOR_CTA_TEXT",
				6 => "AUTHOR_CTA_LINK",
				7 => "MATERIAL_VERIFIED",
				8 => "STAGING_TYPES",
				9 => "MID_ARTICLE_PROMO_TITLE",
				10 => "MID_ARTICLE_PROMO_TEXT",
				11 => "MID_ARTICLE_PROMO_LINK",
				12 => "MID_ARTICLE_PROMO_IMAGE",
				13 => "SOURCES",
				14 => "FAQ_QUESTION",
				15 => "FAQ_ANSWER",
				16 => "CONTACT_BANNER_SHOW",
				17 => "CONTACT_BANNER_HTML",
				18 => "CONTACT_BANNER_BTN_TEXT",
				19 => "CONTACT_BANNER_BTN_LINK",
			),
			"DETAIL_SET_CANONICAL_URL" => "N",
			"DISPLAY_AS_RATING" => "rating",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "N",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"FILE_404" => "",
			"FONT_MAX" => "50",
			"FONT_MIN" => "10",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "9",
			"IBLOCK_TYPE" => "blog",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"LIST_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"LIST_PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"MEDIA_PROPERTY" => "",
			"MESSAGE_404" => "",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"NEWS_COUNT" => "50",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Новости",
			"PERIOD_NEW_TAGS" => "",
			"PREVIEW_TRUNCATE_LEN" => "",
			"SEF_FOLDER" => "/blog/",
			"SEF_MODE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_STATUS_404" => "Y",
			"SET_TITLE" => "Y",
			"SHOW_404" => "Y",
			"SLIDER_PROPERTY" => "",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N",
			"TAGS_CLOUD_ELEMENTS" => "150",
			"TAGS_CLOUD_WIDTH" => "100%",
			"TEMPLATE_THEME" => "blue",
			"USE_CATEGORIES" => "N",
			"USE_FILTER" => "N",
			"USE_PERMISSIONS" => "N",
			"USE_RATING" => "N",
			"MAX_VOTE" => "5",
			"VOTE_NAMES" => array("1","2","3","4","5"),
			"USE_REVIEW" => "N",
			"USE_RSS" => "N",
			"USE_SEARCH" => "N",
			"USE_SHARE" => "N",
			"COMPONENT_TEMPLATE" => "flat2",
			"SEF_URL_TEMPLATES" => array(
				"news" => "",
				"section" => "",
				"detail" => "#ELEMENT_CODE#/",
			)
		),
		false
	);?>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>