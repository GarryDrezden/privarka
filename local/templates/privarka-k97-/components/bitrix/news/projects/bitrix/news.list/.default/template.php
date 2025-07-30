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

<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <h4><?= $arItem['NAME'] ?></h4>
    <table border="0" cellpadding="1" cellspacing="1" style="width: 100%;"
           id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <tbody>
        <tr>
            <?if($arItem['PROPERTIES']['YOUTUBE_CODE']['VALUE']){?>
            <td>
                <iframe allowfullscreen="" frameborder="0" height="339"
                        src="//www.youtube.com/embed/<?= $arItem['PROPERTIES']['YOUTUBE_CODE']['VALUE'] ?>?rel=0"
                        width="425"></iframe>
            </td>
            <?}?>
            <td>
                <?= $arItem['PREVIEW_TEXT'] ?>

                <div class="b-ramaugol b-ramaugol2">
                    <? if ($arItem['PROPERTIES']['MORE_PHOTO']['VALUE']) {
                        foreach ($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'] as $iKey => $iPhotoId) {
                            $sPhotoPath = CFile::GetPath($iPhotoId);
                            $aImageSize = array('width' => 200, 'height' => 999);
                            $aImage = CFile::ResizeImageGet($iPhotoId, $aImageSize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
                            if (isset($aImage['src']) && $aImage['src']) {?>
                            <div class="ramaugol_content">
                                <a href="<?=$sPhotoPath?>"
                                   class="thickbox_resized">
                                    <img alt=""
                                         src="<?=$aImage['src']?>"
                                         style="width: <?=$aImage['width']?>px; height: <?=$aImage['height']?>px;">
                                </a>
                                <div class="u1"></div>
                                <div class="u2"></div>
                                <div class="u3"></div>
                                <div class="u4"></div>


                            </div>

                                <div class="g-clear"></div>
                                <div><?=$arItem['PROPERTIES']['MORE_PHOTO']['DESCRIPTION'][$iKey]?$arItem['PROPERTIES']['MORE_PHOTO']['DESCRIPTION'][$iKey]:''?></div>

                        <? } ?>
                        <? } ?>
                    <? } ?>

                </div>
            </td>
        </tr>
        </tbody>
    </table>

<? endforeach; ?>