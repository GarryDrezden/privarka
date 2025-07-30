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

    <h4>Представительство в г. <?= $arItem['NAME'] ?></h4>
    <? foreach ($arItem["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
        <p>
            <?= $arProperty["NAME"] ?>:&nbsp;
            <?if ($arProperty["NAME"]!="Email") {?>
            <? if (is_array($arProperty["DISPLAY_VALUE"])): ?>
                <?= implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]); ?>
            <? else: ?>
                <?= $arProperty["DISPLAY_VALUE"]; ?>
            <? endif ?>
            <?} else {?>
                <a href="mailto:<?= $arProperty["DISPLAY_VALUE"]; ?>" style="color:#0000ff;"><?= $arProperty["DISPLAY_VALUE"]; ?></a>
            <?}?>
        </p>
    <? endforeach; ?>
    <p>
        <?= $arItem['PREVIEW_TEXT'] ? $arItem['PREVIEW_TEXT'] : '' ?>
    </p>
    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">ПОДРОБНЕЕ►</a>


<? endforeach; ?>
