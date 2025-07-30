<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Loader::includeModule('PHPMailer');

$name = $_POST['backcall_name'];
$phone = $_POST['backcall_phone'];
$product = $_POST['backcall_product'];
$count = $_POST['backcall_count'];

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
if($product){
    $mail->Subject = 'Заказ продукта без наличия на сайте';
    $mail->msgHTML('<html>
                        <body>
                            ФИО: '.$name.'<br>
                            Телефон: '.$phone.'<br>
                            Продукт: '.$product.'<br>
                            Количество: '.$count.'<br>
                        </body>
                    </html>'
                );
}else{
    $mail->Subject = 'Заказать звонок';
    $mail->msgHTML('<html>
                        <body>
                            ФИО: '.$name.'<br>
                            Телефон: '.$phone.'<br>
                        </body>
                    </html>'
                );
}
if($APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_code"])){
    // Отправляем
    if ($mail->send()) {
        $armsg = array(
            'mess' => "<style>
            .backcall_button, #backcall_form, #backCallModal p, .modal-content p{display:none!important;}
            #backcall_message{display:block!important;}</style>
            <h5 style='color:#333333;margin: 0;padding: 20px' class='alert alert-success' role='alert'>Форма отправлена, спасибо за обращение</h5>
            ",
            'done' => true,
        );
    } else {
        echo 'Ошибка: ' . $mail->ErrorInfo;
    }  
}else{
    $armsg = array(
        'mess' =>  "
        <h5 style='color:#D13737;margin: 0;padding: 20px' class='alert alert-success' role='alert'>Капча введена не верно</h5>
        ",
        'capture_reload_code' => $APPLICATION->CaptchaGetCode(),
    );
}
$msg = json_encode($armsg);
echo $msg;
?>