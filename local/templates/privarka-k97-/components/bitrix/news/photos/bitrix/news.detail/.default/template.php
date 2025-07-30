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
<div class="album">
	<div class="album__wrapper">

		<div class="album__text">
		<? if ($arResult["~DETAIL_TEXT"]): ?>
			<?= $arResult["~DETAIL_TEXT"] ?>
		<? elseif ($arResult["~PREVIEW_TEXT"]): ?>

			<?= $arResult["~PREVIEW_TEXT"] ?>
		<? endif; ?>
		</div>

		<div class="album__gallery" style="width: 100%;">

			<?
			$aResize = array('width'=>160,'height'=>120);
			foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $iKey => $iPhoto){
				$aImage = CFile::ResizeImageGet($iPhoto,$aResize,BX_RESIZE_IMAGE_EXACT);
				$aImage['SRC'] = CFile::GetPath($iPhoto);
				?>
			<div id="gallery_container_div_<?=$iPhoto?>" style="float:left; margin:15px 35px 3px 3px; position: relative; width: 150px; height:150px;  text-align: center;">
				<a href="<?=$aImage['SRC']?>" title="" class="thickbox thickbox_resized" rel="vetz" id="<?=$iPhoto?>" >
					<div class="b-ramaugol">
						<div class="ramaugol_content">
							<img class="forms" border=0 src="<?=$aImage['src']?>" alt="<?=$arResult['PROPERTIES']['PHOTOS']['DESCRIPTION'][$iKey]?>" >
							<div class="u1"></div>
							<div class="u2"></div>
							<div class="u3"></div>
							<div class="u4"></div>
						</div>
						<div class="g-clear"></div>
					</div>
				</a>
				<?=$arResult['PROPERTIES']['PHOTOS']['DESCRIPTION'][$iKey]?>
			</div>
			<?}?>
		</div>
		<div class="g-clear"></div>
		<div class="b-gal-page">

		</div>
</div>
</div>