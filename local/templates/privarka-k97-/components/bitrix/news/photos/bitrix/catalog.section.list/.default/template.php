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

    'TABLE' => array(
        'CONT' => 'bx_catalog_table',
        'TITLE' => 'bx_catalog_table_category_title',
        'LIST' => 'bx_catalog_table_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
    ),
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="<? echo $arCurView['CONT']; ?>"><?

    if (0 < $arResult["SECTIONS_COUNT"]) {
        if ($arParams['VIEW_MODE'] == 'TABLE') { ?>

            <?if($arResult['SECTION']['UF_TEXT_PREVIEW_K97']){
                ?>
                <div class="section_top_text">
                    <?=$arResult['SECTION']['~UF_TEXT_PREVIEW_K97']?>
                </div>
            <?}?>
            <table border="0" class="<? echo $arCurView['LIST']; ?>" cellpadding="1" cellspacing="1" style="width: 100%;">
            <tbody>
        <? } else { ?>
            <ul class="<? echo $arCurView['LIST']; ?>"><?
        } ?>


        <?
    switch ($arParams['VIEW_MODE']) {
        case 'TABLE':
            $iItemInRow = 3;
            $iCountItems = 0;
            $iTotalCount = count($arResult['SECTIONS']);
            foreach ($arResult['SECTIONS'] as &$arSection) {
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                if (false == $arSection['PICTURE']) {
                    $arSection['PICTURE'] = array(
                        'SRC' => $arCurView['EMPTY_IMG'],
                        'ALT' => (
                        '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                            ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                            : $arSection["NAME"]
                        ),
                        'TITLE' => (
                        '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                            ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                            : $arSection["NAME"]
                        )
                    );
                    $aImage['src'] = $arCurView['EMPTY_IMG'];
                } else {
                    $aImageSize = array('width' => 160, 'height' => 120);
                    $aImage = CFile::ResizeImageGet($arSection['PICTURE'], $aImageSize, BX_RESIZE_IMAGE_EXACT, true);
                }
                ?>

                <? if (!($iCountItems % $iItemInRow)) {
                    if ($iCountItems == 1) {
                        ?>
                        <tr>
                    <? } elseif ($iCountItems >= $iTotalCount) {
                        ?>
                        </tr><tr>
                    <? } else {
                        ?>
                        </tr>
                        <?
                    }
                } ?>

                <td align="left" style="width: 300px;" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">

                    <p><b><?= $arSection['NAME']; ?></b></p>
                    <div class="b-ramaugol b-ramaugol2">
                        <a
                            href="<?= $arSection['SECTION_PAGE_URL']; ?>"
                            title="<?= $arSection['PICTURE']['TITLE']; ?>"
                        >
                            <div class="ramaugol_content">
                                <img
                                    original="<?= $arSection['PICTURE']['SRC'] ?>"
                                    alt="<?= $arSection['PICTURE']['TITLE']; ?>"
                                    src="<?= $aImage['src'] ?>"
                                    style="width: 152px; height: 114px;">
                                <br>
                                <div class="u1"></div>
                                <div class="u2"></div>
                                <div class="u3"></div>
                                <div class="u4"></div>
                            </div>
                            <div class="g-clear"></div>
                        </a>
                    </div>


                    <p></p>
                </td>



                <?

                $iCountItems++;
            }
            unset($arSection);
            break;
    }
        ?>
        </<?= $arParams['VIEW_MODE'] == 'TABLE' ? 'table' : 'ul' ?>>
        <div class="section_content">
            <?= $arResult['SECTION']['DESCRIPTION'] ?>
        </div>
        <?
        echo('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
    }
    ?></div>