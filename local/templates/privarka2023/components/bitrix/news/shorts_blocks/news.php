<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?if($arParams["USE_RSS"]=="Y"):?>
	<?
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
	?>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:search.form",
		"",
		Array(
			"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"],
			"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"]
		),
		$component
	);?>
<?endif?>

<?if($arParams["USE_FILTER"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"bootstrap_v4",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"]
	),
	$component
);
?>
<?endif?>

<?php
// ОТЛАДКА: Сохранение параметров компонента для отладки
global $USER;
$debug_params = [
	'IBLOCK_TYPE' => $arParams["IBLOCK_TYPE"],
	'IBLOCK_ID' => $arParams["IBLOCK_ID"],
	'NEWS_COUNT' => $arParams["NEWS_COUNT"],
	'CHECK_DATES' => $arParams["CHECK_DATES"],
	'INCLUDE_SUBSECTIONS' => 'Y',
	'CACHE_TYPE' => 'N (disabled)',
	'CACHE_TIME' => 0,
	'CURRENT_URL' => $_SERVER['REQUEST_URI'],
	'IS_ADMIN' => $USER->IsAdmin(),
	'USER_ID' => $USER->GetID(),
	'USER_GROUPS' => $USER->GetUserGroupArray(),
	'COMPONENT_CALLED' => true,
	'COMPONENT_TIMESTAMP' => time()
];
?>
<script>
(function(){
	try {
		// Сохраняем параметры компонента в глобальную переменную
		if(typeof window.newsComponentDebug === 'undefined'){
			window.newsComponentDebug = {};
		}

		window.newsComponentDebug.params = <?= json_encode($debug_params, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>;

		// Функция для вывода параметров компонента в консоль
		window.newsComponentDebug.show = function(){
			if(!window.newsComponentDebug || !window.newsComponentDebug.params){
				console.error('Параметры компонента не найдены. Компонент может быть не загружен на этой странице.');
				return;
			}
			
			console.group('%c⚙️ DEBUG: news component parameters', 'font-size: 16px; font-weight: bold; color: #0066cc;');
			console.table(window.newsComponentDebug.params);
			console.log('User Groups:', window.newsComponentDebug.params.USER_GROUPS);
			console.groupEnd();
		};
	} catch(e) {
		console.error('Ошибка при инициализации отладки news component:', e);
	}
})();
</script>
<?php
// ОТЛАДКА: Проверка перед вызовом компонента
$component_call_start = microtime(true);
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"shorts_blocks",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],

		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],

		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SEARCH_PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"],

		"CACHE_TYPE" => "N",
        "CACHE_TIME" => 0,
		"CACHE_GROUPS" => "N", // Отключаем кэширование по группам пользователей
		// "CACHE_FILTER" => $arParams["CACHE_FILTER"],

		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],

		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",

		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"MEDIA_PROPERTY" => $arParams["MEDIA_PROPERTY"],
		"SLIDER_PROPERTY" => $arParams["SLIDER_PROPERTY"],

		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

		"USE_RATING" => $arParams["USE_RATING"],
		"DISPLAY_AS_RATING" => $arParams["DISPLAY_AS_RATING"],
		"MAX_VOTE" => $arParams["MAX_VOTE"],
		"VOTE_NAMES" => $arParams["VOTE_NAMES"],

		"USE_SHARE" => $arParams["LIST_USE_SHARE"],
		"SHARE_HIDE" => $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],

		"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
	),
	$component
);?>

<?php
// ОТЛАДКА: Проверка после вызова компонента
$component_call_end = microtime(true);
$component_call_time = round(($component_call_end - $component_call_start) * 1000, 2);

$debug_params['component_executed'] = true;
$debug_params['component_execution_time_ms'] = $component_call_time;
?>
<script>
(function(){
	try {
		if(typeof window.newsComponentDebug !== 'undefined' && window.newsComponentDebug.params){
			window.newsComponentDebug.params.component_executed = true;
			window.newsComponentDebug.params.component_execution_time_ms = <?= $component_call_time ?>;
		}
	} catch(e) {
		// Тихая обработка ошибок
	}
})();
</script>
<?php
?>
