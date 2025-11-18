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

\Bitrix\Main\UI\Extension::load('ui.fonts.opensans');

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
$code_backcall = $APPLICATION->CaptchaGetCode();
?>
<style>
	.catalog_all{
		display: flex;
		flex-flow: column;
	}	
	.card_sections_block{
		display: flex;
		flex-flow: wrap;
    	height: auto;
    	padding-bottom: 30px;
		border-bottom: 1px solid #ddd;
	}
	.card_section{
		width: 228px;
		height:120px;
		display: flex;
		align-items: center;
		background-color: #fff;
		box-shadow: 0 1px 4px 0 #bfbfbf;
		box-sizing: border-box;
		margin-left: 10px;
    	margin-top: 10px;
		border-radius: 5px;
	}
	.card_section_img{
		width: 80px;
		height: 80px;
	}
	.card_section_body{
		padding-left: 5px;
	}
	.card_section_title {
		padding: 0 5px;
	}
	.card_section_title a{
		color: #000;
		text-decoration: none;
		font-weight: 600;
		font-size: 12px;
	}
	/*Таблицы типоразмеров*/
	.metrix_tables{
		padding: 10px 0 25px 0;
	}
	.metrix_tables details{
		font-size: 16px;
	}
	.metrix_tables summary{
		padding: 10px;
		font-size: 16px;
	}
	.metrix_tables table{
		width: 100%;
		text-align: center;
	}
	.metrix_tables h2{
		padding: 25px 0 10px 0;
	}
</style>
<div class="news-list<?=$themeClass?>">
	<div class="col-sale">
		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?><br />
		<?endif;?>

		<div class="row catalog_all">
			<div class="card_sections_block">
<?foreach($arResult["ITEMS"] as $arItem):
$catalog_link = $arItem['PROPERTIES']['LINK']['VALUE'];
if(empty($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE'])){
$res = CIBlockSection::GetByID($arItem['PROPERTIES']['CATALOG_PAGE']['VALUE']);
$ar_res = $res->GetNext();
$catalog_page = $ar_res['SECTION_PAGE_URL'];
$url_request = $_SERVER['REQUEST_URI'];
}else{
$catalog_page = rawurldecode($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE']);
$url_request = rawurldecode($_SERVER['REQUEST_URI']);
}
						//echo $catalog_page.'<br>';
						//echo $url_request.'<br>';
						//echo $_SERVER['REQUEST_URI'];
						if($catalog_page == $url_request){
				?>
				<div class="card_section" data-id="<?=$arItem['ID']?>">
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="card_section_img" alt="...">
					<div class="card_section_body">
						<p class="card_section_title">
							<a href="<?=$catalog_link?>">
								<?echo $arItem["NAME"]?>
							</a>
						</p>
					</div>
				</div>
				<?}else{}?>
				<? endforeach;?>

				<?if($url_request == "/krepezh/privarnoy_krepyezh/krepezh_dlya_dugovoy_svarki_arc/filter/mount_type-is-гибкий упор/work_materials-is-955bf239d420ce5d5d8c8d7a0343903f/apply/"){ ?>
					<style>
						.other_all_form{
							display: flex;
							flex-flow: column;
						}
						.other_all_form p{
							font-size: 15px;
							padding-top: 10px;
						}
						.other_all_form h5,
						.other_all_form input{
							font-size: 15px;
						}
					</style>
					<div class="other_all_form">
						<h2>Продукция доступна под заказ.</h2>
						<div id="" class="" style="display: block;min-width:470px; width: 50%;">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title text-center">Введите Ваши данные</h5>
							</div>
							<div style="text-align:left;padding:0 20px;">
								<p>Наш менеджер свяжется с Вами в ближайшее время</p>
							</div>
							<form id="other_form" action="" method="post">
								<div class="modal-body back_call_list">
									<div class="input-group">
										<span class="input-group-text">Имя</span>
										<input type="text" name="backcall_name" id="other_name_product" class="form-control" value="" required="">
									</div>     
									<br>
									<div class="input-group">
										<span class="input-group-text">Телефон</span>
										<input type="text" name="backcall_phone" id="other_phone_product" class="form-control form_phone" value="" required="">
									</div>  
									<input type="hidden" id="other_url_page" value="<?=$url_request?>"/>  
									<br> 
									<div class="input-group" style="justify-content: space-between;flex-flow: row;">
										<div class="holder" id="cap-block2">
											<span class="input-group-text">Введите символы с картинки</span>
											<input id="cap_input" name="captcha_word" type="text">
											<input name="captcha_code" id="cap_code" value="<?=htmlspecialchars($code_backcall);?>" type="hidden">
										</div>
										<div class="holder" id="cap-block">
											<img id="cap-img" style="height: 53px;width: 180px;" src="/bitrix/tools/captcha.php?captcha_code=<?=htmlspecialchars($code_backcall);?>">
										</div>
									</div>     
									<br>
								</div>
								<div class="modal-footer">
									<button type="submit" onclick="backAllForm(event)" class="but_small backcall_button">Отправить</button>
								</div>
								<label class="politika-konfidentsialnosti">
									<input type="checkbox" value="N" checked="" name="">
									<span class="main-user-consent-request-announce-link">Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в <a href="/politika-konfidentsialnosti/" target="_blank">Согласии на обработку персональных данных</a></span>
								</label>
							</form>
							<div id="other_message"></div>
						</div>
					</div>
				</div>
				    
				<script>
				//Форма на страницах под доставку
					function backAllForm(event){
						event.preventDefault();
						var $data = {};
						$data['backcall_name_product'] = document.getElementById('other_name_product').value;
						$data['backcall_phone_product'] = document.getElementById('other_phone_product').value;
						if(document.getElementById('other_url_page')){
							$data['backcall_url_page'] = document.getElementById('other_url_page').value;
						}
						$data['captcha_word'] = document.getElementById('cap_input').value;
						$data['captcha_code'] = document.getElementById('cap_code').value;
						let name = document.getElementById('other_name_product').value;
						let phone = document.getElementById('other_phone_product').value;
						if(name == '' || phone == ''){
							alert("Пожалуйста заполните все поля");
						}else{
							$.ajax({
								type: 'POST',
								url: '/ajax/forms/other_form.php',
								data: $data,
								dataType: "json",
								success: function(data){
									if(data.done == true){
										$('#other_message').html(data.mess);
									}else{
										$('#other_message').html(data.mess);
										ReloadCapture(data.capture_reload_code);
									}
								}
							});
						}
					};
				</script>
				<?}?>
			</div>
			<div class="metrix_tables">
				<?$APPLICATION->IncludeFile("/local/templates/privarka2023/includes/tables/tables_sect.php",
					Array(),
					Array("MODE"=>"PHP")
					);
				?>
				
			</div>
		</div>
	</div>
</div>