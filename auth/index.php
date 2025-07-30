<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>
<div class="content_wrapper">
	<div class="caption">
        <h1>
            <?$APPLICATION->ShowTitle(true);?> </h1>
        </div>
    <?if($USER->IsAuthorized()){?>
        <div class="alert alert-success" role="alert" style="margin: 30px 0 0 0;">
            Поздравляем, вы успешно авторизировались. 
            Можете начать покупки в <a href="/catalog/">Каталоге</a> или продолжить <a href="/personal/order/make/">Оформление заказа</a>. 
        </div>
    <?}else{
    if($_GET['confirm_registration'] == 'yes'){
        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.confirmation",
            "flat",
            Array(
                "PERSONAL" => "/personal/",
                "SEF_FOLDER" => "/auth/",
                "SEF_MODE" => "Y",
                "SEF_URL_TEMPLATES" => array()
            )
        );
    }elseif($_GET['confirm_registration'] == 'no'){?>
        <div class="alert alert-success" role="alert" style="margin: 30px 0 0 0;">
            Поздравляем, вы успешно зарегистрировались. 
            Для активации аккаунта подтвердите вашу почту, письмо отправлено на указанный вами email. 
        </div>
    <?}else{
        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.authorize",
            "flat",
            Array(
                "PERSONAL" => "/personal/",
                "SEF_FOLDER" => "/auth/",
                "SEF_MODE" => "Y",
                "SEF_URL_TEMPLATES" => array()
            )
        );
    }?>
    <?}?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>