<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="content__wrapper">
    <div class="content__center">
        <div class="content__indent" style="height: 49px; position: relative;">
            <div class="b-sevice">
                <ul>
                    <? foreach ($arResult as $arItem): ?>
                        <? if ($arItem["PERMISSION"] > "D"): ?>
                            <li class="<?= $arItem["SELECTED"] ? 'on' : '' ?>">
                                <div>
                                    <a href="<?= $arItem["LINK"] ?>">
                                        <ins></ins> <?= $arItem["TEXT"] ?>
                                    </a>
                                </div>
                            </li>
                        <? endif ?>
                    <? endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>


