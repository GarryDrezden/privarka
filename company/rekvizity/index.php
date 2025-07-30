<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Реквизиты");
?>
<div class="content_wrapper rekvizity_page">
	<div class="caption">
		<h1>
			<?$APPLICATION->ShowTitle(true);?>
		</h1>
	</div>
	<?$APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"new_template",
		Array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0"
		)
	);?>
	<p>Полное наименование: Общество с ограниченной ответственностью «КОНТУР»</p>
	<p>Сокращенное наименование: ООО «КОНТУР»</p>
	<p>Юридический адрес: 105187, город Москва, улица Вольная, д. 39, стр. 4, этаж 1, ч.пом. 44</p>
	<p>ИНН: 7725342646</p>
	<p>КПП: 771901001</p>
	<p>ОГРН: 5167746387210</p>
	<p>Расчетный счет: 4070 2810 3023 0001 2394 в АО «АЛЬФА-БАНК», </p>
	<p>К/С: №3010 1810 2000 0000 0593 </p>
	<p>БИК: 044525593</p>
	<p>Электронная почта: <a href="info@kontur-97.ru">info@kontur-97.ru</a></p>
	<p>Телефон: <a href="tel:84959723449">+7 (495) 972-34-49</a></p>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>