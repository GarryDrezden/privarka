<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<ul class="b-link-bar__item">
    <? foreach ($arResult as $arItem): ?>
        <? if ($arItem["PERMISSION"] > "D"): ?>
            <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
        <? endif ?>
    <? endforeach ?>
</ul>
