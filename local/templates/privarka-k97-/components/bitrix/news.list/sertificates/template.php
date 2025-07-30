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
$iInRowCounter = 4;
if (isset($arParams['IN_ROW']) && intval($arParams['IN_ROW'])) {
    $iInRowCounter = intval($arParams['IN_ROW']);
}
?>
<h3>
    <span style="font-size:12px;">КОНТУР - официальный дилер иностранных &nbsp;компаний в России:</span></h3>

<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; ">
    <tbody>
    <tr>
        <?
        $iLocalCounter = 0;
        ?>
        <? foreach ($arResult['ITEMS'] as $aItem) { ?>
            <?
            $this->AddEditAction($aItem['ID'], $aItem['EDIT_LINK'], CIBlock::GetArrayByID($aItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($aItem['ID'], $aItem['DELETE_LINK'], CIBlock::GetArrayByID($aItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <? if (!isset($aItem['DETAIL_PICTURE']['SRC'])) {
                continue;
            } ?>
            <?
            $aImageSize = array('width' => 999, 'height' => 85);
            $aImage = CFile::ResizeImageGet($aItem["DETAIL_PICTURE"]['ID'], $aImageSize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
            if (isset($aImage['src']) && $aImage['src']) {
                $aItem['DETAIL_PICTURE']['RESIZED'] = $aImage;
            }
            else{
                continue;
            }
            ?>
            <? if ($iLocalCounter != 0 && $iLocalCounter % $iInRowCounter == 0) {
                if ($iLocalCounter !== 0) {
                    echo "</tr><tr>";
                }
            }
            $iLocalCounter++;?>


            <td id="<?=$this->GetEditAreaId($aItem['ID']);?>">
                <p>
                    <a href="<?=$aItem['DETAIL_PICTURE']['SRC']?>"
                       class="thickbox_resized">
                    </a>
                </p>
                <div class="b-ramaugol b-ramaugol2">
                    <a
                        href="<?=$aItem['DETAIL_PICTURE']['SRC']?>"
                        class="thickbox_resized">
                    </a>
                    <div class="ramaugol_content">
                        <a href="<?=$aItem['DETAIL_PICTURE']['SRC']?>"
                            class="thickbox_resized">
                            <img alt="" src="<?=$aItem['DETAIL_PICTURE']['RESIZED']['src']?>"
                                 style="width: <?=$aItem['DETAIL_PICTURE']['RESIZED']['width']?>px; height: <?=$aItem['DETAIL_PICTURE']['RESIZED']['height']?>px;">
                        </a>
                        <br>
                        <div class="u1"></div>
                        <div class="u2"></div>
                        <div class="u3"></div>
                        <div class="u4"></div>
                    </div>
                    <div class="g-clear"></div>
                </div>
                <?=$aItem["~NAME"]?>
                <p></p>
            </td>
        <? } ?>
        <? for ($i = 0; $i < ($iInRowCounter - $iLocalCounter); $i++) {
            echo "<td></td>";
        } ?>

    </tr>
    </tbody>
</table>