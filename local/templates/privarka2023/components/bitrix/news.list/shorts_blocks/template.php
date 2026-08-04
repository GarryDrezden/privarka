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
		word-break: break-word;
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
				<?php
				// ОТЛАДКА: Проверка наличия массива ITEMS
				$debug_info = [];
				$debug_info['items_exists'] = isset($arResult["ITEMS"]);
				$debug_info['items_count'] = $debug_info['items_exists'] ? count($arResult["ITEMS"]) : 0;
				$debug_info['current_url'] = $_SERVER['REQUEST_URI'];
				$debug_info['is_admin'] = $USER->IsAdmin();
				$debug_info['user_id'] = $USER->GetID();
				$debug_info['user_groups'] = $USER->GetUserGroupArray();
				$debug_info['arResult_keys'] = array_keys($arResult);
				$debug_info['arResult_has_items'] = isset($arResult["ITEMS"]);
				$debug_info['arResult_has_nav'] = isset($arResult["NAV_STRING"]);
				$debug_info['arResult_has_iblock'] = isset($arResult["IBLOCK_ID"]);
				$debug_info['arResult_iblock_id'] = isset($arResult["IBLOCK_ID"]) ? $arResult["IBLOCK_ID"] : null;
				$debug_info['items'] = [];
				
				$matched_items_count = 0;
				$url_request = $_SERVER['REQUEST_URI']; // Определяем до цикла
				
				/**
				 * Универсальная функция нормализации URL для сравнения
				 * Заменяет похожие кириллические символы на латинские аналоги
				 * Это решает проблему, когда в URL используются разные варианты написания
				 * 
				 * @param string $url URL для нормализации
				 * @return string Нормализованный URL
				 */
				$normalizeUrlForComparison = function($url) {
					// Массив замен: кириллический символ => латинский аналог
					// Включаем как строчные, так и заглавные буквы
					$replacements = [
						// Строчные буквы
						'а' => 'a',  // кириллическая 'а' → латинская 'a'
						'е' => 'e',  // кириллическая 'е' → латинская 'e'
						'о' => 'o',  // кириллическая 'о' → латинская 'o'
						'р' => 'p',  // кириллическая 'р' → латинская 'p'
						'с' => 'c',  // кириллическая 'с' → латинская 'c'
						'у' => 'y',  // кириллическая 'у' → латинская 'y'
						'х' => 'x',  // кириллическая 'х' → латинская 'x'
						'м' => 'm',  // кириллическая 'м' → латинская 'm'
						'т' => 't',  // кириллическая 'т' → латинская 't'
						'к' => 'k',  // кириллическая 'к' → латинская 'k'
						'н' => 'h',  // кириллическая 'н' → латинская 'h' (похожие)
						'в' => 'b',  // кириллическая 'в' → латинская 'b' (похожие)
						// Заглавные буквы
						'А' => 'A',
						'Е' => 'E',
						'О' => 'O',
						'Р' => 'P',
						'С' => 'C',
						'У' => 'Y',
						'Х' => 'X',
						'М' => 'M',
						'Т' => 'T',
						'К' => 'K',
						'Н' => 'H',
						'В' => 'B',
					];
					
					// Применяем замены
					$normalized = strtr($url, $replacements);
					
					// Дополнительно нормализуем пробелы и другие символы
					$normalized = preg_replace('/\s+/', ' ', trim($normalized));
					
					return $normalized;
				};
				
				if($debug_info['items_exists'] && $debug_info['items_count'] > 0){
					foreach($arResult["ITEMS"] as $arItem){
						// ОТЛАДКА: Проверка свойств элемента
						$item_debug = [];
						$item_debug['item_id'] = $arItem['ID'];
						$item_debug['item_name'] = $arItem['NAME'];
						$item_debug['has_link'] = isset($arItem['PROPERTIES']['LINK']['VALUE']);
						$item_debug['has_anchor'] = isset($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE']) && !empty($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE']);
						$item_debug['has_catalog_page'] = isset($arItem['PROPERTIES']['CATALOG_PAGE']['VALUE']) && !empty($arItem['PROPERTIES']['CATALOG_PAGE']['VALUE']);
						
						$catalog_link = isset($arItem['PROPERTIES']['LINK']['VALUE']) ? $arItem['PROPERTIES']['LINK']['VALUE'] : '';
						
						if(empty($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE'])){
							if(!empty($arItem['PROPERTIES']['CATALOG_PAGE']['VALUE'])){
								$res = CIBlockSection::GetByID($arItem['PROPERTIES']['CATALOG_PAGE']['VALUE']);
								if($res){
									$ar_res = $res->GetNext();
									if($ar_res && isset($ar_res['SECTION_PAGE_URL'])){
										$catalog_page = $ar_res['SECTION_PAGE_URL'];
										$chars = ['krepezh/','oborudovanie/'];
										$catalog_page = str_replace($chars, '', $catalog_page);
									} else {
										$catalog_page = '';
										$item_debug['errors'][] = 'Section not found';
									}
								} else {
									$catalog_page = '';
									$item_debug['errors'][] = 'CIBlockSection::GetByID failed';
								}
							} else {
								$catalog_page = '';
								$item_debug['errors'][] = 'No CATALOG_PAGE value';
							}
						}else{
							$catalog_page = rawurldecode($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE']);
						}
						
						// Декодируем URL запроса (может содержать URL-кодированные символы типа %D1%81d)
						$decoded_url_request = rawurldecode($url_request);
						
						// Нормализуем оба URL с помощью универсальной функции
						// Это заменяет все похожие кириллические символы на латинские аналоги
						$normalized_catalog_page = $normalizeUrlForComparison($catalog_page);
						$normalized_url_request = $normalizeUrlForComparison($decoded_url_request);
						
						$item_debug['catalog_page'] = $catalog_page;
						$item_debug['url_request'] = $url_request;
						$item_debug['decoded_url_request'] = $decoded_url_request;
						$item_debug['normalized_catalog_page'] = $normalized_catalog_page;
						$item_debug['normalized_url_request'] = $normalized_url_request;
						$item_debug['match'] = ($normalized_catalog_page == $normalized_url_request);
						$item_debug['anchor_page_value'] = isset($arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE']) ? $arItem['PROPERTIES']['ANCHOR_PAGE']['VALUE'] : null;
						$item_debug['catalog_page_id'] = isset($arItem['PROPERTIES']['CATALOG_PAGE']['VALUE']) ? $arItem['PROPERTIES']['CATALOG_PAGE']['VALUE'] : null;
						
						// Сохраняем отладочную информацию
						$debug_info['items'][] = $item_debug;
						
						if($normalized_catalog_page == $normalized_url_request){
							$matched_items_count++;
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
				<?php
						}
					}
				}
				
				$debug_info['matched_items_count'] = $matched_items_count;
				
				// ОТЛАДКА: Сохранение данных в глобальную переменную и создание функции для вывода
				?>
				<script>
				// Явно создаем глобальную переменную
				if(typeof window.cardSectionsDebug === 'undefined'){
					window.cardSectionsDebug = {};
				}
				
				// Создаем функцию сразу, чтобы она была доступна даже при ошибках
				window.cardSectionsDebug.show = function(){
					if(!window.cardSectionsDebug || !window.cardSectionsDebug.data){
						console.error('Отладочные данные не найдены. Компонент может быть не загружен на этой странице.');
						console.log('Проверьте, что компонент news.list с шаблоном shorts_blocks загружен на этой странице.');
						return;
					}
					
					// Получаем данные из глобальной переменной
					var debug = window.cardSectionsDebug.data;
					var matchedCount = window.cardSectionsDebug.matchedItemsCount || 0;
					
					console.group('%c🔍 DEBUG: card_sections_block', 'font-size: 16px; font-weight: bold; color: #0066cc;');
					
					// Основная информация
					console.group('%c📊 Основная информация', 'font-size: 14px; font-weight: bold; color: #333;');
					console.log('ITEMS exists:', debug.items_exists);
					console.log('ITEMS count:', debug.items_count);
					console.log('Current URL:', debug.current_url);
					console.log('Is Admin:', debug.is_admin);
					console.log('User ID:', debug.user_id || 'null');
					console.log('User Groups:', debug.user_groups || []);
					console.log('Matched items:', matchedCount);
					console.groupEnd();
					
					// Информация о структуре $arResult
					console.group('%c🔧 Структура $arResult', 'font-size: 14px; font-weight: bold; color: #333;');
					console.log('arResult keys:', debug.arResult_keys || []);
					console.log('Has ITEMS:', debug.arResult_has_items);
					console.log('Has NAV_STRING:', debug.arResult_has_nav);
					console.log('Has IBLOCK_ID:', debug.arResult_has_iblock);
					console.log('IBLOCK_ID:', debug.arResult_iblock_id || 'not set');
					console.groupEnd();
					
					if(debug.items_count > 0 && debug.items && debug.items.length > 0){
						// Детальная информация по каждому элементу
						console.group('%c📦 Детали элементов (' + debug.items_count + ')', 'font-size: 14px; font-weight: bold; color: #333;');
						
						var items = debug.items;
						
						items.forEach(function(item, index){
							var matchStatus = item.match ? '%c✓ MATCH' : '%c✗ NO MATCH';
							var matchColor = item.match ? 'color: green; font-weight: bold;' : 'color: red;';
							
							console.group(matchStatus + ' - Item #' + item.item_id + ': ' + item.item_name, matchColor);
							console.log('ID:', item.item_id);
							console.log('Name:', item.item_name);
							console.log('Has LINK:', item.has_link);
							console.log('Has ANCHOR_PAGE:', item.has_anchor, item.anchor_page_value ? '(' + item.anchor_page_value + ')' : '');
							console.log('Has CATALOG_PAGE:', item.has_catalog_page, item.catalog_page_id ? '(ID: ' + item.catalog_page_id + ')' : '');
							console.log('Catalog page:', item.catalog_page || '(empty)');
							console.log('URL request (raw):', item.url_request || '(empty)');
							if(item.decoded_url_request){
								console.log('%cDecoded URL request:', 'color: #888; font-style: italic;', item.decoded_url_request);
							}
							if(item.normalized_catalog_page || item.normalized_url_request){
								console.log('%cNormalized catalog page:', 'color: #666; font-weight: bold;', item.normalized_catalog_page || '(empty)');
								console.log('%cNormalized URL request:', 'color: #666; font-weight: bold;', item.normalized_url_request || '(empty)');
							}
							console.log('Match:', item.match);
							
							if(item.errors && item.errors.length > 0){
								console.group('%c⚠ Ошибки:', 'color: red; font-weight: bold;');
								item.errors.forEach(function(error){
									console.error(error);
								});
								console.groupEnd();
							}
							
							console.groupEnd();
						});
						
						console.groupEnd();
						
						// Таблица для удобного просмотра
						console.group('%c📋 Таблица элементов', 'font-size: 14px; font-weight: bold; color: #333;');
						console.table(items.map(function(item){
							return {
								'ID': item.item_id,
								'Name': item.item_name,
								'Match': item.match ? '✓' : '✗',
								'Catalog Page': item.catalog_page || '(empty)',
								'Has ANCHOR': item.has_anchor ? 'Yes' : 'No',
								'Has CATALOG': item.has_catalog_page ? 'Yes' : 'No',
								'Errors': item.errors ? item.errors.join(', ') : ''
							};
						}));
						console.groupEnd();
						
					} else {
						console.group('%c❌ ERROR: $arResult["ITEMS"] is empty or not set!', 'font-size: 14px; font-weight: bold; color: red;');
						console.error('Компонент не вернул элементы.');
						console.log('');
						console.log('%cВозможные причины:', 'font-weight: bold;');
						console.log('1. В инфоблоке нет активных элементов');
						console.log('2. Элементы не доступны для текущей группы пользователей');
						console.log('3. Неправильные параметры компонента (IBLOCK_ID, IBLOCK_TYPE)');
						console.log('4. Фильтр исключает все элементы');
						console.log('5. Проблема с правами доступа к инфоблоку');
						console.log('');
						console.log('%cПроверьте:', 'font-weight: bold;');
						console.log('- IBLOCK_ID:', debug.arResult_iblock_id || 'не установлен');
						console.log('- Группы пользователя:', debug.user_groups || []);
						console.log('- Ключи в $arResult:', debug.arResult_keys || []);
						console.groupEnd();
					}
					
					// Итоговая статистика
					console.group('%c📈 Итоговая статистика', 'font-size: 14px; font-weight: bold; color: #333;');
					console.log('Total items processed:', debug.items_count);
					console.log('Matched items:', matchedCount);
					console.log('Cards displayed:', matchedCount);
					console.log('Match rate:', debug.items_count > 0 ? (Math.round((matchedCount / debug.items_count) * 100 * 100) / 100) + '%' : '0%');
					console.groupEnd();
					
					console.groupEnd();
				};
				
				try {
					// Сохраняем отладочные данные
					window.cardSectionsDebug.data = <?= json_encode($debug_info, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>;
					window.cardSectionsDebug.matchedItemsCount = <?= $matched_items_count ?>;
				} catch(e) {
					// Все равно создаем функцию, даже если данные не загрузились
					window.cardSectionsDebug.show = function(){
						console.error('Ошибка при загрузке отладочных данных. Проверьте консоль на наличие ошибок выше.');
					};
				}
				</script>
				<?php
				?>

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