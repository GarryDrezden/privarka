<?php
use Bitrix\Sale;
\Bitrix\Main\Loader::includeModule('iblock');
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}
global $USER;
//Подгружаем капчу
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
if(strlen($captchaPass) <= 0){
	    $captchaPass = randString(10);
	    COption::SetOptionString("main", "captcha_password", $captchaPass);
}
$cpt->SetCodeCrypt($captchaPass);
//Получаем корзину
$basketRes = Sale\Internals\BasketTable::getList(array(
    'filter' => array(
        'FUSER_ID' => Sale\Fuser::getId(), 
        'ORDER_ID' => null,
        'LID' => SITE_ID,
        'CAN_BUY' => 'Y',
    )
));
//Данные по пользователю
$USER->GetID();
$user_id = $USER->GetID();
$res = Bitrix\Main\UserTable::getList(Array(
    "select"=>array('*'),
    "filter"=>array('ID' => $user_id),
));
 while ($arUser = $res->fetch()) {
   $arUserResult[] = $arUser;
 }

$arRes = CUser::GetList(
	($by="ID"), 
	($order="desc"),
	array('ID' => $user_id),
	array('SELECT'=>array('UF_TYPE_UR_FACE','UF_INN', 'UF_KPP', 'UF_COMP_NAME', 'UF_UR_ADDRESS', 'UF_CONTACT_FACE'))
);
    if ($res_dop = $arRes->Fetch()) {
        if($res_dop['UF_TYPE_UR_FACE'] == 3 || $res_dop['UF_TYPE_UR_FACE'] == 4){
			$ur_face = 'Y';
		}
    }
$user_name = $arUserResult[0]['LAST_NAME'].' '.$arUserResult[0]['NAME'].' '.$arUserResult[0]['SECOND_NAME'];
$user_phone = $arUserResult[0]['PERSONAL_PHONE'];
$user_email = $arUserResult[0]['EMAIL'];
$user_inn = $res_dop['UF_INN'];
$user_kpp = $res_dop['UF_KPP'];
$user_comp_name= $res_dop['UF_COMP_NAME'];
$user_ur_address = $res_dop['UF_UR_ADDRESS'];
$user_contact_face = $res_dop['UF_CONTACT_FACE'];

