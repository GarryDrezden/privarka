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
    if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID']) {
        $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
    }
    if (0 < $arResult["SECTIONS_COUNT"]) {
        if ($arParams['VIEW_MODE'] == 'TABLE') { ?>
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
            $iItemInRow = $arParams['COUNT_IN_ROW'] ? $arParams['COUNT_IN_ROW'] : 3;
            $iCountItems = 0;
            $iTotalCount = count($arResult['SECTIONS']);

            $aImageSize = array('width' => 150, 'height' => 150);
            if ($arParams['WIDTH_PICTURE']) {
                $aImageSize['width'] = $arParams['WIDTH_PICTURE'];
            }
            if ($arParams['HEIGHT_PICTURE']) {
                $aImageSize['height'] = $arParams['HEIGHT_PICTURE'];
            }
            $iResizeFlag = BX_RESIZE_IMAGE_EXACT;
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
                    if ($arParams['RESIZE_FLAG']) {
                        if (constant($arParams['RESIZE_FLAG']) !== false) {
                            $iResizeFlag = constant($arParams['RESIZE_FLAG']);
                        }
                    }
                    $aImage = CFile::ResizeImageGet($arSection['PICTURE'], $aImageSize, $iResizeFlag, true);
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
                <td style="text-align: center;" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                    <strong>
                        <? if ($arSection['UF_LINK']) {
                            $arSection['SECTION_PAGE_URL'] = $arSection['UF_LINK'];
                        } ?>
                        <a
                            href="<?= $arSection['SECTION_PAGE_URL']; ?>"
                            class="bx_catalog_tile_img"
                            title="<?= $arSection['PICTURE']['TITLE']; ?>"
                        >
                            <img
                                original="<?= $arSection['PICTURE']['SRC'] ?>"
                                alt="<?= $arSection['PICTURE']['TITLE']; ?>"
                                src="<?= $aImage['src'] ?>"
                                style="width: <?= $aImageSize['width'] ?>px; height: <?= $aImageSize['height'] ?>px;">
                        </a><br>
                        <a href="<?= $arSection['SECTION_PAGE_URL']; ?>">
                            <?= $arSection['NAME']; ?>
                        </a>
                    </strong>
                </td>
                <?

                $iCountItems++;
            }
            unset($arSection);
            break;
    }
        if ($arParams['VIEW_MODE'] == 'TABLE'):?>
            </table>
            <?else:?>
            </ul>
            <?endif;
        echo('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
    }
    if ($arParams['VIEW_MODE'] == 'TABLE'):?>
        <?$this->SetViewTarget('section_description');?>

            <div class="section_content">
                <?= $arResult['SECTION']['DESCRIPTION'] ?>
            </div>

        <?$this->EndViewTarget();?>
        <?
    endif;
    ?>

</div>