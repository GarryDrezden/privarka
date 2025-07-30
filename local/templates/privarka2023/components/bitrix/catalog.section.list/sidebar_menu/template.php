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
<div class="b-menu context" tag="left-menu">
    <ul class="level-1" tag="left-menu-1">
        <?
        $previousLevel = 0;
        foreach ($arResult['SECTIONS'] as $iItemKey => $arItem):
        if (isset($arResult['SECTIONS'] [$iItemKey + 1])) {
            if ($arResult['SECTIONS'] [$iItemKey + 1]['DEPTH_LEVEL'] > $arItem['DEPTH_LEVEL']) {
                $arItem['IS_PARENT'] = true;
            }
        }
        if($arParams['CURRENT_PARENT_SECTION'] == $arItem['ID']){
            $arItem['SELECTED'] = true;
        }
        if($arParams['CURRENT_SECTION'] == $arItem['ID']){
            $arItem['SELECTED'] = true;
        }
        if($arItem['UF_NAME']){
            $arItem['NAME'] = $arItem['UF_NAME'];
        }

        ?>

        <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
            <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
        <? endif ?>

        <? if ($arItem["IS_PARENT"]): ?>

            <? if ($arItem["DEPTH_LEVEL"] == 1){ ?>
            <li class="item-1 <?= ($arItem["SELECTED"]) ? 'on-1' : '' ?>">
                <span>
                    <a href="<?= $arItem["SECTION_PAGE_URL"] ?>">
                        <ins></ins>
                        <?= $arItem["NAME"] ?>
                        </a>
                </span>
                <ul class="level-2" tag="left-menu-2">
            <? } ?>


            <? if ($arItem["DEPTH_LEVEL"] == 2){ ?>
            <li class="item-2 <?= ($arItem["SELECTED"]) ? 'on-2' : '' ?>">

                <a href="<?= $arItem["SECTION_PAGE_URL"] ?>">
                    <?= $arItem["NAME"] ?>
                </a>
                <ul class="level-3" tag="left-menu-3">
            <? } ?>

        <? else: ?>


        <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
        <li class="item-1 <?= ($arItem["SELECTED"]) ? 'on-1' : '' ?>">
            <span>
                <a href="<?= $arItem["SECTION_PAGE_URL"] ?>">
                    <ins></ins>
                    <?= $arItem["NAME"] ?>
                </a>
            </span>
        </li>
        <? else: ?>
            <li class="item-<?= $arItem["DEPTH_LEVEL"] ?>  <?= ($arItem["SELECTED"]) ? 'on-0' . $arItem["DEPTH_LEVEL"] : '' ?>">
                <a href="<?= $arItem["SECTION_PAGE_URL"] ?>">
                    <?= $arItem["NAME"] ?>
                </a>
            </li>
        <? endif ?>


        <? endif ?>

        <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

        <? endforeach ?>

        <? if ($previousLevel > 1)://close last item tags?>
            <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
        <? endif ?>

    </ul>
</div>



