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
<div class="news-detail  b-news_page ">

	<? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
		<dt><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></dt>
	<? endif; ?>
	<? if ($arResult["~DETAIL_TEXT"]): ?>
		<p><?= $arResult["~DETAIL_TEXT"] ?></p>
	<? elseif ($arResult["~PREVIEW_TEXT"]): ?>
		<p><?= $arResult["~PREVIEW_TEXT"] ?></p>
	<? endif; ?>
	<? if (is_array($arResult["DETAIL_PICTURE"])): ?>
		<?
		$aImageSize = array('width' => 500, 'height' => 9999);
		$aImage = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], $aImageSize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
		if (isset($aImage['src']) && $aImage['src']) {
			$arResult["DETAIL_PICTURE"]["REAL_SRC"] = $arResult["DETAIL_PICTURE"]["SRC"];
			$arResult["DETAIL_PICTURE"]["SRC"] = $aImage['src'];
			$arResult["DETAIL_PICTURE"]["WIDTH"] = $aImage['width'];
			$arResult["DETAIL_PICTURE"]["HEIGHT"] = $aImage['height'];
		}
		/*?>
		<div class="news-detail__image">
			<a href="<?= $arResult["DETAIL_PICTURE"]["REAL_SRC"] ?>" class="thickbox_resized">

				<img
					class="detail_picture"
					border="0"
					src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
					width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>"
					height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>"
					alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
					title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"
				/>
			</a>
		</div>
		<?*/?>
	<? endif ?>
</div>