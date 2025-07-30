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
?>
	<table border="0" cellpadding="1" cellspacing="1" style="width: 700px;">
		<tbody>
		<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	$aImageSize = array('width' => 700, 'height' => 507);
	$aImage = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], $aImageSize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
	if (isset($aImage['src']) && $aImage['src']) {
	?>
		<tr id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<td>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<div class="b-ramaugol b-ramaugol2">
						<div class="ramaugol_content">
							<img
								original="<?=$arItem["DETAIL_PICTURE"]['SRC']?>"
								alt=""
								src="<?=$aImage['src']?>"
								style="width: <?=$aImage['width']?>px;
								height: <?=$aImage['height']?>px;"
							>
							<br>
							<div class="u1"></div>
							<div class="u2"></div>
							<div class="u3"></div>
							<div class="u4"></div>
						</div>
						<div class="g-clear"></div>
					</div>
				</a></td>
		</tr>
		<?}?>
		<tr>
			<td>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><strong><?=$arItem["NAME"]?></strong></a></td>
		</tr>
		<?endforeach;?>
		</tbody>
	</table>