<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

/**
 * Гарантированно добавить свойство VIDEO в $arResult['DISPLAY_PROPERTIES']
 */
use Bitrix\Main\Loader;

$videoProp = $arResult['PROPERTIES']['VIDEO'] ?? null;

// Если свойства нет в PROPERTIES (например, не выбрали в PROPERTY_CODE) — дотянем его вручную
if (!$videoProp) {
    if (Loader::includeModule('iblock')) {
        $rs = CIBlockElement::GetProperty(
            (int)$arResult['IBLOCK_ID'],
            (int)$arResult['ID'],
            ['sort' => 'asc'],
            ['CODE' => 'VIDEO']
        );
        $videoProp = null;
        $values = [];
        while ($p = $rs->Fetch()) {
            if (!$videoProp) $videoProp = $p; // возьмём «каркас» свойства
            if (!empty($p['VALUE'])) $values[] = $p['VALUE'];
        }
        if ($videoProp) {
            $videoProp['VALUE'] = $videoProp['MULTIPLE'] === 'Y' ? $values : ($values[0] ?? null);
            $arResult['PROPERTIES']['VIDEO'] = $videoProp;
        }
    }
}

// Если значение есть — сформируем DISPLAY_PROPERTIES в «родном» формате
if (!empty($arResult['PROPERTIES']['VIDEO']['VALUE'])) {
    // подчистим пустые элементы у множественных значений
    $prop = $arResult['PROPERTIES']['VIDEO'];
    if (is_array($prop['VALUE'])) {
        $prop['VALUE'] = array_values(array_filter($prop['VALUE'], static fn($v) => $v !== '' && $v !== null));
    }

    if (!empty($prop['VALUE'])) {
        $arResult['DISPLAY_PROPERTIES']['VIDEO'] = CIBlockFormatProperties::GetDisplayValue(
            $arResult,
            $prop,
            'catalog_out'
        );
    }
}
$downLoadProp = $arResult['PROPERTIES']['DOWNLOAD_CATALOG'] ?? null;

// Если свойства нет в PROPERTIES (например, не выбрали в PROPERTY_CODE) — дотянем его вручную
if (!$downLoadProp) {
    if (Loader::includeModule('iblock')) {
        $rs = CIBlockElement::GetProperty(
            (int)$arResult['IBLOCK_ID'],
            (int)$arResult['ID'],
            ['sort' => 'asc'],
            ['CODE' => 'DOWNLOAD_CATALOG']
        );
        $downLoadProp = null;
        $values = [];
        while ($p = $rs->Fetch()) {
            if (!$downLoadProp) $downLoad = $p; // возьмём «каркас» свойства
            if (!empty($p['VALUE'])) $values[] = $p['VALUE'];
        }
        if ($downLoad) {
            $downLoad['VALUE'] = $downLoad['MULTIPLE'] === 'Y' ? $values : ($values[0] ?? null);
            $arResult['PROPERTIES']['DOWNLOAD_CATALOG'] = $downLoad;
        }
    }
}

// Если значение есть — сформируем DISPLAY_PROPERTIES в «родном» формате
if (!empty($arResult['PROPERTIES']['DOWNLOAD_CATALOG']['VALUE'])) {
    // подчистим пустые элементы у множественных значений
    $prop = $arResult['PROPERTIES']['DOWNLOAD_CATALOG'];
    if (is_array($prop['VALUE'])) {
        $prop['VALUE'] = array_values(array_filter($prop['VALUE'], static fn($v) => $v !== '' && $v !== null));
    }

    if (!empty($prop['VALUE'])) {
        $arResult['DISPLAY_PROPERTIES']['DOWNLOAD_CATALOG'] = CIBlockFormatProperties::GetDisplayValue(
            $arResult,
            $prop,
            'catalog_out'
        );
    }
}
