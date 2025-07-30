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
<div class="engine">
<div class="engine__list">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <? endif; ?>
    <? foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<div class="engine__list-item"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="engine__item-title">
                <a class="engine__item-link" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                    <?= $arItem["NAME"]?>
                </a>
            </div>
			<div class="engine__item-content">
			<?if(is_array($arItem["PREVIEW_PICTURE"])):?>
             <?   $aImageSize = array('width' => 100, 'height' => 100);
                $aImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], $aImageSize , BX_RESIZE_IMAGE_PROPORTIONAL,true);
                if (isset($aImage['src']) && $aImage['src']) {
                $arItem["PREVIEW_PICTURE"]["SRC"] = $aImage['src'];
                $arItem["PREVIEW_PICTURE"]["WIDTH"] = $aImage['width'];
                $arItem["PREVIEW_PICTURE"]["HEIGHT"] = $aImage['height'];
                }?>
                <div class="engine__item-picture-wrapper">
                    <img
						class="engine__item-picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
					/>
                </div>
                <?endif;?>
                <div class="engine__item-text">
                    <?=$arItem['PREVIEW_TEXT']?>
                </div>
			</div>
    </div>

<?endforeach; ?>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
</div>
