<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arViewModeList = array(
    'LIST' => GetMessage('CPT_BCSL_VIEW_MODE_LIST'),
    'LINE' => GetMessage('CPT_BCSL_VIEW_MODE_LINE'),
    'TEXT' => GetMessage('CPT_BCSL_VIEW_MODE_TEXT'),
    'TILE' => GetMessage('CPT_BCSL_VIEW_MODE_TILE'),
    'TABLE' => GetMessage('CPT_BCSL_VIEW_MODE_TABLE'),
);
$aResizeParams = array(
    'BX_RESIZE_IMAGE_EXACT' => 'EXACT',
    'BX_RESIZE_IMAGE_PROPORTIONAL' => 'PROPORTIONAL',
);

$arTemplateParameters = array(
    'VIEW_MODE' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('CPT_BCSL_VIEW_MODE'),
        'TYPE' => 'LIST',
        'VALUES' => $arViewModeList,
        'MULTIPLE' => 'N',
        'DEFAULT' => 'LINE',
        'REFRESH' => 'Y'
    ),
    'SHOW_PARENT_NAME' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('CPT_BCSL_SHOW_PARENT_NAME'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    ),

);

if (isset($arCurrentValues['VIEW_MODE']) && 'TILE' == $arCurrentValues['VIEW_MODE']) {
    $arTemplateParameters['HIDE_SECTION_NAME'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('CPT_BCSL_HIDE_SECTION_NAME'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N'
    );
}
if (isset($arCurrentValues['VIEW_MODE']) && 'TABLE' == $arCurrentValues['VIEW_MODE']) {

$arTemplateParameters['COUNT_IN_ROW'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('CPT_BCSL_IN_ROW'),
        'TYPE' => 'STRING',
        'DEFAULT' => '3',
    );
$arTemplateParameters['WIDTH_PICTURE'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('CPT_BCSL_WIDTH_PICTURE'),
        'TYPE' => 'STRING',
        'DEFAULT' => '150',
    );
$arTemplateParameters['HEIGHT_PICTURE'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('CPT_BCSL_HEIGHT_PICTURE'),
        'TYPE' => 'STRING',
        'DEFAULT' => '150',
    );
$arTemplateParameters['RESIZE_FLAG'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('CPT_BCSL_RESIZE_FLAG'),
        'TYPE' => 'LIST',
        'DEFAULT' => 'BX_RESIZE_IMAGE_EXACT',
        'VALUES' => $aResizeParams,
    );
}
?>