// echo "<pre>";
// print_r($res_dop);
// echo "</pre>";
?>
<div class="order_container">
	<?if(!$USER->IsAuthorized()){ ?>
		<div class="order_change_block">
			<div class="order_change_block_title">Данные покупателя</div>
			<ul class="nav nav-tabs" id="OrderTabs" role="tablist">
				<li class="nav-item" role="presentation">
				<button class="nav-link active" id="fiz-face-tab" data-bs-toggle="tab" data-bs-target="#fiz-face" type="button" role="tab" aria-controls="fiz-face" aria-selected="true">Физическое лицо</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="ur-face-tab" data-bs-toggle="tab" data-bs-target="#ur-face" type="button" role="tab" aria-controls="ur-face"  aria-selected="false">Юридическое лицо</button>
				</li>
			</ul>
			<div class="tab-content" id="OrderTabsContent">
				<div class="tab-pane fade show active" id="fiz-face" role="tabpanel" aria-labelledby="fiz-face-tab">
					<div class="btn-group content_wrapper">
						<a href="/auth/" class="btn btn_main_category">Войти или<br>зарегистрироваться</a>
						<a href="#" id="BuyOneClickBtn" class="btn btn_main_category_second">Купить в 1 клик</a>
					</div>
				</div>
				<div class="tab-pane fade" id="ur-face" role="tabpanel" aria-labelledby="ur-face-tab">
					<div class="alert alert-warning ur-face-alert">
						Чтобы оформить заказ как юридическое лицо, Вам необходимо зарегистрироваться.		
					</div>
					<div class="btn-group">
						<a href="/auth/" class="btn btn_main_category">Войти</a>
						<a href="/auth/registration/" id="BuyOneClickBtn" class="btn btn_main_category_second">Зарегистрироваться</a>
					</div>
				</div>
			</div>
		</div>
	<?}?>
	<form id="order_make" action="/personal/order/done/" method="POST">
		<div class="order_block"><!-- Инфо о товаре -->
			<?
				$i = 0;
				while ($item = $basketRes->fetch()) {
				$i++;
				$res = CIBlockElement::GetByID($item['PRODUCT_ID']);
				if($ar_res = $res->GetNext())
				//Получаем картинку
				$imagepath= CFile::GetPath($ar_res['DETAIL_PICTURE']);
				//Получаем свойства
				$prop = CIBlockElement::GetByID($item['PRODUCT_ID'])->GetNextElement()->GetProperties();
				$goods[$i] =  array($prop['ARTICLE']['VALUE'],$item['NAME'],$item['QUANTITY'],$prop['UNIT']['VALUE'],$item['PRODUCT_ID'],$item['DETAIL_PAGE_URL']);
			?>
			<div class="order_block_basket">
				<div calss="order_basket_img">
					<img src="<?=$imagepath?>" title="<?=$item['NAME']?>"/>
				</div>
				<div class="order_basket_name">
					<a href="<?=$item['DETAIL_PAGE_URL']?>">
						<?=$item['NAME']?>
					</a>
				</div>
				<div class="order_basket_price">
					<?=round($item['PRICE'])?> ₽
				</div>
				<div class="order_basket_quantity">
					<?=round($item['QUANTITY'])?> шт
				</div>
			</div>
				<?}?>
			<div class="order_block_total">
				<?
				$total = Sale\Internals\BasketTable::getList(array(
					'filter' => array(
						'FUSER_ID' => Sale\Fuser::getId(), 
						'ORDER_ID' => null,
						'LID' => SITE_ID,
						'CAN_BUY' => 'Y',
					),
					'select' => array('BASKET_COUNT', 'BASKET_SUM'),
					'runtime' => array(
						new \Bitrix\Main\Entity\ExpressionField('BASKET_COUNT', 'COUNT(*)'),
						new \Bitrix\Main\Entity\ExpressionField('BASKET_SUM', 'SUM(PRICE*QUANTITY)'),
					)
				))->fetch();
				$summ = round($total['BASKET_SUM']);
				?>
				<div class="checkout-basket-summary">
				<div class="checkout-basket-summary-text">Итого к оплате</div> 
					<div class="checkout-item-price-block">
						<span class="checkout-item-price">
							<div><?=$summ?> ₽</div>
						</span>
					</div>
				</div>
			</div>
		</div>
		<?if($USER->IsAuthorized()){ ?>
			<div class="order_block_user"><!-- Данные о пользователе -->
				<div class="order_change_block_title">Данные пользователя</div>
				<input type="hidden" name="order_goods" value='<?=json_encode($goods);?>'/>
				<input type="hidden" name="order_summ" value='<?=$summ;?>'/>
				<input type="hidden" name="user_id" value="<?=$user_id;?>"/>
				<input type="hidden" name="ur_face" value="<?=$ur_face;?>"/>
				<?if($ur_face !== "Y"){?>
					<?//Физ лицо?>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Имя</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="name" value="<?=$user_name;?>" require/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Телефон</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="phone" value="<?=$user_phone;?>" require/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Email</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="email" value="<?=$user_email;?>" require/>
						</div>
					</div>
				<?}else{?>
					<?//ЮР лицо?>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Имя</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="name" value="<?=$user_name;?>" require/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Контактное лицо</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="contact_face" value="<?=$user_contact_face;?>" require/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Телефон</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="phone" value="<?=$user_phone;?>" require/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Email</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="email" value="<?=$user_email;?>" require/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">ИНН</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="inn" value="<?=$user_inn;?>"/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">КПП</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="kpp" value="<?=$user_kpp;?>"/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Название организации</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="comp_name" value="<?=$user_comp_name;?>"/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Юридический адрес</div>
						<div class="buy-one-click-input-container">
							<input type="text" name="ur_address" value="<?=$user_ur_address;?>"/>
						</div>
					</div>
				<?}?>
			</div>
			<div class="order_block_delivery"><!-- Доставка -->
				<div class="order_change_block_title">Выберете способ получения</div>
				<div class="order_delivery_group">
					<div class="order_delivery_item">
						<input id="radio-01" type="radio" name="radio_delivery" value="4" checked >
						<label for="radio-01" onclick="showHide('delivery_block')">Самовывоз</label>
					</div>
					<div class="order_delivery_item">
						<input id="radio-02" type="radio" name="radio_delivery" value="2">
						<label for="radio-02" onclick="showHide('delivery_block2')">Доставка</label>
					</div>
				</div>
				<div id="delivery_block">
					<?if($region_name == 'Санкт-Петербург'){?>
					<div class="order_stock_item">
						<input id="stock-2" type="radio" name="stock_delivery" value="2" checked>
						<label for="stock-2">Санкт-Петербург, ул. Софийская, д. 66</label>
					</div>
					<?}elseif($region_name == 'Екатеринбург'){?>
					<div class="order_stock_item">
						<input id="stock-3" type="radio" name="stock_delivery" value="3" checked>
						<label for="stock-3">Екатеринбург, ул. Волховская, д. 20, офис 105</label>
					</div>
					<?}elseif($region_name == 'Новосибирск'){?>
					<div class="order_stock_item">
						<input id="stock-4" type="radio" name="stock_delivery" value="4" checked>
						<label for="stock-4">Новосибирск, ул. Петухова, 67, корпус 10</label>
					</div>
					<?}else{?>
					<div class="order_stock_item">
						<input id="stock-1" type="radio" name="stock_delivery" value="1" checked>
						<label for="stock-1">М.О., г. Химки, Вашутинское шоссе, д. 1, корп. 5</label>
					</div>
					<?}?>
				</div>
				<div id="delivery_block2">
					<div class="order_change_block_title">Адрес</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Город<span>*</span></div>
						<div class="buy-one-click-input-container">
							<input type="text" name="city"/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Улица<span>*</span></div>
						<div class="buy-one-click-input-container">
							<input type="text" name="street"/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container block_50">
						<div class="block_50_item">
							<div class="buy-one-click-label-container">Дом<span>*</span></div>
							<div class="buy-one-click-input-container">
								<input type="text" name="house"/>
							</div>
						</div>
						<div class="block_50_item">
							<div class="buy-one-click-label-container">Квартира/Офис</div>
							<div class="buy-one-click-input-container">
								<input type="text" name="flat"/>
							</div>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">ФИО получателя<span>*</span></div>
						<div class="buy-one-click-input-container">
							<input type="text" name="fio_recipient" value="<?=$user_name;?>"/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Телефон получателя<span>*</span></div>
						<div class="buy-one-click-input-container">
							<input type="text" name="phone_recipient" class="form_phone" value="<?= $user_phone?>"/>
						</div>
					</div>
					<div class="buy-one-click-formgroup-container">
						<div class="buy-one-click-label-container">Комментарий</div>
						<div class="buy-one-click-input-container">
							<textarea type="text" name="comment" value="Комментарий"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="order_block_pay"><!-- Оплата -->
				<div class="order_change_block_title">Выберете способ оплаты</div>
				<?if($ur_face !== "Y"){?>
					<div class="order_pay_group">
						<div class="order_pay_item">
							<input id="radio-3" type="radio" name="radio_pay" value="1" disabled>
							<label for="radio-3">При получении</label>
						</div>
						<div class="order_pay_item">
							<input id="radio-4" type="radio" name="radio_pay" value="2" disabled>
							<label for="radio-4">Онлайн</label>
						</div>
					</div>
				<?}else{?>	
					<div class="order_pay_group">
						<div class="order_pay_item">
							<input id="radio-3" type="radio" name="radio_pay" value="3" disabled>
							<label for="radio-3">Коммерческое предложение</label>
						</div>
					</div>
				<?}?>	
				<div class="alert alert-warning ur-face-alert">
					В данный момент мы не можем принимать оплату на нашем сайте. Пожалуйста, завершите оформление Вашего заказа для получения коммерческого предложения от наших менеджеров.	
				</div>
			</div>
			<div class="order_block_send"><!-- Подтверждение заказа -->
				<button class="btn_main" type="submit">Подтвердить заказ</button>
				<br>
				<div class="bx-authform-formgroup-container">
					<label class="main-user-consent-request">
						<input class="fields boolean" type="hidden" value="0" name="UF_NEWS_LETTER">
						<input type="checkbox" value="1" name="UF_NEWS_LETTER" checked="">
						<span class="main-user-consent-request-announce-link">
							Я согласен получать новости с акциями и спецпредложениями от ООО «Контур»</span>
					</label>
				</div>
				<div class="bx-authform-formgroup-container">
					<label class="main-user-consent-request">
						<input type="checkbox" value="N" checked="" name="">
						<span class="main-user-consent-request-announce-link">Нажимая кнопку «Подтвердить заказ», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в <a href="" target="_blank">Согласии на обработку персональных данных</a></span>
					</label>	
				</div>
				<div class="bx-authform-formgroup-container">
					<label class="main-user-consent-request">
						<span class="main-user-consent-request-announce-link">Предложение не является публичной офертой, стоимость может быть скорректирована в момент выставления коммерческого предложения.</span>
					</label>	
				</div>
			</div>
		<?}?>
	</form>

