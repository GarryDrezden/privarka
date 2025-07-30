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
$this->setFrameMode(true);
$iItemInRow = 3;
?>
<table border="0" cellpadding="1" cellspacing="1" class="b-gallery">
	<tbody>
	<tr>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

		$aImageSize = array('width' => 160, 'height' => 120);
		$aImage = CFile::ResizeImageGet($arItem["PROPERTIES"]['PHOTOS']['VALUE'][0], $aImageSize, BX_RESIZE_IMAGE_EXACT, true);


		if ($iCountItems&&!($iCountItems % $iItemInRow)) {
			?>
				</tr><tr>

		<?} ?>

		<td width="33%" id="<? echo $this->GetEditAreaId($arItem['ID']); ?>">
			<p><b><?= $arItem['NAME']; ?></b></p>
			<div class="b-ramaugol">

				<a
					href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
					title="<?= $arItem['DETAIL_PICTURE']['TITLE']; ?>"
				>
					<div class="ramaugol_content">
						<img
							original="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>"
							alt="<?= $arItem['DETAIL_PICTURE']['TITLE']; ?>"
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
		</td>

		<?$iCountItems++;?>
	<?endforeach;?>
	</tr>
	</tbody>
</table>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
	<br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>