<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;

if($_POST['captcha']){
    $token = $_POST['captcha'];
    $secret_key = 'ES_dbfe171f072a4669810bcc34503e48b8';

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.hcaptcha.com/siteverify',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'secret='.$secret_key.'&response='.$token.'',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    # Parse JSON from response. Check for success or error codes.
    $response_json = json_decode($response, true);
    $success = $response_json['success'];

    if($success == 1){
        global $USER;
        $name = $_POST['name'].'!';
		$second_name = $_POST['second_name'];
		$last_name = $_POST['last_name'];
		$login = $_POST['login'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];
        $second_name = $_POST['second_name'];

        $user = new CUser;
        $arFields = Array(
            "NAME"              => $name,
            "SECOND_NAME"       => $second_name,
            "LAST_NAME"         => $last_name,
            "EMAIL"             => $email,
            "LOGIN"             => $login,
            "ACTIVE"            => "Y",
            "GROUP_ID"          => array(6),
            "PASSWORD"          => $password,
            "CONFIRM_PASSWORD"  => $confirm_password,
            "PERSONAL_PHONE"    => $phone
        );
        $ID = $user->Add($arFields);
        if (intval($ID) > 0)
            echo '<div class="alert alert-success" role="alert">Регистрация прошла успешно!</div>';
        else
            echo '<div class="alert alert-warning" role="alert">'.$user->LAST_ERROR.'</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">Пройдите проверку капчи</div>';
    }
}else{
    echo '<div class="alert alert-danger" role="alert">Пройдите проверку капчи</div>';
}
?>