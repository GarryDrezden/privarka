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
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Iblock\Component\Tools;

$this->setFrameMode(true);

// SEF-fallback Bitrix: URL несуществующего товара может быть разобран как section
// с SECTION_CODE_PATH, но без SECTION_ID — catalog.section тогда показывает корень каталога.
$sectionCodePath = (string)($arResult['VARIABLES']['SECTION_CODE_PATH'] ?? '');
$sectionId = (int)($arResult['VARIABLES']['SECTION_ID'] ?? 0);
$elementCode = (string)($arResult['VARIABLES']['ELEMENT_CODE'] ?? '');
$elementId = (int)($arResult['VARIABLES']['ELEMENT_ID'] ?? 0);

if ($sectionCodePath !== '' && $sectionId <= 0 && $elementCode === '' && $elementId <= 0 && Loader::includeModule('iblock'))
{
	$resolvedSectionId = \CIBlockFindTools::GetSectionIDByCodePath((int)$arParams['IBLOCK_ID'], $sectionCodePath);
	if ($resolvedSectionId <= 0)
	{
		Tools::process404(
			$arParams['~MESSAGE_404'] ?? '',
			true,
			($arParams['SET_STATUS_404'] ?? '') === 'Y',
			($arParams['SHOW_404'] ?? '') === 'Y',
			$arParams['FILE_404'] ?? ''
		);
	}
	$arResult['VARIABLES']['SECTION_ID'] = $resolvedSectionId;
}
$this->addExternalCss("/bitrix/css/main/bootstrap.css");

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
		"CHECK_PERMISSIONS" => "N",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}
?>
<div class="row">
<?
if ($isVerticalFilter)
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_vertical.php");
else
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_horizontal.php");
?>
</div>