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

<table width="100%">
    <tbody>


    <? foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<tr >
        <td id="m-guests" colspan="2">
            <?=$arResult['ELEMENT_NAME']?> оставлен <?=strtolower($arItem ['DISPLAY_ACTIVE_FROM'])?>

        </td>
    </tr>
    <tr class="guest_bg_1">
        <td><b>ФИО:&nbsp;</b></td>
        <td><?=$arItem['PROPERTIES']['NAME']['VALUE']?></td>
    </tr>

    <tr class="guest_bg_2">
        <td>
            <nobr><b>Город:&nbsp;</b></nobr>
        </td>
        <td><?=$arItem['PROPERTIES']['CITY']['VALUE']?></td>
    </tr>

    <tr class="guest_bg_1" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <td>
            <nobr><b><?=$arResult['ELEMENT_NAME']?>:&nbsp;</b></nobr>
        </td>
        <td>
            <p>
                <?=$arItem['PREVIEW_TEXT']?>
            </p>
        </td>
    </tr>
    <?if($arItem['~DETAIL_TEXT']){?>
    <tr class="guest_bg_2">
        <td>
            <nobr><b>Ответ:&nbsp;</b></nobr>
        </td>
        <td>
            <?=$arItem['~DETAIL_TEXT']?>
        </td>
    </tr>
    <?}?>
    <tr>
        <td>
            <br>
        </td>
    </tr>
<?endforeach; ?>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>

    </tbody>
</table>