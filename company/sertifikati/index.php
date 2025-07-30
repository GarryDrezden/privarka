<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сертификаты");
?>
<div class="content_wrapper">
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
    <style>
        .top_block_sert2 img{
            width: 150px;
            height: 220px;
        }
        .top_block_sert2 a{
            padding-top: 15px;    
            text-align: center;
        }
        .top_block_sert2 .col-6{
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }
    </style>
	<div class="sertificat">
		<div class="row top_block_sert">
			<div class="col-6">
				<div class="row top_block_sert2">
					<div class="col-6">
						<a href="/img/HBC.png" target="_blank">
                            <h3>Сертификат дистрибьютора оборудования HBS</h3>
							<img src="/img/HBC.png" alt="" title=""/>
						</a>
						<a href="/img/HBC.png" download>Скачать</a>
					</div>
					<div class="col-6">
						<a href="/img/IKING.png" target="_blank">
                            <h3>Сертификат дистрибьютора оборудования IKING</h3>
							<img src="/img/IKING.png" alt="" title=""/>
						</a>
						<a href="/img/IKING.png" download>Скачать</a>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row top_block_sert2">
					<div class="col-6">
						<a href="/img/Authorization_Distributor_Letter.png" target="_blank">
                            <h3>Сертификат дистрибьютора оборудования MPS</h3>
							<img src="/img/Authorization_Distributor_Letter.png" alt="" title=""/>
						</a>
						<a href="/img/Authorization_Distributor_Letter.png" download>Скачать</a>
					</div>
					<div class="col-6">
						<a href="/img/Dongguan_Grand_Metal_Co.png" target="_blank">
                            <h3>Сертификат дистрибьютора оборудования Grand Metal</h3>
							<img src="/img/Dongguan_Grand_Metal_Co.png" alt="" title=""/>
						</a>
						<a href="/img/Dongguan_Grand_Metal_Co.png" download>Скачать</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row top_block_sert">
			<div class="col-6">
				<div class="row top_block_sert2">
					<div class="col-6">
						<a href="/img/RSM.png" target="_blank">
                            <h3>Сертификат дистрибьютора оборудования RSM</h3>
							<img src="/img/RSM.png" alt="" title="" style="width:auto;"/>
						</a>
						<a href="/img/RSM.png" download>Скачать</a>
					</div>
					<div class="col-6">
						<a href="/img/Yuanpeng.png" target="_blank">
                            <h3>Сертификат дистрибьютора оборудования YUANPENG</h3>
							<img src="/img/Yuanpeng.png" alt="" title="" style="width:auto;"/>
						</a>
						<a href="/img/Yuanpeng.png" download>Скачать</a>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row top_block_sert2">
					<div class="col-6">
					</div>
					<div class="col-6">
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="row top_block_sert">
			<div class="col-6">
				<img src="/img/s3.png" class="top_block_sert_img1" alt="" title=""/>
				<br>
				<a href="" target="_blank">Декларация соответствия на оборудование</a>
				<br>
				<a href="" target="_blank">Отказное письмо на резьбовую заклепку</a>
				<br>
				<a href="" target="_blank">Отказное письмо на крепеж</a>
				<div class="row top_block_sert2">
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s3.1.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s3.2.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s3.3.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
				</div>
			</div>
			<div class="col-6">
				<img src="/img/s4.png" class="top_block_sert_img1" alt="" title=""/>
				<br>
				<a href="" target="_blank">Декларация соответствия по оборудованию и приварному крепежу </a>
				<br>
				<a href="" target="_blank">Сертификат авторизированного продавца</a>
				<br>
				<a href="" target="_blank">Отказное письмо на крепеж</a>
				<div class="row top_block_sert2">
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s4.1.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s4.2.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s4.3.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row top_block_sert">
			<div class="col-6">
				<img src="/img/s5.png" class="top_block_sert_img1" alt="" title=""/>
				<br>
				<a href="" target="_blank">Сертификаты FAR</a>
				<div class="row top_block_sert2">
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s4.1.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
					<div class="col-3">
						<a href="" target="_blank">
							<img src="/img/s4.2.png" alt="" title=""/>
						</a>
						<a href="" target="_blank">Скачать</a>
					</div>
				</div>
			</div>
			<div class="col-6">

			</div>
		</div> -->
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>