<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
?>

<div class="bx-sbb-empty-cart-container">
	<div class="bx-sbb-empty-cart-image">
		<img src="" alt="">
	</div>
	<div class="bx-sbb-empty-cart-text"><?=Loc::getMessage("SBB_EMPTY_BASKET_TITLE")?></div>
	<p>Выберите из <a href="/catalog/" class="catalog_link">каталога</a> подходящие вам товары и положите их в корзину. Если вы затрудняетесь с выбором, пожалуйста, обратитесь за консультацией к нашим менеджерам.</p>
	<p>Если вы наполняли корзину при прошлом визите, авторизуйтесь, чтобы увидеть выбранные товары.</p>
	<a href="/auth/" class="btn_main">Авторизоваться</a>
</div>