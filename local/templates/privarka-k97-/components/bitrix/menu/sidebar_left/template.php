<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="sidebar">
<ul class="sidebar__menu">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
		<li class="sidebar__menu-item <?=isset($arItem["PARAMS"]['class'])?$arItem["PARAMS"]['class']:''?>">
			<a class="sidebar__menu-item-link" href="<?=$arItem["LINK"]?>">
				<?=$arItem["TEXT"]?>
			</a>
		</li>
<?endforeach?>
</ul>
</div>
<?endif?>