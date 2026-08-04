<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Context;
use Bitrix\Main\Loader;

/**
 * Правила 404:
 * 1) /filter/clear/apply/  -> сразу 404
 * 2) /filter/.../apply/ И в $arrFilter нет ничего, кроме FACET_OPTIONS -> 404
 * 3) (опционально) /filter/.../apply/ И реального элемента по фильтру нет -> 404
 */

global $APPLICATION, $arrFilter;

$request  = Context::getCurrent()->getRequest();
$curPage  = $APPLICATION->GetCurPage(false);
$debugOn  = ($request->get('debug404') === '1');

// пропускаем ajax-догрузки, чтобы не ломать showMore/deferredLoad
if ($request->isAjaxRequest() && in_array($request->get('action'), ['showMore', 'deferredLoad'], true)) {
    return;
}

// простенький лог при debug404=1
if (!function_exists('sf_log')) {
    function sf_log($label, $data, $on) {
        if (!$on) return;
        $dir = $_SERVER['DOCUMENT_ROOT'].'/upload';
        if (!is_dir($dir)) @mkdir($dir, 0775, true);
        @file_put_contents($dir.'/arrFilter_decision.log', '['.date('c')."] {$label}: ".print_r($data, true)."\n", FILE_APPEND);
    }
}

// 1) фильтр применён?
$filterApplied = (preg_match('#/filter/.+/apply/#', $curPage) === 1);

// 1a) спец-кейс «clear»: редиректим на чистый URL раздела (без /filter/...)
if ($filterApplied && preg_match('#/filter/clear/apply/#', $curPage)) {
    sf_log('HIT_CLEAR', ['uri'=>$curPage], $debugOn);
    $sectionUrl = preg_replace('#/filter/.+$#', '/', $curPage);
    LocalRedirect($sectionUrl);
    die();
}

// 2) есть ли в $arrFilter что-то, кроме служебного FACET_OPTIONS?
$filterHasRealConstraints = false;
if (is_array($arrFilter)) {
    $tmp = $arrFilter;
    unset($tmp['FACET_OPTIONS']); // служебное — не считаем условием
    $filterHasRealConstraints = !empty($tmp);
}

sf_log('FILTER_SNAPSHOT', [
    'uri'        => $curPage,
    'applied'    => $filterApplied ? 'yes' : 'no',
    'arrFilter'  => $arrFilter,
    'hasReal'    => $filterHasRealConstraints ? 'yes' : 'no',
], $debugOn);

// 2a) если фильтр применён, но условий нет — редирект на чистый URL раздела
if ($filterApplied && !$filterHasRealConstraints) {
    sf_log('NO_CONSTRAINTS_404', null, $debugOn);
    $sectionUrl = preg_replace('#/filter/.+$#', '/', $curPage);
    LocalRedirect($sectionUrl);
    die();
}

// 3) (опционально) перепроверим, что по фильтру реально есть хотя бы один элемент
//    Включи блок, если хочешь «железобетонно» отсеять пустые выборки.
//    Если достаточно правил выше — этот блок можно закомментировать.
if ($filterApplied && Loader::includeModule('iblock')) {
    $filterName  = (string)($arParams['FILTER_NAME'] ?? '');
    $smartFilter = ($filterName && isset($GLOBALS[$filterName]) && is_array($GLOBALS[$filterName])) ? $GLOBALS[$filterName] : [];

    $baseFilter = [
        'IBLOCK_ID'         => (int)$arParams['IBLOCK_ID'],
        'ACTIVE'            => 'Y',
        'CHECK_PERMISSIONS' => 'Y',
    ];
    if (($arParams['INCLUDE_SUBSECTIONS'] ?? '') === 'Y') {
        $baseFilter['INCLUDE_SUBSECTIONS'] = 'Y';
    }
    if (!empty($arParams['PARENT_SECTION'])) {
        $baseFilter['SECTION_ID'] = (int)$arParams['PARENT_SECTION'];
    }

    $countFilter = array_merge($smartFilter, $baseFilter);
    $res = \CIBlockElement::GetList([], $countFilter, false, ['nTopCount' => 1], ['ID']);
    $hasRow = false;
    if (is_object($res)) {
        $row = $res->Fetch();
        $hasRow = is_array($row) && !empty($row['ID']);
    } else {
        $hasRow = ((int)$res > 0);
    }

    sf_log('REAL_CHECK', ['countFilter'=>$countFilter, 'hasRow'=>$hasRow ? 'yes' : 'no'], $debugOn);

    if (!$hasRow) {
        sf_log('NO_ROWS_404', null, $debugOn);
        LocalRedirect('/404.php');
        die();
    }
}

// иначе — ничего не делаем: есть товары, страница рендерится как обычно.


$component = $this->getComponent();
$arParams  = $component->applyTemplateModifications();