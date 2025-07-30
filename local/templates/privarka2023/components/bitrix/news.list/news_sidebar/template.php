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
<div class="b-news" tag="news-list">
    <!--
    <h2>Новости</h2>
    -->
    <noindex>
        <p style="color: #000000; font-size: 16px; text-transform: uppercase;margin: 0px 0px 0.3em; font-family: Arial; font-weight: normal; font-style: normal; text-decoration: none;">
            Новости
        </p>
        <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?><br/>
        <? endif; ?>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <dl id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <dt><?= strtolower($arItem['DISPLAY_ACTIVE_FROM']) ?></dt>
                <dd>
                    <a class="news-title" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem['NAME'] ?></a>

                    <span style="color: #000000;">
                       <table border="0" cellpadding="1" cellspacing="1" style="width: 200px;">
                           <tbody>
                           <? if (isset($arItem["DETAIL_PICTURE"]["SRC"]) && $arItem["DETAIL_PICTURE"]["SRC"]) { ?>
                               <?
                               $aImageSize = array('width' => 200, 'height' => 9999);
                               $aImage = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], $aImageSize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
                               if (isset($aImage['src']) && $aImage['src']) { ?>


                                   <tr>
                                       <td>
                                           <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                               <img original="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                                                    alt="<?= $arItem["DETAIL_PICTURE"]["ALT"] ?>"
                                                    src="<?= $aImage['src'] ?>"
                                                    style="width: <?= $aImage['width'] ?>px; height: <?= $aImage['height'] ?>px;"/>
                                           </a>
                                       </td>
                                   </tr>
                                   <?
                               }
                           }
                           ?>

                           <? if (isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"]) { ?>
                               <?
                               $aImageSize = array('width' => 200, 'height' => 9999);
                               $aImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], $aImageSize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
                               if (isset($aImage['src']) && $aImage['src']) { ?>


                                   <tr>
                                       <td>
                                           <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                               <img original="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                                    alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                                    src="<?= $aImage['src'] ?>"
                                                    style="width: <?= $aImage['width'] ?>px; height: <?= $aImage['height'] ?>px;"/>
                                           </a>
                                       </td>
                                   </tr>
                                   <?
                               }
                           }
                           ?>
                           </tbody>
                       </table>
                     </span>
                </dd>
            </dl>
        <? endforeach; ?>
        <br>
    </noindex>
</div>