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
?>
<? if ($arResult['PROPERTIES']['SHOW_PICTURE']['VALUE']) {
    $aImageSize = array('width' => 700, 'height' => 9999);
    $aImage = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], $aImageSize, BX_RESIZE_IMAGE_EXACT, true);
    if (isset($aImage['src']) && $aImage['src']) {

        ?>
        <div class="b-ramaugol b-ramaugol2"><a href="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
                                               class="thickbox_resized">
                <div class="ramaugol_content">
                    <img alt="" src="<?=$aImage['src']?>" style="width: <?=$aImage['width']?>px; height: <?=$aImage['height']?>px;">
                    <div class="u1"></div>
                    <div class="u2"></div>
                    <div class="u3"></div>
                    <div class="u4"></div>
                </div>
                <div class="g-clear"></div>
            </a></div>

        <?
    }
} ?>
<? if (strlen($arResult["DETAIL_TEXT"]) > 0): ?>
    <? echo $arResult["DETAIL_TEXT"]; ?>
<? else: ?>
    <? echo $arResult["PREVIEW_TEXT"]; ?>
<? endif ?>
