<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="contacts_page">
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
	<div class="row" id="msk">
		<div class="col-6">
			<h3>Главный офис компании "Контур"</h3>
				<div class="row">
					<div class="col-6">
						<p class="cont_article">Адрес:</p>
						<p>г. Москва,<br>
						5-я Магистральная ул., д. 8А</p>
						<p class="cont_article">Время работы офиса:</p>
						<p>
							Пн-Чт - с 9:00 до 18:00<br>
							Пт - с 9:00 до 17:00<br>
							Сб-Вс - выходные дни
						</p>
						<p class="cont_article">ТЕЛЕФОН</p>
						<p>
							Многоканальный: <a href="tel:84959723449">8 (495) 972-34-49</a><br>
							<!-- Отдел крепежа: <a href="tel:89055768697">8 (905) 576-86-97</a><br>
							Отдел продаж: <a href="tel:89055768785">8 (905) 576-87-85</a><br>
							Отдел роботизации: <a href="tel:89055768785">8 (905) 576-87-85</a> -->
						</p>
					</div>
					<div class="col-6">
						<p class="cont_article">Станция метро МЦК:</p>
						<p>
							<span class="metro_1">Полежаевская</span><br>
							<span class="metro_2">Хорошёвская</span><br>
							<span class="metro_3">Хорошёво</span>
						</p>
						<p style="margin-top: 95px;">E-MAIL:</p>
						<p>
							Отдел крепежа: <a href="krep@kontur-97.ru">krep@kontur-97.ru</a><br>
							Отдел продаж оборудования: <a href="sales@kontur-97.ru">sales@kontur-97.ru</a><br>
							Отдел роботизации: <a href="robot@kontur-97.ru">robot@kontur-97.ru</a>
						</p>
					</div>
				</div>
			</div>
		<div class="col-6">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A96aa2bb5a9b39dc7daff61b5d5e8168be67964544d514cb367f1e3c109e02c76&amp;source=constructor" 
			width="100%" height="425" frameborder="0"></iframe>
		</div>
	</div>
	<div class="row" id="sclad">
		<div class="col-6">
			<h3>Центральный склад компании "Контур"</h3>
				<div class="row">
					<div class="col-6">
						<p class="cont_article">Адрес:</p>
						<p>М.О., г. Химки<br>
							Вашутинское шоссе, д. 1, корп. 5</p>
						<p class="cont_article">Время работы офиса:</p>
						<p>
							Пн-Чт - с 9:00 до 18:00<br>
							Пт - с 9:00 до 16:45<br>
							Сб-Вс - выходные дни
						</p>
						<p class="cont_article">ТЕЛЕФОН</p>
						<p>
							Многоканальный: <a href="tel:84959723449">8 (495) 972-34-49</a>
						</p>
					</div>
					<div class="col-6">
						<p class="cont_article">Станция метро:</p>
						<p>
							<span class="metro_3">Речной вокзал</span>
						</p>
						<p class="cont_article">
							<a href="/upload/Driving_directions_warehouse.png" download="">
								Скачать схему проезда
							</a>
							<br>
							<a href="/upload/Warehouse_access_map.png" download="">
								Скачать схему прохода
							</a>
						</p>
					</div>
				</div>
			</div>
		<div class="col-6">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A05c80cf8e4d8f047a3f385acb42cdc4440161a3e7dafa0a949e9c5bf6d0c31dd&amp;source=constructor" width="100%" height="425" frameborder="0"></iframe>
		</div>
	</div>
	<div class="row" id="spb">
		<div class="col-6">
			<h3>Санкт-Петербург</h3>
				<div class="row">
					<div class="col-6">
						<p class="cont_article">Адрес:</p>
						<p>г. Санкт-Петербург,<br>
							ул. Софийская, д. 66</p>
						<p class="cont_article">Время работы офиса:</p>
						<p>
							Пн-Чт - с 9:00 до 18:00<br>
							Пт - с 9:00 до 17:00<br>
							Сб-Вс - выходные дни
						</p>
						<p class="cont_article">ТЕЛЕФОН</p>
						<p>
							Многоканальный: <a href="tel:88124932846">8 (812) 493-28-46</a>
						</p>
					</div>
					<div class="col-6">
						<p class="cont_article">Станция метро:</p>
						<p>
							<span class="metro_1">Дунайская</span>
						</p>
						<p style="margin-top: 38px;">E-MAIL:</p>
							<p>
								Отдел продаж: <a href="spb@kontur-97.ru">spb@kontur-97.ru</a>
							</p>
					</div>
				</div>
			</div>
		<div class="col-6">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ade01301fb917874df5aa1d3abb7d0cb694a3d858b28c489df018940ffd85bfce&amp;source=constructor" 
			width="100%" height="425" frameborder="0"></iframe>
		</div>
	</div>
	<div class="row" id="ekb">
		<div class="col-6">
			<h3>Екатеринбург</h3>
				<div class="row">
					<div class="col-6">
						<p class="cont_article">Адрес:</p>
						<p>г. Екатеринбург,<br>
							ул. Волховская, д. 20, офис 105</p>
						<p class="cont_article">Время работы офиса:</p>
						<p>
							Пн-Чт - с 9:00 до 18:00<br>
							Пт - с 9:00 до 17:00<br>
							Сб-Вс - выходные дни
						</p>
						<p class="cont_article">ТЕЛЕФОН</p>
						<p>
							Многоканальный: <a href="tel:83432264276">8 (343) 226-42-76</a>
						</p>
					</div>
					<div class="col-6">
						<p class="cont_article">Станция метро:</p>
						<p>
							<span class="metro_5">Уральская</span>
						</p>
						<p style="margin-top: 38px;">E-MAIL:</p>
							<p>
								Отдел продаж: <a href="ural@kontur-97.ru">ural@kontur-97.ru</a>
							</p>
					</div>
				</div>
			</div>
		<div class="col-6">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad1c5916e5a1c0f633b62d90e418bbd2040d4c604c3465db7d2a224141d71c133&amp;source=constructor"
			 width="100%" height="425" frameborder="0"></iframe>
		</div>
	</div>
	<div class="row" id="novosib">
		<div class="col-6">
			<h3>Новосибирск</h3>
				<div class="row">
					<div class="col-6">
						<p class="cont_article">Адрес:</p>
						<p>г. Новосибирск,<br>
							ул. Петухова, 67, корпус 10</p>
						<p class="cont_article">Время работы офиса:</p>
						<p>
							Пн-Чт - с 9:00 до 18:00<br>
							Пт - с 9:00 до 17:00<br>
							Сб-Вс - выходные дни
						</p>
						<p class="cont_article">ТЕЛЕФОН</p>
						<p>
							Многоканальный: <a href="tel:83833752597">8 (383) 375-25-97</a>
						</p>
					</div>
					<div class="col-6">
						<p class="cont_article">Станция метро:</p>
						<p>
							<span class="metro_6">Площадь Маркса</span>
						</p>
						<p style="margin-top: 38px;">E-MAIL:</p>
							<p>
								Отдел продаж: <a href="sibir@kontur-97.ru">sibir@kontur-97.ru</a>
							</p>
					</div>
				</div>
			</div>
		<div class="col-6">
				<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac4126aab012cea25f21e88b863eaaec6f666a51d4673580b863188fdf0056b0f&amp;source=constructor" 
				width="100%" height="425" frameborder="0"></iframe>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>