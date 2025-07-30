<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
    )
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
$iCountInRow = 2;
$iCurrentCounter = 0;
?>

<table align="left" border="0" cellpadding="1" cellspacing="1" style="width: 100%;"
       id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>">
    <tbody>
    <tr>
        <? foreach ($arResult['SECTIONS'] as &$arSection) {
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
        if ($iCurrentCounter && $iCurrentCounter % $iCountInRow  == 0) { ?>
    </tr>
    <tr>
        <?
        }

        $iCurrentCounter++;
        ?>
        <td id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
            <a href="<?= $arSection['LINK']?$arSection['LINK']:$arSection['SECTION_PAGE_URL']; ?>">
                <div class="b-ramaugol b-ramaugol2">
                    <div class="ramaugol_content">

                        <? if ($arSection['PICTURE']) {
                            $aImageSize = array('width' => 152, 'height' => 152);
                            $aImage = CFile::ResizeImageGet($arSection['PICTURE']['ID'], $aImageSize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
                            if (isset($aImage['src']) && $aImage['src']) {

                                ?>
                                <img alt="" src="<?= $aImage['src'] ?>"
                                     style="width: <?= $aImage['width'] ?>px; height: <?= $aImage['height'] ?>px; float: left;">
                                <div class="u1"></div>
                                <div class="u2"></div>
                                <div class="u3"></div>
                                <div class="u4"></div>
                            <? } ?>
                        <? } ?>
                    </div>
                    <div class="g-clear"></div>
                </div>
            </a>
            <p>
                <a href="<?= $arSection['LINK']?$arSection['LINK']:$arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a></p>
            <p>
        </td>
        <?
        } ?>
    </tr>
    </tbody>
</table>