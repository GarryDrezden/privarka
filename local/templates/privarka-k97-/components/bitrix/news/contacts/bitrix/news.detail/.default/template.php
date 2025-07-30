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
<div class="news-detail">
    <? foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty):
        if ($arProperty['CODE'] == 'MAPS') continue; ?>
        <p>
            <?= $arProperty["NAME"] ?>:&nbsp;
            <? if (is_array($arProperty["DISPLAY_VALUE"])): ?>
                <?= implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]); ?>
            <? else: ?>
                <?= $arProperty["DISPLAY_VALUE"]; ?>
            <? endif ?>
        </p>
    <? endforeach; ?>
    <?if($arResult["DISPLAY_PROPERTIES"]['MAPS']["DISPLAY_VALUE"]){?>
        <?=$arResult["DISPLAY_PROPERTIES"]['MAPS']["DISPLAY_VALUE"];?>
    <?}?>
    <? if ($arResult['DETAIL_TEXT']) {
        ?>
        <p>
            <?= $arResult['DETAIL_TEXT'] ?>
        </p>
        <?
    } ?>
</div>