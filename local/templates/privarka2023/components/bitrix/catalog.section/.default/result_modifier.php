<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

global $arrFilter;
$curPage = $APPLICATION->GetCurPage(false);
if(strpos($curPage, "/filter/") !== false && empty($arrFilter)){
   header("Location:/404.php");
}