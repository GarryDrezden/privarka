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
<div class="engine">
    <div class="engine__detail-wrapper">
        <? if ($arResult["DETAIL_TEXT"]): ?>
            <p><?= $arResult["~DETAIL_TEXT"] ?></p>
            <? elseif ($arResult["PREVIEW_TEXT"]): ?>
            <p><?= $arResult["~PREVIEW_TEXT"] ?></p>
            <? endif; ?>
    </div>
</div>

<table cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td>
                <img src="/img/null.gif" width="1" height="10" alt="">
            </td>
        </tr>

        <tr>
            <td>
                <div id="contacts" class="vcard">
                    По всем вопросам обращайтесь в компанию <a class="fn url org" href="http://www.k97.ru/">Контур</a><br>
                    по адресу:
                    <span class="adr">
                        <span class="country-name">Россия</span>,
                        <span class="postal-code">121170</span>,
                        <span class="locality">г. Москва</span>, 
                        <span class="street-address">Кутузовский проспект, 36, стр.3, подъезд 3, офис 508</span>.
                    </span><br>
                    по e-mail: <b><a class="email" href="mailto:info@kontur-97.ru">sales@kontur-97.ru</a></b>,<br>
                    или по телефонам <b><span class="tel"><abbr class="value" title="+7 (495) 972-34-49">(495) 972-34-49</abbr></span></b>, <b><span class="tel"><abbr class="value" title="+7 (499) 917 05 25">(499) 917 05 25 (факс)</abbr></span></b>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <br><a href="/engine/">Вернуться к списку статей</a><br>
                <a href="/catalog/">Наш каталог</a><br>
                <a href="/">На главную</a><br> 
            </td>
        </tr>
    </tbody></table>