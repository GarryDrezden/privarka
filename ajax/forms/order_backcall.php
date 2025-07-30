<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;
Loader::includeModule('sale');

if(isset($_POST['phone'])){ 
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $summ = $_POST['summ'];
    $goods = json_decode($_POST['goods']);
    // форма отправки по почту и в битрикс
    $to = "v.polyakov.art@gmail.com";
    $subject = "Заказ в 1 клик №";
    $message = '
                ФИО: '.$name.'
                Телефон: '.$phone.'
                Проверочный телефон: '.$phone2.'
                Еmail: '.$email.'
                Сумма: '.$summ.'
                ';
    // $message.= implode("<br>\r\n", $goods);
    $from = "Сайт Приварка";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= "From: <".$from.">\r\n";
    if (mail($to,$subject,$message,$headers)) {
        echo "OK";
    }else {
        echo "ERROR";
    }
}
$productByBasketItem->delete();
$basket->save();
?>