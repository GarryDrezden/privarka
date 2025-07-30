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
$templateData['PARENT_ID'] = $arResult['SECTION']['PARENT_ID'];
$templateData['SECTION_ID'] = $arResult['SECTION']['ID'];
$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
    'LIST' => array(
        'CONT' => 'bx_sitemap',
        'TITLE' => 'bx_sitemap_title',
        'LIST' => 'bx_sitemap_ul',
    ),
    'LINE' => array(
        'CONT' => 'bx_catalog_line',
        'TITLE' => 'bx_catalog_line_category_title',
        'LIST' => 'bx_catalog_line_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
    ),
    'TEXT' => array(
        'CONT' => 'bx_catalog_text',
        'TITLE' => 'bx_catalog_text_category_title',
        'LIST' => 'bx_catalog_text_ul'
    ),
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
    ),
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
        case 'LINE':
            foreach ($arResult['SECTIONS'] as &$arSection) {
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                if (false === $arSection['PICTURE'])
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
                ?>
            <li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                <a
                    href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                    class="bx_catalog_line_img"
                    style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>');"
                    title="<? echo $arSection['PICTURE']['TITLE']; ?>"
                ></a>
                <h2 class="bx_catalog_line_title"><a
                        href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
                    if ($arParams["COUNT_ELEMENTS"]) {
                        ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
                    }
                    ?></h2><?
                if ('' != $arSection['DESCRIPTION']) {
                    ?><p class="bx_catalog_line_description"><? echo $arSection['DESCRIPTION']; ?></p><?
                }
                ?>
                <div style="clear: both;"></div>
                </li><?
            }
            unset($arSection);
            break;
        case 'TEXT':
            foreach ($arResult['SECTIONS'] as &$arSection) {
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                ?>
            <li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_catalog_text_title"><a
                        href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
                    if ($arParams["COUNT_ELEMENTS"]) {
                        ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
                    }
                    ?></h2></li><?
            }
            unset($arSection);
            break;
        case 'TILE':
            foreach ($arResult['SECTIONS'] as &$arSection) {
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                if (false === $arSection['PICTURE'])
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
                ?>
            <li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
            <a
                href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                class="bx_catalog_tile_img"
                style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');"
                title="<? echo $arSection['PICTURE']['TITLE']; ?>"
            > </a><?
                if ('Y' != $arParams['HIDE_SECTION_NAME']) {
                    ?><h2 class="bx_catalog_tile_title"><a
                    href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
                    if ($arParams["COUNT_ELEMENTS"]) {
                        ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
                    }
                    ?></h2><?
                }
                ?></li><?
            }
            unset($arSection);
            break;
    case 'LIST':
        $intCurrentDepth = 1;
        $boolFirst = true;
    foreach ($arResult['SECTIONS'] as &$arSection) {
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

        if ($intCurrentDepth < $arSection['RELATIVE_DEPTH_LEVEL']) {
            if (0 < $intCurrentDepth)
                echo "\n", str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']), '<ul>';
        } elseif ($intCurrentDepth == $arSection['RELATIVE_DEPTH_LEVEL']) {
            if (!$boolFirst)
                echo '</li>';
        } else {
            while ($intCurrentDepth > $arSection['RELATIVE_DEPTH_LEVEL']) {
                echo '</li>', "\n", str_repeat("\t", $intCurrentDepth), '</ul>', "\n", str_repeat("\t", $intCurrentDepth - 1);
                $intCurrentDepth--;
            }
            echo str_repeat("\t", $intCurrentDepth - 1), '</li>';
        }

        echo(!$boolFirst ? "\n" : ''), str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']);
        ?>
        <li id="<?= $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_sitemap_li_title"><a
                href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"]; ?><?
                if ($arParams["COUNT_ELEMENTS"]) {
                    ?> <span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span><?
                }
                ?></a></h2><?

        $intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
        $boolFirst = false;
    }
        unset($arSection);
        while ($intCurrentDepth > 1) {
            echo '</li>', "\n", str_repeat("\t", $intCurrentDepth), '</ul>', "\n", str_repeat("\t", $intCurrentDepth - 1);
            $intCurrentDepth--;
        }
        if ($intCurrentDepth > 0) {
            echo '</li>', "\n";
        }
        break;
        case 'TABLE':
            $iItemInRow = 3;
            $iCountItems = 0;
            $iTotalCount = count($arResult['SECTIONS']);
            foreach ($arResult['SECTIONS'] as &$arSection) {
                if($arSection['UF_NO_IN_LIST']){
                    continue;
                }
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
                    $aImageSize = array('width' => 152, 'height' => 114);
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

                    <a
                        href="<?= $arSection['SECTION_PAGE_URL']; ?>"
                        title="<?= $arSection['PICTURE']['TITLE']; ?>"
                    ><?= $arSection['NAME']; ?>
                    </a>
                </td>
                <?

                $iCountItems++;
            }
            unset($arSection);
            break;
    }
        ?>
        </<?= $arParams['VIEW_MODE'] == 'TABLE' ? 'table' : 'ul' ?>>

        <?
        echo('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
    }
    ?>
</div>