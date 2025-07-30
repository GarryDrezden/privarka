<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<div class="b-menu context" tag="left-menu">
	<ul class="level-1" tag="left-menu-1">

	<?

	$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

	<?if ($arItem["DEPTH_LEVEL"] == 1):?>
	<li class="item-1 <?=($arItem["SELECTED"])?'on-1':''?>">
	<span>
					<a href="<?=$arItem["LINK"]?>">
						<ins></ins>
						<?=$arItem["TEXT"]?>
					</a>
				</span>
	<ul class="level-2" tag="left-menu-2">
	<?endif;?>
	<?if ($arItem["DEPTH_LEVEL"] == 2):?>
	<li class="item-2 <?=($arItem["SELECTED"])?'on-2':''?>">

					<a href="<?=$arItem["LINK"]?>">
						<?=$arItem["TEXT"]?>
					</a>
	<ul class="level-3" tag="left-menu-3">
	<?endif;?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="item-1 <?=($arItem["SELECTED"])?'on-1':''?>">
				<span>
					<a href="<?=$arItem["LINK"]?>">
						<ins></ins>
						<?=$arItem["TEXT"]?>
					</a>
				</span></li>
			<?else:?>
				<li class="item-<?=$arItem["DEPTH_LEVEL"]?>  <?=($arItem["SELECTED"])?'on-0'.$arItem["DEPTH_LEVEL"]:''?>">
					<a href="<?=$arItem["LINK"]?>">
						<?=$arItem["TEXT"]?>
					</a>
				</li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

	<?if ($previousLevel > 1)://close last item tags?>
		<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
	<?endif?>

		</ul></div>
<?endif?>
