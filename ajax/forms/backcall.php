<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: application/json; charset=utf-8');

$name = htmlspecialchars($_POST['backcall_name']);
$phone = htmlspecialchars($_POST['backcall_phone']);
$product = htmlspecialchars($_POST['backcall_product']);
$count = htmlspecialchars($_POST['backcall_count']);

$armsg = array();

if($APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_code"])){
    // Определяем тему и тело письма
    if($product){
        $subject = 'Заказ продукта без наличия на сайте';
        $body = '<html>
                    <body>
                        ФИО: '.$name.'<br>
                        Телефон: '.$phone.'<br>
                        Продукт: '.$product.'<br>
                        Количество: '.$count.'<br>
                    </body>
                </html>';
    }else{
        $subject = 'Заказать звонок';
        $body = '<html>
                    <body>
                        ФИО: '.$name.'<br>
                        Телефон: '.$phone.'<br>
                    </body>
                </html>';
    }
    
    // Определяем адреса
    $fromEmail = !empty($_GLOBAL["SMTP_EMAIL_FROM"]) ? $_GLOBAL["SMTP_EMAIL_FROM"] : 'noreply@privarka-k97.ru';
    $toEmail = 'krep@kontur-97.ru';
    
    // Формируем заголовки для письма
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Сайт приварка <" . $fromEmail . ">\r\n";
    $headers .= "Reply-To: " . $fromEmail . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Отправляем письмо через стандартную PHP функцию mail()
    $result = @mail($toEmail, $subject, $body, $headers);
    
    if ($result) {
        $armsg = array(
            'mess' => '<h5 style="color:#333333;margin: 0;padding: 20px" class="alert alert-success" role="alert">Форма отправлена, спасибо за обращение</h5>',
            'done' => true,
        );
    } else {
        $armsg = array(
            'mess' => "<h5 style='color:#D13737;margin: 0;padding: 20px' class='alert alert-danger' role='alert'>Ошибка отправки письма. Попробуйте позже.</h5>",
            'done' => false,
        );
    }  
}else{
    $armsg = array(
        'mess' =>  "
        <h5 style='color:#D13737;margin: 0;padding: 20px' class='alert alert-danger' role='alert'>Капча введена не верно</h5>
        ",
        'capture_reload_code' => $APPLICATION->CaptchaGetCode(),
        'done' => false,
    );
}
$msg = json_encode($armsg);
echo $msg;
?>