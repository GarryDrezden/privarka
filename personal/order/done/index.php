<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
use Bitrix\Main\Loader;
use Bitrix\Sale;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;

Loader::includeModule('PHPMailer');
Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

$APPLICATION->SetTitle("Заказ создан");

$name = $_POST['name'];
$phone = $_POST['phone'];
$phone2 = $_POST['phone2'];
$email = $_POST['email'];
$summ = $_POST['order_summ'];
$comment_user = '<br>'.$_POST['comment'];
$goods = json_decode($_POST['order_goods']);
$address = $_POST['city'].', ул.'.$_POST['street'].', дом.'.$_POST['house'].', квартира/офис'.$_POST['flat'];
$delivery_type = $_POST['radio_delivery'];
foreach($goods as $good){
    $g .= '<br><hr>Артикул : '. $good['0'].'<br>';
    $g .= 'Наименование : '. $good['1'].'<br>';
    $g .= 'Фасовка : '. round($good['3']).' шт.<br>';
    $g .= 'Количество : '. round($good['2']).' шт.<br><hr>';
}
if($delivery_type == 4){
    $delivery_name = 'Самовывоз со склада';
    if($stock_delivery == 2){
        $comment = "Выбранный склад: Санкт-Петербург, ул. Софийская, д. 66";
    }elseif($stock_delivery == 3){
        $comment = "Выбранный склад: Екатеринбург, ул. Волховская, д. 20, офис 105";
    }elseif($stock_delivery == 4){
        $comment = "Выбранный склад: Новосибирск, ул. Петухова, 67, корпус 10";
    }else{
        $comment = "Выбранный склад: М.О., г. Химки, Вашутинское шоссе, д. 1, корп. 5";
    }
}else{
    $delivery_name = 'Доставка';
    $comment = $address;
}
$comment .= $comment_user;

// Допустим некоторые поля приходит в запросе
$request = Context::getCurrent()->getRequest();
$siteId = Context::getCurrent()->getSite();
$currencyCode = CurrencyManager::getBaseCurrency();
// Создаёт новый заказ
$order = Order::create($siteId, $USER->isAuthorized() ? $USER->GetID() : 539);
if($_POST['ur_face'] == 'Y'){
    $ur_face = '<br>Название организации: '.$_POST['comp_name'].'<br>ИНН: '.$_POST['inn'].';<br>КПП: '.$_POST['kpp'].';<br>Юридический адрес: '.$_POST['ur_address'];
    $order->setPersonTypeId(2);
}else{
    $order->setPersonTypeId(1);
}
$order->setField('CURRENCY', $currencyCode);
$order->setField('USER_DESCRIPTION', $comment);
// Создаём корзину с одним товаром
$basket = Sale\Basket::loadItemsForFUser(\CSaleBasket::GetBasketUserID(),
    Bitrix\Main\Context::getCurrent()->getSite())->getOrderableItems();
$order->setBasket($basket);

// Создаём одну отгрузку и устанавливаем способ доставки - "Без доставки" (он служебный)
$shipmentCollection = $order->getShipmentCollection();
$shipment = $shipmentCollection->createItem();
// $service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId());
$shipment->setFields(array(
    'DELIVERY_ID' => $delivery_type,
    'DELIVERY_NAME' => $delivery_name,
    'CURRENCY' => 'RUB'
));
$shipmentItemCollection = $shipment->getShipmentItemCollection();
foreach ($basket as $item){
        $shipmentItem = $shipmentItemCollection->createItem($item);
        $shipmentItem->setQuantity($item->getQuantity());
    }
// Создаём оплату со способом #1
$paymentCollection = $order->getPaymentCollection();
$payment = $paymentCollection->createItem();
$paySystemService = PaySystem\Manager::getObjectById(2);
$payment->setFields(array(
    'PAY_SYSTEM_ID' => $paySystemService->getField("PAY_SYSTEM_ID"),
    'PAY_SYSTEM_NAME' => $paySystemService->getField("NAME"),
));
// Устанавливаем свойства
$propertyCollection = $order->getPropertyCollection();
$propertyCodeToId = array();
$phoneProp = $propertyCollection->getPhone();
$phoneProp->setValue($phone);
$nameProp = $propertyCollection->getPayerName();
$nameProp->setValue($name);
$emailProp = $propertyCollection->getUserEmail();
$emailProp->setValue($email);
// Сохраняем
$order->doFinalAction(true);
$result = $order->save();
$orderId = $order->getId();

// Создаем письмо
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = $_GLOBAL["SMTP_HOST"];
$mail->SMTPAuth = true;
$mail->Username = $_GLOBAL["SMTP_USER"];
$mail->Password = $_GLOBAL["SMTP_PASS"];
$mail->SMTPSecure = 'ssl';
$mail->Port = $_GLOBAL["SMTP_PORT"];
$mail->CharSet = "utf-8";           
$mail->setFrom($_GLOBAL["SMTP_EMAIL_FROM"], 'Сайт приварка');
$mail->addAddress($_GLOBAL["SMTP_EMAIL_CLIENT"], '');
$mail->Subject = 'Заказ №'.$orderId.' от '.date("Y-m-d").'';
$mail->msgHTML('<html>
                    <body>
                        ФИО: '.$name.'<br>
                        Телефон: '.$phone.'<br>
                        Еmail: '.$email.'<br>
                        Способ доставки: '.$delivery_name.'<br>
                        Состав заказа: '.$g.'<br>
                        Сумма: '.$summ.' руб.<br>
                        Комментарий: '.$comment.'<br>
                        '.$ur_face.'
                    </body>
                </html>'
            );
// Отправляем
if ($mail->send()) {
// echo 'Письмо отправлено!';
} else {
echo 'Ошибка: ' . $mail->ErrorInfo;
}  
?>
<div class="content_wrapper order_page">
    <div class="order_done_block">
        <div class="order_done_item">
            <h3>Благодарим за заказ. Вашей заявке присвоен номер <a href="/personal/orders/<?=$orderId?>">IKP00-<?=$orderId?></a>.</h3>
        </div>    
        <div class="order_done_item">
            <p>Наши менеджеры в самое ближайшее время свяжутся с Вами для оформления заказа или подготовки коммерческого предложения.</p>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>