<script>//Показываем варианты
	function showHide(element_id) {
		//Если элемент с id-шником element_id существует
		if (document.getElementById(element_id)) { 
			//Записываем ссылку на элемент в переменную obj
			var obj = document.getElementById(element_id); 
			//Если css-свойство display не block, то: 
			if (obj.style.display != "block") { 
				obj.style.display = "block"; //Показываем элемент
			}
			else obj.style.display = "none"; //Скрываем элемент
		}
	}   
</script>
<!-- Купить в 1 клик -->
<div id="BuyOneClick" class="modal">
  <!-- Модальное содержание -->
  <div class="modal_body">
    <span class="closeBuyOneClick">&times;</span>
    <p>Заполните форму,<br>чтобы сделать заказ</p>
	<form method="" class="form_order_buyoneclick">
		<input type="hidden" name="goods" value='<?=json_encode($goods);?>'/>
		<input type="hidden" name="order_summ" value='<?=$summ;?>'/>
		<div class="buy-one-click-formgroup-container">
			<div class="buy-one-click-label-container">ФИО <span>*</span></div>
			<div class="buy-one-click-input-container">
				<input type="text" name="name"/>
			</div>
		</div>
		<div class="buy-one-click-formgroup-container">
			<div class="buy-one-click-label-container">Телефон <span>*</span></div>
			<div class="buy-one-click-input-container">
				<input type="text" name="phone" class="form_phone"/>
			</div>
		</div>
		<div class="buy-one-click-formgroup-container">
			<div class="buy-one-click-label-container">Проверочный номер телефона <span>*</span></div>
			<div class="buy-one-click-input-container">
				<input type="text" name="phone2" class="form_phone"/>
			</div>
		</div>
		<div class="buy-one-click-formgroup-container">
			<div class="buy-one-click-label-container">Email</div>
			<div class="buy-one-click-input-container">
				<input type="text" name="email"/>
			</div>
		</div>
		<div class="buy-one-click-formgroup-container dbg_captha">
			<input name="captcha_code" value="<?=htmlspecialchars($cpt->GetCodeCrypt());?>" type="hidden">
			<div class="buy-one-click-label-container">
				<img src="/bitrix/tools/captcha.php?captcha_code=<?=htmlspecialchars($cpt->GetCodeCrypt());?>">
			</div>
			<div class="buy-one-click-input-container">
				<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
			</div>
		</div>
		<div class="buy-one-click-formgroup-container">
			<div class="buy-one-click-input-container">
				<button type="submit" class="btn_main" name="btn_buy_one_click">Отправить</button>
			</div>
		</div>
	</form>
	<div id="buyoneclick_message"></div>
  </div>
</div>
<script>//Отправляем данные в обработку
    $('#BuyOneClick').submit(function(e) {
        e.preventDefault();
        var $data = {};
        $('#BuyOneClick').find ('input').each(function() {
            $data[this.name] = $(this).val();
        });
        $(".styles_bottom").attr('disabled','disabled');
        $.ajax({
            type: 'POST',
            url: '/ajax/forms/order_buyoneclick.php',
            data: $data,
            dataType: "html",
            success: function(data){
                $('#buyoneclick_message').html(data);
            }
        });
    });
</script>
<script>//Открываем модальное окно
	var modalBuyOneClick = document.getElementById("BuyOneClick");
	var btnBuyOneClickBtn = document.getElementById("BuyOneClickBtn");
	var span = document.getElementsByClassName("closeBuyOneClick")[0];
	btnBuyOneClickBtn.onclick = function() {
	modalBuyOneClick.style.display = "block";
	}
	span.onclick = function() {
	modalBuyOneClick.style.display = "none";
	}
	window.onclick = function(event) {
		if (event.target == modalBuyOneClick) {
			modalBuyOneClick.style.display = "none";
		}
	}
</script>