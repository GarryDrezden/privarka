<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
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

global $USER;

if(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_code"])){
    echo '<h5 style="color:#333333;margin: 0;padding: 20px;font-size: 18px;" class="alert alert-warning" role="alert">
    Капча введена неверно, попробуйте еще раз</h5>';
}else{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $summ = $_POST['order_summ'];
    $goods = json_decode($_POST['goods']);
    foreach($goods as $good){
        $g .= '<br><hr>Артикул : '. $good['0'].'<br>';
        $g .= 'Наименование : '. $good['1'].'<br>';
        $g .= 'Фасовка : '. round($good['3']).' шт.<br>';
        $g .= 'Количество : '. round($good['2']).' шт.<br><hr>';
    }

    // Допустим некоторые поля приходит в запросе
    $request = Context::getCurrent()->getRequest();
    // $productId = $good['3'];
    $comment = 'Комментарий';
    $siteId = Context::getCurrent()->getSite();
    $currencyCode = CurrencyManager::getBaseCurrency();
    // Создаёт новый заказ
    $order = Order::create($siteId, $USER->isAuthorized() ? $USER->GetID() : 539);
    $order->setPersonTypeId(1);
    $order->setField('CURRENCY', $currencyCode);
    // Создаём корзину с одним товаром
    $basket = Sale\Basket::loadItemsForFUser(\CSaleBasket::GetBasketUserID(),
		Bitrix\Main\Context::getCurrent()->getSite())->getOrderableItems();

    $order->setBasket($basket);
    // Создаём одну отгрузку и устанавливаем способ доставки - "Без доставки" (он служебный)
    $shipmentCollection = $order->getShipmentCollection();
    $shipment = $shipmentCollection->createItem();
    $service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId());
    $shipment->setFields(array(
        'DELIVERY_ID' => $service['ID'],
        'DELIVERY_NAME' => $service['NAME'],
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
    $mail->isSMTP();// Отправка через SMTP
    $mail->Host = $_GLOBAL["SMTP_HOST"];
    $mail->SMTPAuth = true;
    $mail->Username = $_GLOBAL["SMTP_USER"];
    $mail->Password = $_GLOBAL["SMTP_PASS"];
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $_GLOBAL["SMTP_PORT"];
    $mail->CharSet = "utf-8";           
    $mail->setFrom($_GLOBAL["SMTP_EMAIL_FROM"], 'Сайт приварка');
    $mail->addAddress($_GLOBAL["SMTP_EMAIL_CLIENT"], '');
    $mail->Subject = 'Заказ в 1 клик №'.$orderId.'';
    $mail->msgHTML('<html>
                        <body>
                            ФИО: '.$name.'<br>
                            Телефон: '.$phone.'<br>
                            Проверочный телефон: '.$phone2.'<br>
                            Еmail: '.$email.'<br>
                            Состав заказа: '.$g.'<br>
                            Сумма: '.$summ.'<br>
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
    <script>
        $('.clear_cart').click(function () {
            $('.basket-item-actions-remove').click();
            document.location.href = '/'
        });
    </script>
    <?
    echo 
        '<style>.form_order_buyoneclick{display:none!important;}#BuyOneClick .modal_body p{display:none;}</style>
        <h5 style="color:#333333;margin: 0;padding: 20px;font-size: 18px;" class="alert alert-success" role="alert">
        Заказ IKP00-'.$orderId.' успешно создан.<br>
        Наши менеджеры в самое ближайшее время свяжутся с Вами</h5>
        <button class="clear_cart btn_main" style="margin-top: 20px;padding: 0;">Продолжить</button>';
}
?>